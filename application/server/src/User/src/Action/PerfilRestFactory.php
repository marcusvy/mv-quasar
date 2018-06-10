<?php

namespace User\Action;

use Core\Manager\FormElementManager;
use Interop\Container\ContainerInterface;
use User\Form\PerfilForm;
use User\Service\PerfilServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class PerfilRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(PerfilServiceInterface::class);
        $formElementManager = $container->get(FormElementManager::class);
        $form = $formElementManager->get(PerfilForm::class);

        return new PerfilRestAction($router, $service, $form);
    }
}
