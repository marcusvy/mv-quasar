<?php

namespace Log\Factory;

use Interop\Container\ContainerInterface;
use Log\Service\LogServiceInterface;
use Log\Middleware\LoggerMiddleware;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoggerMiddlewareFactory implements FactoryInterface
{
    const LOG_CONFIG_TOKEN = 'log';

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(LogServiceInterface::class);
        return new LoggerMiddleware($service);
    }
}
