<?php

namespace User\Action;

use Interop\Container\ContainerInterface;
use User\Service\PerfilServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class PerfilRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(PerfilServiceInterface::class);

        return new PerfilRestAction($router, $service);
    }
}
