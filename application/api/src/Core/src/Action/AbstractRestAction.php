<?php

namespace Core\Action;

use Core\Doctrine\AbstractEntity;
use Core\Service\ServiceInterface;
use Core\Utils\RequestUtils;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Form\FormInterface;

use function array_filter;
use function in_array;

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

    //Files

    /** @var bool */
    protected $fileRequest = false;
    protected $fileRequestNames = [];

    public function __construct(
        Router\RouterInterface $router,
        ServiceInterface $service,
        FormInterface $form = null
    ) {
        $this->router = $router;
        $this->service = $service;
        $this->form = $form;
    }

    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ): ResponseInterface {

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
            /** @var \Doctrine\ORM\Tools\Pagination\Paginator $paginator */
            $paginator = $result->getFirstResult();
            $interator = $paginator->getIterator();
            $total = $paginator->count();
            $perpage = $interator->count();
            $pages = ($total > 0 && $perpage > 0) ? ceil($total / $perpage) : 1;
            $message = 'Done';

            //Enable protection of properties with toArray Method on entity
            $collection = array_map(function ($entity) {
                if ($entity instanceof AbstractEntity) {
                    return $entity->toArray();
                }
                if (is_array($entity)) {
                    return $entity;
                }
                return null;
            }, $interator->getArrayCopy());

            return new JsonResponse([
                'success' => true,
                'pagination' => [
                    'pages' => $pages,
                    'current' => $page,
                    'perpage' => $perpage,
                    'total' => $total,
                ],
                'collection' => $collection,
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
        $data = ($this->fileRequest)
            ? RequestUtils::extractWithFile($request, $this->fileRequestNames)
            : RequestUtils::extract($request);
        $collection = [];
        $success = false;
        $message = 'Form not provided';
        $status = 505;

        if (RequestUtils::check($data)) {
            return new JsonResponse([
                'success' => false,
                'message' => RequestUtils::getMessage($data),
                'collection' => [],
            ]);
        }

        if (!is_null($this->form)) {
            $this->form->setData($data);
            $this->onBeforeFormValidation($data);

            if ($this->form->isValid()) {
                $data = $this->form->getData();
                if ($this->fileRequest) {
                    $data = $this->extractExtraDataFromFiles($data);
                    $data = $this->normalizeFilesEntries($data);
                }
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
            } else {
                $message = $this->form->getMessages();
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
        $data = ($this->fileRequest)
            ? RequestUtils::extractWithFile($request, $this->fileRequestNames)
            : RequestUtils::extract($request);

        $collection = [];
        $success = false;
        $message = 'Server Error';
        $status = 505;

        if (RequestUtils::check($data)) {
            return new JsonResponse([
                'success' => false,
                'message' => RequestUtils::getMessage($data),
                'collection' => [],
            ]);
        }

        if ($id) {
            if (!is_null($this->form)) {
                $this->form->setData($data);
                $this->disableRequiredFiltersForFiles();
                $this->onBeforeFormValidation($data);
                if ($this->form->isValid()) {
                    $data = $this->form->getData();
                    if ($this->fileRequest) {
                        $data = $this->normalizeFilesEntries($data);
                    }
                    // Callback for the null filter.
                    // Null values of form will interfere the data sent to service update method
                    $filterNullValuesFromFormValues = function ($value) {
                        return !is_null($value);
                    };
                    //Filter Null values from form values
                    $data = array_filter(
                        $data,
                        $filterNullValuesFromFormValues
                    );
                    $result = $this->service->update($id, $data);

                    if (!$result->hasError()) {
                        $entity = $result->getFirstResult();
                        $success = true;
                        $collection = [$entity->toArray()];
                        $message = 'Done';
                        $status = 200;
                    }
                } else {
                    $message = $this->form->getMessages();
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
        $message = 'Wrong value';
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

    /**
     * Nomalize data to send for Services eliminating $_FILES values on $data and put only the
     * 'tmp_name' (the location of file in server).
     * This data should be passed and validated on Zend Form before to sanitize $data.
     * @param array $data
     * @return array
     */
    public function normalizeFilesEntries(array $data): array
    {
        foreach ($this->fileRequestNames as $file) {
            if (is_array($data[$file]) && isset($data[$file]['tmp_name'])) {
                $data[$file] = $data['file']['tmp_name'];
            }
        }
        return $data;
    }

    /**
     * Disable required form files fields
     */
    public function disableRequiredFiltersForFiles()
    {
        if ($this->fileRequest) {
            foreach ($this->fileRequestNames as $file) {
                $this->form->getInputFilter()->get($file)->setRequired(false);
            }
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function extractExtraDataFromFiles(array $data)
    {
        return $data;
    }

    /**
     * @param array $data
     * @return null
     */
    public function onBeforeFormValidation(array $data)
    {
        return null;
    }
}