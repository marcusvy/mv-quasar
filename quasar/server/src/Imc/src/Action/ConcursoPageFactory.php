<?php

namespace Imc\Action;

use Imc\Service\ConcursoService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class ConcursoPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(ConcursoService::class);

        return new ConcursoAction($router, $entityManager, $service);
    }
}
