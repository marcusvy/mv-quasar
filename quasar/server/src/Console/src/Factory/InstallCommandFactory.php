<?php

namespace Console\Factory;

use Console\Command\InstallCommand;
use Interop\Container\ContainerInterface;
use User\Service\UserServiceInterface;

class InstallCommandFactory
{
    public function __invoke(ContainerInterface $container, $instance)
    {
        $userService = $container->get(UserServiceInterface::class);
        $config = $container->get('config');

        return new InstallCommand($userService, $config, $instance);
    }
}
