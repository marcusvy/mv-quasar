<?php

namespace User\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class UserServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        $perfilService = $container->get(PerfilServiceInterface::class);

        return new UserService($entityManager, $perfilService);
    }
}
