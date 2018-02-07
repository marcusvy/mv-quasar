<?php

namespace User;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

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
                Action\FormPageAction::class => Action\FormPageFactory::class,
                Action\AuthPageAction::class => Action\AuthPageFactory::class,
                Action\ActivationPageAction::class => Action\ActivationPageFactory::class,
                Action\RegisterPageAction::class => Action\RegisterPageFactory::class,
                Action\UserRestAction::class => Action\UserRestFactory::class,
                Action\PerfilRestAction::class => Action\PerfilRestFactory::class,
                Action\RoleRestAction::class => Action\RoleRestFactory::class,
                Adapter\AuthAdapter::class => Adapter\AuthAdapterFactory::class,
                Service\AuthServiceInterface::class => Service\AuthServiceFactory::class,
                Service\UserServiceInterface::class => Service\UserServiceFactory::class,
                Service\PerfilServiceInterface::class => Service\PerfilServiceFactory::class,
                Service\RoleServiceInterface::class => Service\RoleServiceFactory::class,
                Middleware\AuthMiddleware::class => Middleware\AuthMiddlewareFactory::class,
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

    public function getRoutes()
    {
        return [
            [
                'path' => '/test-form',
                'middleware' => Action\FormPageAction::class,
                'name' => 'QuasarUser.teste',
                'allowed_methods' => ['GET', 'POST']
            ], [
                'path' => '/api/auth',
                'middleware' => Action\AuthPageAction::class,
                'name' => 'QuasarUser.auth.login',
                'allowed_methods' => ['GET', 'POST']
            ],[
                'path' => '/api/user/list[/{page:\d+}]',
                'middleware' => Action\UserRestAction::class,
                'name' => 'QuasarUser.user.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/user[/{id:\d+}]',
                'middleware' => Action\UserRestAction::class,
                'name' => 'QuasarUser.user',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ], [
                'path' => '/api/user-perfil/list[/{page:\d+}]',
                'middleware' => Action\PerfilRestAction::class,
                'name' => 'QuasarUser.user.perfil.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/user-perfil[/{id:\d+}]',
                'middleware' => Action\PerfilRestAction::class,
                'name' => 'QuasarUser.user.perfil',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ], [
                'path' => '/api/user-role/list[/{page:\d+}]',
                'middleware' => Action\RoleRestAction::class,
                'name' => 'QuasarUser.user.role.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/user-role[/[{id:\d+}]]',
                'middleware' => Action\RoleRestAction::class,
                'name' => 'QuasarUser.user.role',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ], [
                'path' => '/api/user/register',
                'middleware' => Action\RegisterPageAction::class,
                'name' => 'QuasarUser.user.register',
                'allowed_methods' => ['POST']
            ], [
                'path' => '/api/user/activate/for/{credential}/by/{key}',
                'middleware' => Action\ActivationPageAction::class,
                'name' => 'QuasarUser.user.activation',
                'allowed_methods' => ['GET']
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
        return [
            'driver' => [
                'orm_default' => [
                    'drivers' => [
                        __NAMESPACE__.'\Model\Entity' => __NAMESPACE__.'Entity',
                    ],
                ],
                __NAMESPACE__.'Entity' => [
                    'class' => AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => __DIR__ . '/Model/Entity',
                ],
            ],
        ];
    }
}
