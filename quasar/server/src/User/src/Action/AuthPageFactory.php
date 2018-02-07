<?php

namespace User\Action;

use Interop\Container\ContainerInterface;
use User\Form\LoginForm;
use User\Service\AuthServiceInterface;

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
