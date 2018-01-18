<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use User\Action\AuthPageAction;
use Zend\Expressive\Router\RouterInterface;
use User\Service\UserService;
use User\Form\LoginForm;

class AuthPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);

        // $service = $container->get(UserService::class);
        // $formElementManager = $container->get('FormElementManager');
        // $form = $formElementManager->get(Login::class);

        return new AuthPageAction($router);
    }
}
