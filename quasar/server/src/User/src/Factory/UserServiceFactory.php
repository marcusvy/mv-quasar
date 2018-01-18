<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use User\Service\PerfilServiceInterface;
use User\Service\UserService;

class UserServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        $perfilService = $container->get(PerfilServiceInterface::class);
        return new UserService($entityManager, $perfilService);
    }
}
