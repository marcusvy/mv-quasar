<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Interop\Container\ContainerInterface;
use User\Service\UserServiceInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ActivationFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(UserServiceInterface::class);
        $mail = $container->get(MailServiceInterface::class);
        $template = $container->get(TemplateRendererInterface::class);

        return new ActivationAction($service, $mail, $template);
    }
}
