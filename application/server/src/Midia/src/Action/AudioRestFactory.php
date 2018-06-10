<?php

namespace Midia\Action;

use Interop\Container\ContainerInterface;
use Midia\Form\AudioForm;
use Midia\Service\AudioServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class AudioRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(AudioServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(AudioForm::class);

        return new AudioRestAction($router, $service,$form);
    }
}
