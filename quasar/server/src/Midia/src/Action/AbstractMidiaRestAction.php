<?php

namespace Midia\Action;

use Core\Action\AbstractRestAction;
use Core\Service\ServiceInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Midia\Model\Entity\MidiaEntityInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Json\Json;
use Zend\Form\FormInterface;

abstract class AbstractMidiaRestAction
    extends AbstractRestAction
{

    public function __construct(
        Router\RouterInterface $router,
        ServiceInterface $service,
        FormInterface $form = null
    )
    {
        parent::__construct($router, $service, $form);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function createAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $messages = [];
        if (!is_null($this->form)) {
            /** @var MidiaEntityInterface $midia */
            $midia = new $this->entity($request->getParsedBody());
            if (isset($_FILES['file'])) {
                $midia->setFile($_FILES['file']);
            }
            $this->form->bind($midia);
        }
        if ($this->form->isValid()) {
            $entity = $this->service->create($this->form->getData()->toArray());
            if ($entity) {
                return new JsonResponse([
                    'success' => true,
                    'collection' => $entity->toArray(),
                ], self::STATUS_CREATED);
            }
        } else {
            $messages = $this->form->getMessages();
        }

        return new JsonResponse([
            'success' => false,
            'message' => $messages,
        ], self::STATUS_OK);
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return JsonResponse
     */
    public function updateAction(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = ($request->getAttribute($this->primaryColumn)) ? (int)$request->getAttribute($this->primaryColumn) : 0;
        $data = [];
        $entity = false;
        if ($id) {
            if (!is_null($this->form)) {
                /** @var MidiaEntityInterface $midia */
                $midia = new $this->entity($request->getParsedBody());
                if (isset($_FILES['file'])) {
                    $midia->setFile($_FILES['file']);
                }
                $this->form->bind($midia);
            }
            if ($this->form->isValid()) {
                $data = $this->form->getData()->toArray();
                $entity = $this->service->update($id, $data);
            }
            if ($entity) {
                return new JsonResponse([
                    'success' => true,
                    'collection' => $entity->toArray(),
                ], self::STATUS_OK);
            }
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Proibido'
        ], self::STATUS_FORBIDDEN);
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
            'message' => 'Not found'
        ], self::STATUS_NOT_FOUND);
    }
}
