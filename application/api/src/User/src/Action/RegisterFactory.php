<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Core\Manager\FormElementManager;
use Interop\Container\ContainerInterface;
use User\Form\PerfilForm;
use User\Form\RegisterForm;
use User\Service\PerfilServiceInterface;
use User\Service\UserServiceInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class RegisterFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $formElementManager = $container->get(FormElementManager::class);
        $userService = $container->get(UserServiceInterface::class);
        $perfilService = $container->get(PerfilServiceInterface::class);
        $mailService = $container->get(MailServiceInterface::class);
        $form = $formElementManager->get(RegisterForm::class);
        $formPerfil = $formElementManager->get(PerfilForm::class);

        return new RegisterAction($template, $userService, $perfilService, $mailService, $form, $formPerfil);
    }
}
