<?php

namespace Log\Service;

use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;

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
