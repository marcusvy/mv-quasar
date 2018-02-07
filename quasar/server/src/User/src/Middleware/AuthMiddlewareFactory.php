<?php
namespace User\Middleware;

use Psr\Container\ContainerInterface;
use User\Service\AuthServiceInterface;

class AuthMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(AuthServiceInterface::class);
        return new AuthMiddleware($service);
    }
}
