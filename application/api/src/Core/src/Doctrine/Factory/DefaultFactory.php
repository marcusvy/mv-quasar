<?php

namespace Core\Doctrine\Factory;

use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DefaultFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $container, $action, array $options = null)
    {
        /** @var EntityManagerInterface $em */
        $em = $container->has(EntityManagerInterface::class)
            ? $container->get(EntityManagerInterface::class)
            : null;
        return new $action($em);
    }
}
