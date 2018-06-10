<?php

namespace User\Service;

use Interop\Container\ContainerInterface;
use User\Adapter\AuthAdapter;
use Zend\Authentication\Storage\NonPersistent;

class AuthServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $storage = new NonPersistent();
        $adapter = $container->get(AuthAdapter::class);
        return new AuthService($storage, $adapter);
    }
}
