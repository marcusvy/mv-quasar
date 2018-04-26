<?php

namespace User;

use Core\Doctrine\Helper\ConfigProviderHelper;
use PHPUnit\Runner\Exception;

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
            'routes' => $this->getRoutes(),
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
                Action\ActivationPageAction::class => Action\ActivationPageFactory::class,
                Action\AuthPageAction::class => Action\AuthPageFactory::class,
                Action\PerfilRestAction::class => Action\PerfilRestFactory::class,
                Action\RegisterPageAction::class => Action\RegisterPageFactory::class,
                Action\RoleRestAction::class => Action\RoleRestFactory::class,
                Action\UserRestAction::class => Action\UserRestFactory::class,
                Adapter\AuthAdapter::class => Adapter\AuthAdapterFactory::class,
                Middleware\AuthMiddleware::class => Middleware\AuthMiddlewareFactory::class,
                Service\AuthServiceInterface::class => Service\AuthServiceFactory::class,
                Service\PerfilServiceInterface::class => Service\PerfilServiceFactory::class,
                Service\RoleServiceInterface::class => Service\RoleServiceFactory::class,
                Service\UserServiceInterface::class => Service\UserServiceFactory::class,
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
//            'factories' => [
//                Form\Fieldset\RoleFieldsetTrait::class => Form\Fieldset\RoleFieldsetFactory::class,
//            ],
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
     **
     * Returns the doctrine configuration
     *
     * @return array
     */
    public function getDoctrine()
    {
        return ConfigProviderHelper::generate(__NAMESPACE__, __DIR__ . '/Model/Entity');
    }

    /**
     * Return the route configuration
     * @return array
     */
    public function getRoutes()
    {
        return [
            [
                'path' => '/api/auth',
                'middleware' => Action\AuthPageAction::class,
                'name' => 'QuasarUser.auth.login',
                'allowed_methods' => ['GET', 'POST']
            ],
            [
                'path' => '/api/user/register',
                'middleware' => Action\RegisterPageAction::class,
                'name' => 'QuasarUser.user.register',
                'allowed_methods' => ['POST']
            ],
            [
                'path' => '/api/user/activate/for/{credential}/by/{key}',
                'middleware' => Action\ActivationPageAction::class,
                'name' => 'QuasarUser.user.activation',
                'allowed_methods' => ['GET']
            ],
            [
                'path' => '/api/user/page[/{page:\d+}]',
                'middleware' => Action\UserRestAction::class,
                'name' => 'QuasarUser.user.pagination',
                'allowed_methods' => ['GET']
            ],
            [
                'path' => '/api/user[/{id:\d+}]',
                'middleware' => Action\UserRestAction::class,
                'name' => 'QuasarUser.user',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE']
            ],
            [
                'path' => '/api/user-perfil/page[/{page:\d+}]',
                'middleware' => Action\PerfilRestAction::class,
                'name' => 'QuasarUser.user.perfil.pagination',
                'allowed_methods' => ['GET']
            ],
            [
                'path' => '/api/user-perfil[/{id:\d+}]',
                'middleware' => Action\PerfilRestAction::class,
                'name' => 'QuasarUser.user.perfil',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE']
            ],
            [
                'path' => '/api/user-role[/[{id:\d+}]]',
                'middleware' => Action\RoleRestAction::class,
                'name' => 'QuasarUser.user.role',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE']
            ],
            [
                'path' => '/api/user-role/page[/{page:\d+}]',
                'middleware' => Action\RoleRestAction::class,
                'name' => 'QuasarUser.user.role.pagination',
                'allowed_methods' => ['GET']
            ],
        ];
    }


}
