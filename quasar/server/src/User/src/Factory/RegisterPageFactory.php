<?php

namespace User\Factory;

use Core\Mail\MailServiceInterface;
use Interop\Container\ContainerInterface;
use User\Action\RegisterPageAction;
use User\Service\UserServiceInterface;

class RegisterPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $mailService = $container->get(MailServiceInterface::class);
        $service = $container->get(UserServiceInterface::class);

        return new RegisterPageAction($service, $mailService);
    }
}
