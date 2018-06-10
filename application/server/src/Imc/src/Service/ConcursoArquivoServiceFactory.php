<?php

namespace Imc\Service;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class ConcursoArquivoServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->get(EntityManager::class);
        return new ConcursoArquivoService($entityManager);
    }
}
