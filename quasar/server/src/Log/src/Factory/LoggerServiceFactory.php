<?php

namespace Log\Factory;

use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;
use Log\Service\LoggerService;

class LoggerServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->has(EntityManagerInterface::class)
            ? $container->get(EntityManagerInterface::class)
            : null;
        return new LoggerService($entityManager);
    }
}
