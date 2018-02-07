<?php
namespace User\Factory;

use Psr\Container\ContainerInterface;
use User\Middleware\AuthMiddleware;
use User\Service\AuthServiceInterface;

class AuthMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(AuthServiceInterface::class);
        return new AuthMiddleware($service);
    }
}
