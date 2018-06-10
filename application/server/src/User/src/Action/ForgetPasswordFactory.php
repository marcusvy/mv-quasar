<?php

namespace User\Action;

use Core\Config\ServerInfo;
use Core\Mail\MailServiceInterface;
use Core\Manager\FormElementManager;
use Interop\Container\ContainerInterface;
use User\Form\ChangePasswordForm;
use User\Form\ForgetPasswordForm;
use User\Service\UserServiceInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ForgetPasswordFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(UserServiceInterface::class);
        $mail = $container->get(MailServiceInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $formElementManager = $container->get(FormElementManager::class);
        $formForgetPassword = $formElementManager->get(ForgetPasswordForm::class);
        $formChangePassword = $formElementManager->get(ChangePasswordForm::class);
        $config = $container->get(ServerInfo::class);

        return new ForgetPasswordAction(
            $service,
            $mail,
            $template,
            $formForgetPassword,
            $formChangePassword,
            $config
        );
    }
}
