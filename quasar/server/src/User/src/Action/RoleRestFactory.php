<?php

namespace User\Action;

use Core\Manager\FormElementManager;
use User\Form\RoleForm;
use User\Service\RoleServiceInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class RoleRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(RoleServiceInterface::class);
        $formElementManager = $container->get(FormElementManager::class);
        $form = $formElementManager->get(RoleForm::class);

        return new RoleRestAction($router, $service, $form);
    }
}
