<?php

namespace Console\Command;

use Console\Command\ViewLogsCommand;
use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;

class ViewLogsCommandFactory
{
    public function __invoke(ContainerInterface $container, $instance)
    {
        $entityManager = $container->has(EntityManagerInterface::class)
            ? $container->get(EntityManagerInterface::class)
            : null;
        $config = $container->get('config');

        return new ViewLogsCommand($entityManager, $config['console'], $instance);
    }
}
