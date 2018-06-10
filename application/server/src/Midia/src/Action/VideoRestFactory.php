<?php

namespace Midia\Action;

use Interop\Container\ContainerInterface;
use Midia\Form\VideoForm;
use Midia\Service\VideoServiceInterface;
use Zend\Expressive\Router\RouterInterface;

class VideoRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(VideoServiceInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(VideoForm::class);

        return new VideoRestAction($router, $service, $form);
    }
}
