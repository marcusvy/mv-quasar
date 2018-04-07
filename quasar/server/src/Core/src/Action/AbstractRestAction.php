<?php

namespace Core\Action;

use Core\Doctrine\AbstractEntity;
use Core\Service\ServiceInterface;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Form\Fieldset;
use Zend\Json\Json;
use Zend\Form\FormInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

abstract class AbstractRestAction implements RestActionInterface, MiddlewareInterface, StatusCodeInterface
{
    /** @var Router/RouterInterface */
    protected $router;
    /** @var  ServiceInterface */
    protected $service;
    /** @var  AbstractEntity */
    protected $entity;
    /** @var  FormInterface */
    protected $form;
    /** @var array */
    protected $reservedQueryParams = ['orderby', 'offset', 'limit', 'like'];
    /** @var string */
    protected $primaryColumn = 'id';

    public function __construct(
        Router\RouterInterface $router,
        ServiceInterface $service,
        FormInterface $form = null
    ) {
        $this->router = $router;
        $this->service = $service;
        $this->form = $form;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        switch ($request->getMethod()) {
            case 'OPTIONS':
            case 'GET':
                $idAttr = $request->getAttribute($this->primaryColumn);
                $id = $idAttr ? (int)$idAttr : 0;
                if ($id) {
                    return $this->getAction($request, $delegate);
                } else {
                    if ($request->getQueryParams()) {
                        return $this->searchAction($request, $delegate);
                    }
                    return $this->listAction($request, $delegate);
                }
            // no break
            case 'POST':
                return $this->createAction($request, $delegate);
            case 'PUT':
            case 'PATCH':
                return $this->updateAction($request, $delegate);
            case 'DELETE':
                return $this->deleteAction($request, $delegate);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Not found!',
        ], 404);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function getAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;
        $result = $this->service->get($id);
        $collection = [];
        $success = false;
        $message = '';
        $status = 404;

        if (!$result->hasError()) {
            $status = 200;
            $success = true;
            $entity = $result->getFirstResult();
            $collection = $entity->toArray();
        } else {
            $message = $result->getError()->getMessage();
        }

        return new JsonResponse([
            'success' => $success,
            'collection' => $collection,
            'message' => $message,
        ], $status);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function listAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $page = is_null($request->getAttribute('page')) ? 1 : $request->getAttribute('page');
        $resultsPerPage = 10;
        $result = $this->service->paginate($page, $resultsPerPage);

        $collection = [];
        $status = 404;

        if (!$result->hasError()) {
            $paginator = $result->getFirstResult();
            $interator = $paginator->getIterator();
            $total = $paginator->count();
            $perpage = $interator->count();
            $pages = ($total > 0 && $perpage > 0) ? ceil($total / $perpage) : 1;
            $message = 'Done';

            return new JsonResponse([
                'success' => true,
                'pagination' => [
                    'pages' => $pages,
                    'current' => $page,
                    'perpage' => $perpage,
                    'total' => $total,
                ],
                'collection' => $interator->getArrayCopy(),
                'message' => $message
            ]);
        } else {
            $message = $result->getError()->getMessage();
        }

        return new JsonResponse([
            'success' => false,
            'collection' => $collection,
            'message' => $message,
        ], $status);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function searchAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $collection = [];
        $success = false;
        $message = '';
        $status = 404;
        $data = $request->getQueryParams();
        $criteria = array_filter($data, function ($value, $param) {
            return !in_array($param, $this->reservedQueryParams);
        }, ARRAY_FILTER_USE_BOTH);
        $reservedData = array_filter($data, function ($value, $param) {
            return in_array($param, $this->reservedQueryParams);
        }, ARRAY_FILTER_USE_BOTH);
        $orderby = isset($reservedData['orderby']) ? $this->retrieveOrderFromRoute($reservedData['orderby']) : null;
        $limit = $reservedData['limit'] ?? null;
        $offset = $reservedData['offset'] ?? null;
        

        $result = isset($reservedData['like'])
            ? $this->service->searchLike($criteria, $orderby, $limit, $offset)
            : $this->service->search($criteria, $orderby, $limit, $offset);

        if (!$result->hasError()) {
            $success = true;
            $collection = $result->getResult();
        } else {
            $message = $result->getError()->getMessage();
        }

        return new JsonResponse([
            'success' => $success,
            'collection' => $collection,
            'message' => $message,
        ], $status);
    }

    /**
     * Transform &orderby=name:asc;id=desc into array
     */
    private function retrieveOrderFromRoute($value)
    {
        $result = [];
        if (is_string($value)) {
            $conditions = explode(';', $value);
            foreach ($conditions as $condition) {
                list($column, $order) = explode(':', $condition);
                $result[$column] = $order;
            }
        }
        return $result;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function createAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = $this->extractRequestData($request);
        $collection = [];
        $success = false;
        $message = 'Form not provided';
        $status = 505;


        if (!is_null($this->form)) {
            $this->form->setData($data);

            if ($this->form->isValid()) {
                $data = $this->form->getData();
                $result = $this->service->create($data);
                if (!$result->hasError()) {
                    $entity = $result->getFirstResult();
                    $success = true;
                    $collection = $entity->toArray();
                    $message = 'Done';
                    $status = 200;
                } else {
                    $message = ($result->getError() instanceof UniqueConstraintViolationException)
                        ? 'Duplicate entry'
                        : $result->getError()->getMessage();
                }
            }
        }
        return new JsonResponse([
            'success' => $success,
            'message' => $message,
            'collection' => $collection,
        ], $status);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function updateAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;
        $data = $this->extractRequestData($request);
        $collection = [];
        $success = false;
        $message = 'Server Error';
        $status = 505;

        if ($id) {
            if (!is_null($this->form)) {
                $this->form->setData($data);
            }
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                $result = $this->service->update($id, $data);

                if (!$result->hasError()) {
                    $entity = $result->getFirstResult();
                    $success = true;
                    $collection = $entity->toArray();
                    $message = 'Done';
                    $status = 200;
                }
            }
        } else {
            $message = 'You must identify';
            $status = 404;
        }
        return new JsonResponse([
            'success' => $success,
            'collection' => $collection,
            'message' => $message,
        ], $status);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function deleteAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;

        $collection = [];
        $success = false;
        $message = 'Server Error';
        $status = 505;

        if ($id) {
            $result = $this->service->delete($id);

            if (!$result->hasError()) {
                $entity = $result->getFirstResult();
                $success = true;
                $collection = $entity->toArray();
                $message = 'Done';
                $status = 200;
            }
        } else {
            $message = 'You must identify';
            $status = 404;
        }
        return new JsonResponse([
            'success' => $success,
            'collection' => $collection,
            'message' => $message,
        ], $status);
    }

    public function extractRequestData(ServerRequestInterface $request)
    {
        $data = [];
        $ct = $request->getHeader('Content-Type');
        $contentType = array_shift($ct);
        if ($contentType == 'application/json') {
            $data = Json::decode($request->getBody(), Json::TYPE_ARRAY);
        }
        if ($contentType == 'application/x-www-form-urlencoded') {
            $data = $request->getQueryParams();
        }
        return $data;
    }
}
