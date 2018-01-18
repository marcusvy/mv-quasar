<?php

namespace User;

use Core\Doctrine\Helper\ConfigProviderHelper;
use Psr\Http\Message\ServerRequestInterface;

/**
 * The configuration provider for the User module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{

    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'doctrine' => $this->getDoctrine(),
            'form_elements' => $this->getFormElements(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Action\FormPageAction::class => Factory\FormPageFactory::class,
                Action\AuthPageAction::class => Factory\AuthPageFactory::class,
                Action\ActivationPageAction::class => Factory\ActivationPageFactory::class,
                Action\RegisterPageAction::class => Factory\RegisterPageFactory::class,
                Action\UserRestAction::class => Factory\UserRestFactory::class,
                Action\PerfilRestAction::class => Factory\PerfilRestFactory::class,
                Action\RoleRestAction::class => Factory\RoleRestFactory::class,
                Adapter\AuthAdapter::class => Factory\AuthAdapterFactory::class,
                Service\AuthServiceInterface::class => Factory\AuthServiceFactory::class,
                Service\UserServiceInterface::class => Factory\UserServiceFactory::class,
                Service\PerfilServiceInterface::class => Factory\PerfilServiceFactory::class,
                Service\RoleServiceInterface::class => Factory\RoleServiceFactory::class,
                Middleware\AuthMiddleware::class => Factory\AuthMiddlewareFactory::class,
            ],
        ];
    }

    /**
     * Returns the Form configuration
     *
     * @return array
     */
    public function getFormElements()
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Form\Fieldset\RoleFieldset::class => Factory\RoleFieldsetFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'user' => [__DIR__ . '/../templates/user'],
            ],
        ];
    }

    /**
     * Returns the doctrine configuration
     *
     * @return array
     */
    public function getDoctrine()
    {
        $helper = new ConfigProviderHelper();
        return $helper->generate(
            __NAMESPACE__,
            __DIR__ . '/Entity'
        );
    }
}
