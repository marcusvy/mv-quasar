<?php

namespace User\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PerfilServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new PerfilService($entityManager);
    }
}
