<?php

namespace Imc\Action;

use Imc\Service\ConcursoInformacaoService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class ConcursoInformacaoPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(ConcursoInformacaoService::class);

        return new ConcursoInformacaoAction($router, $entityManager, $service);
    }
}
