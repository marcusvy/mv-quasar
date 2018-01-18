<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;

use User\Action\ActivationPageAction;
use User\Service\UserServiceInterface;

class ActivationPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(UserServiceInterface::class);
        return new ActivationPageAction($service);
    }
}
