<?php

namespace Core\I18n;

use Psr\Container\ContainerInterface;

class I18nMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $configI18n = isset($config['i18n']) ? $config['i18n'] : [];
        return new I18nMiddleware($configI18n);
    }
}
