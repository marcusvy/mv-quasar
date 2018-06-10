<?php

namespace Imc\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class MicroareaServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new MicroareaService($entityManager);
    }
}
