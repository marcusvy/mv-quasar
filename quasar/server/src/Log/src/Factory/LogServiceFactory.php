<?php

namespace Log\Factory;

use Interop\Container\ContainerInterface;
use Log\Service\LoggerServiceInterface;
use Log\Service\LogService;
use Log\Service\LogServiceInterface;

class LogServiceFactory
{
    const LOG_CONFIG_TOKEN = 'log';

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return LogServiceInterface|object
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(LoggerServiceInterface::class);
        $config = $container->get('config');

        return new LogService($service, $config[self::LOG_CONFIG_TOKEN]);
    }
}
