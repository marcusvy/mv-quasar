<?php

namespace User\Adapter;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use User\Model\Entity\User;

class AuthAdapterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(User::class);
        return new AuthAdapter($repository);
    }
}
