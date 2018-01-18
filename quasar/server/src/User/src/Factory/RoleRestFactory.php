<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use User\Action\RoleRestAction;
use User\Service\RoleServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class RoleRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(RoleServiceInterface::class);

        return new RoleRestAction($router, $service);
    }
}
