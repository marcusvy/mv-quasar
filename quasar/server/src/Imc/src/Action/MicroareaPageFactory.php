<?php

namespace Imc\Action;

use Imc\Service\MicroareaService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Doctrine\ORM\EntityManager;

class MicroareaPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $entityManager = $container->get(EntityManager::class);
        $service = $container->get(MicroareaService::class);

        return new MicroareaAction($router, $entityManager, $service);
    }
}
