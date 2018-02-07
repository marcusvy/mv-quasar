<?php

namespace User\Action;

use Interop\Container\ContainerInterface;
use User\Service\UserServiceInterface;
use Zend\Expressive\Router\RouterInterface;
use User\Form\UserForm;

class UserRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $service = $container->get(UserServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(UserForm::class);

        return new UserRestAction($router, $service, $form);
    }
}
