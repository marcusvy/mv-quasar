<?php

namespace Imc\Action;

use Imc\Service\CandidatoService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class CandidatoPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(CandidatoService::class);

        return new CandidatoAction($router, $entityManager, $service);
    }
}
