<?php

namespace Imc\Action;

use Imc\Service\LotacaoService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class LotacaoPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(LotacaoService::class);

        return new LotacaoAction($router, $entityManager, $service);
    }
}
