<?php

namespace Log\Action;

use Interop\Container\ContainerInterface;
use Log\Service\LoggerServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class LoggerRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(LoggerServiceInterface::class);

        return new LoggerRestAction($router, $service);
    }
}
