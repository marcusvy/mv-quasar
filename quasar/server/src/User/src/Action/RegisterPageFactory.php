<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Interop\Container\ContainerInterface;
use User\Form\PerfilForm;
use User\Form\RegisterForm;
use User\Service\UserServiceInterface;

class RegisterPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $mailService = $container->get(MailServiceInterface::class);
        $service = $container->get(UserServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(RegisterForm::class);
        $formPerfil = $formElementManager->get(PerfilForm::class);

        return new RegisterPageAction($service, $mailService, $form, $formPerfil);
    }
}
