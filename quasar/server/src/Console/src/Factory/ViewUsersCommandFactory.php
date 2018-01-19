<?php

namespace Console\Factory;

use Console\Command\ViewUsersCommand;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class ViewUsersCommandFactory
{
    public function __invoke(ContainerInterface $container, $instance)
    {
        $em = $container->get(EntityManager::class);

        return new ViewUsersCommand($em, $instance);
    }
}
