<?php

namespace Imc\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class CandidatoServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new CandidatoService($entityManager);
    }
}
