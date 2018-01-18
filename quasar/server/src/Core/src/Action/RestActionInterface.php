<?php

namespace Core\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

interface RestActionInterface
{

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return mixed
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
    * @param ServerRequestInterface $request
    * @param DelegateInterface $delegate
    * @return JsonResponse
    */
    public function getAction(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
      * @param ServerRequestInterface $request
      * @param DelegateInterface $delegate
      * @return JsonResponse
      */
    public function listAction(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
    * @param ServerRequestInterface $request
    * @param DelegateInterface $delegate
    * @return JsonResponse
    */
    public function searchAction(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
    * @param ServerRequestInterface $request
    * @param DelegateInterface $delegate
    * @return JsonResponse
    */
    public function createAction(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
    * @param ServerRequestInterface $request
    * @param DelegateInterface $delegate
    * @return JsonResponse
    */
    public function updateAction(ServerRequestInterface $request, DelegateInterface $delegate);

    /**
    * @param ServerRequestInterface $request
    * @param DelegateInterface $delegate
    * @return JsonResponse
    */
    public function deleteAction(ServerRequestInterface $request, DelegateInterface $delegate);
}
