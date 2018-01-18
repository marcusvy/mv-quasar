<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use User\Adapter\AuthAdapter;
use User\Service\AuthService;
use User\Storage\AuthSession;

class AuthServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $storage = new AuthSession();
        $adapter = $container->get(AuthAdapter::class);
        return new AuthService($storage, $adapter);
    }
}
