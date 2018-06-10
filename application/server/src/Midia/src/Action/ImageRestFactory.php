<?php

namespace Midia\Action;

use Interop\Container\ContainerInterface;
use Midia\Form\ImageForm;
use Midia\Service\ImageServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class ImageRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(ImageServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(ImageForm::class);

        return new ImageRestAction($router, $service, $form);
    }
}
