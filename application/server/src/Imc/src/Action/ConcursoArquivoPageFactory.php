<?php

namespace Imc\Action;

use Imc\Service\ConcursoArquivoService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class ConcursoArquivoPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(ConcursoArquivoService::class);

        return new ConcursoArquivoAction($router, $entityManager, $service);
    }
}
