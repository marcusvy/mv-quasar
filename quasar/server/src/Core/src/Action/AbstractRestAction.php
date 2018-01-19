<?php

namespace Core\Action;

use Core\Doctrine\AbstractEntity;
use Core\Service\ServiceInterface;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Form\Fieldset;
use Zend\Json\Json;
use Zend\Form\FormInterface;

abstract class AbstractRestAction implements RestActionInterface, MiddlewareInterface
{
    /** @var Router/RouterInterface */
    protected $router;
    /** @var  ServiceInterface */
    protected $service;
    /** @var  AbstractEntity */
    protected $entity;
    /** @var  FormInterface */
    protected $form;

    /** @var string */
    protected $primaryColumn = 'id';

    public function __construct(
        Router\RouterInterface $router,
        ServiceInterface $service,
        FormInterface $form = null
    )
    {
        $this->router = $router;
        $this->service = $service;
        $this->form = $form;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
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
        $entity = $this->service->get($id);
        if ($entity) {
            return new JsonResponse([
                'success' => true,
                'collection' => [$entity->toArray()],
            ]);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Not found!'
        ], 404);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function listAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        //    $collection = $this->service->list();

        $page = is_null($request->getAttribute('page')) ? 1 : $request->getAttribute('page');
        $resultsPerPage = 10;
        $paginator = $this->service->paginate($page, $resultsPerPage);
        $interator = $paginator->getIterator();
        $total = $paginator->count();
        $perpage = $interator->count();
        $pages = ($total > 0) ? ceil($total / $perpage) : 1;

        return new JsonResponse([
            'success' => true,
            'pages' => $pages,
            'current' => $page,
            'perpage' => $perpage,
            'total' => $total,
            'collection' => $interator->getArrayCopy()
        ]);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function searchAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = $request->getQueryParams();


        if (isset($data['for']) && isset($data['in'])) {
            // @todo: gerar um mapeamento de colunas por número
            $collection = $this->service->searchBy($data['in'], $data['for']);

            return new JsonResponse([
                'success' => true,
                'collection' => $collection,
            ]);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Server Error'
        ], 500); //505
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function createAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $contentType = $request->getHeader('Content-Type');
        $data = [];
        $entity = false;
        if ($contentType[0] == 'application/json') {
            $data = Json::decode($request->getBody(), Json::TYPE_ARRAY);
        }
        if ($contentType[0] == 'application/x-www-form-urlencoded') {
            $data = $request->getQueryParams();
        }
        if (!is_null($this->form)) {
            $this->form->setData($data);
        }
        if ($this->form->isValid()) {
            $data = $this->form->getData();
            $entity = $this->service->create($data);
        }
        if ($entity) {
            return new JsonResponse([
                'success' => true,
                'collection' => $entity->toArray(),
            ]);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Server Error',
            'debug' => $data
        ], 505);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function updateAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;
        $contentType = $request->getHeader('Content-Type');
        $data = [];
        $entity = false;
        if ($contentType[0] == 'application/json') {
            $data = Json::decode($request->getBody(), Json::TYPE_ARRAY);
        }
        if ($contentType[0] == 'application/x-www-form-urlencoded') {
            $data = $request->getQueryParams();
        }
        if ($id) {
            if (!is_null($this->form)) {
                $this->form->setData($data);
            }
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                $entity = $this->service->update($id, $data);
            }
            if ($entity) {
                return new JsonResponse([
                    'success' => true,
                    'collection' => $entity->toArray(),
                ]);
            }
        } else {
            return new JsonResponse([
                'success' => false,
                'message' => 'You must identify'
            ], 404);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Server Error'
        ], 505);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function deleteAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;

        if ($id) {
            $entity = $this->service->delete($id);
            if ($entity) {
                return new JsonResponse([
                    'success' => true,
                    'collection' => $entity,
                ]);
            }
        } else {
            return new JsonResponse([
                'success' => false,
                'message' => 'You must identify'
            ], 404);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Server Error'
        ], 505);
    }
}
