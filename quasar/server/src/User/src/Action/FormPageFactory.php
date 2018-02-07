<?php

namespace User\Action;

use Interop\Container\ContainerInterface;
use User\Form\SimpleForm;
use Zend\Expressive\Template\TemplateRendererInterface;

class FormPageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        $formElementManager = $container->get('FormElementManager');
        $form = $formElementManager->get(SimpleForm::class);

        return new FormPageAction($template, $form);
    }
}
