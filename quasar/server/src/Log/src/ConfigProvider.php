<?php

namespace Log;

use Core\Doctrine\Helper\ConfigProviderHelper;

/**
 * The configuration provider for the Log module
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
            'doctrine' => $this->getDoctrine(),
            'templates'    => $this->getTemplates(),
            'routes' => $this->getRoutes(),
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
                Action\LoggerRestAction::class => Factory\LoggerRestFactory::class,
                Middleware\LoggerMiddleware::class => Factory\LoggerMiddlewareFactory::class,
                Service\LogServiceInterface::class => Factory\LogServiceFactory::class,
                Service\LoggerServiceInterface::class => Factory\LoggerServiceFactory::class,
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
                'app' => [__DIR__ . '/../templates/app'],
                'error' => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }

    public function getRoutes(): array
    {
        return [
            [
                'path' => '/quasar/log',
                'middleware' => Action\InstallAction::class,
                'name' => 'QuasarLogInstall',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/logger/list[/{page:\d+}]',
                'middleware' => Action\LoggerRestAction::class,
                'name' => 'logger.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/logger[/[{id:\d+}]]',
                'middleware' => Action\LoggerRestAction::class,
                'name' => 'logger.role',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
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
