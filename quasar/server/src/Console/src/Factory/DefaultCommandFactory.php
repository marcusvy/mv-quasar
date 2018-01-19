<?php

namespace Console\Factory;

use Doctrine\DBAL\Driver\PDOException;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class DefaultCommandFactory
{
    public function __invoke(ContainerInterface $container, $instance)
    {
        $entityManager = null;
        try {
            $entityManager = $container->get(EntityManager::class);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return new $instance($entityManager, $instance);
    }
}
