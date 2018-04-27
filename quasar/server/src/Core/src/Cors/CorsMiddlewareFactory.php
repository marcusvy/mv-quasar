<?php

namespace Core\Cors;

use Psr\Container\ContainerInterface;

class CorsMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new CorsMiddleware($config);
    }
}
