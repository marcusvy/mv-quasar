<?php

namespace Core\Mail;

use Interop\Container\ContainerInterface;

class MailServiceFactory
{
    const CONFIG_MAIL = 'mail';

    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        return new MailService($config[self::CONFIG_MAIL]);
    }
}
