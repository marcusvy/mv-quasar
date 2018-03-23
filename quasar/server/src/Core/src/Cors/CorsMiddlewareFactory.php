<?php

namespace Core\Cors;

use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CorsMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        return new CorsMiddleware($config);
    }
}
