<?php

namespace User\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Form\Form;

class AuthPageAction implements MiddlewareInterface
{
    private $form;
    private $router;

    public function __construct(
        RouterInterface $router        // Form $form
    ) {
        $this->router = $router;
    //   $this->form = $form;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new JsonResponse([]);
    }
}
