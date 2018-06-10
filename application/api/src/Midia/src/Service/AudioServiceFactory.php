<?php

namespace Midia\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class AudioServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new AudioService($entityManager);
    }
}
