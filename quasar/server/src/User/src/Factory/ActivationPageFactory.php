<?php

namespace User\Factory;

use Core\Mail\MailServiceInterface;
use Interop\Container\ContainerInterface;

use User\Action\ActivationPageAction;
use User\Service\UserServiceInterface;

class ActivationPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(UserServiceInterface::class);
        $mail = $container->get(MailServiceInterface::class);

        return new ActivationPageAction($service, $mail);
    }
}
