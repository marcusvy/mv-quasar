<?php

namespace User\Action;

use Core\Manager\FormElementManager;
use Interop\Container\ContainerInterface;
use User\Form\LoginForm;
use User\Service\AuthServiceInterface;
use User\Service\UserServiceInterface;

class AuthenticationFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(AuthServiceInterface::class);
        $userService = $container->get(UserServiceInterface::class);
        $formElementManager = $container->get(FormElementManager::class);
        $form = $formElementManager->get(LoginForm::class);

        return new AuthenticationAction($service, $userService, $form);
    }
}
