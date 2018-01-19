<?php

namespace Log\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Log\Service\LoggerService;

class LoggerServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new LoggerService($entityManager);
    }
}
