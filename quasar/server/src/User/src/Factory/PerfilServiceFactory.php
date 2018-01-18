<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use User\Service\PerfilService;

class PerfilServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new PerfilService($entityManager);
    }
}
