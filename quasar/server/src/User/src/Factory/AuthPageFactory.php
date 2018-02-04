<?php

namespace User\Factory;

use Interop\Container\ContainerInterface;
use User\Action\AuthPageAction;
use User\Adapter\AuthAdapter;
use User\Form\LoginForm;
use User\Service\AuthServiceInterface;
use User\Service\UserServiceInterface;

class AuthPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(AuthServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(LoginForm::class);

        return new AuthPageAction($service, $form);
    }
}
