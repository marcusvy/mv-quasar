<?php

namespace Log\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Log\Service\LoggerService;
use Log\Service\LoggerServiceInterface;

class LoggerServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return LoggerServiceInterface|object
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get(EntityManager::class);
        return new LoggerService($entityManager);
    }
}
