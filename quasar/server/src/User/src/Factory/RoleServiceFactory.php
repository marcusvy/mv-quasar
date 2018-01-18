<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use User\Service\RoleService;

class RoleServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new RoleService($entityManager);
    }
}
