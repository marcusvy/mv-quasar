<?php

namespace Imc\Action;

use Imc\Service\CandidatoPerfilService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class CandidatoPerfilPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(CandidatoPerfilService::class);

        return new CandidatoPerfilAction($router, $entityManager, $service);
    }
}
