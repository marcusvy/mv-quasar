<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Interop\Container\ContainerInterface;
use User\Form\PerfilForm;
use User\Form\RegisterForm;
use User\Service\PerfilServiceInterface;
use User\Service\UserServiceInterface;

class RegisterPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $formElementManager = $container->get('FormElementManager');
        $userService = $container->get(UserServiceInterface::class);
        $perfilService = $container->get(PerfilServiceInterface::class);
        $mailService = $container->get(MailServiceInterface::class);
        $form = $formElementManager->get(RegisterForm::class);
        $formPerfil = $formElementManager->get(PerfilForm::class);

        return new RegisterPageAction($userService, $perfilService, $mailService, $form, $formPerfil);
    }
}
