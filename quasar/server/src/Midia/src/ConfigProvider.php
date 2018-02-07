<?php

namespace Midia;

use Core\Doctrine\Helper\ConfigProviderHelper;

/**
 * The configuration provider for the Midia module
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
//            'templates' => $this->getTemplates(),
            'doctrine' => $this->getDoctrine(),
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
                Action\AudioRestAction::class => Action\AudioRestFactory::class,
                Action\ImageRestAction::class => Action\ImageRestFactory::class,
                Action\VideoRestAction::class => Action\VideoRestFactory::class,
                Service\AudioServiceInterface::class => Service\AudioServiceFactory::class,
                Service\ImageServiceInterface::class => Service\ImageServiceFactory::class,
                Service\VideoServiceInterface::class => Service\VideoServiceFactory::class,
            ],
        ];
    }


    public function getRoutes()
    {
        return [
            [
                'path' => '/api/midia/audio/list[/{page:\d+}]',
                'middleware' => Action\AudioRestAction::class,
                'name' => 'QuasarUser.midia.audio.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/midia/audio[/{id:\d+}]',
                'middleware' => Action\AudioRestAction::class,
                'name' => 'QuasarUser.midia.audio',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ], [
                'path' => '/api/midia/image/list[/{page:\d+}]',
                'middleware' => Action\ImageRestAction::class,
                'name' => 'QuasarUser.midia.image.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/midia/image[/{id:\d+}]',
                'middleware' => Action\ImageRestAction::class,
                'name' => 'QuasarUser.midia.image',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ], [
                'path' => '/api/midia/video/list[/{page:\d+}]',
                'middleware' => Action\VideoRestAction::class,
                'name' => 'QuasarUser.midia.video.pagination',
                'allowed_methods' => ['GET']
            ], [
                'path' => '/api/midia/video[/{id:\d+}]',
                'middleware' => Action\VideoRestAction::class,
                'name' => 'QuasarUser.midia.video',
                'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
            ]
        ];
    }

//    /**
//     * Returns the templates configuration
//     *
//     * @return array
//     */
//    public function getTemplates()
//    {
//        return [
//            'paths' => [
//                'app' => [__DIR__ . '/../templates/app'],
//                'error' => [__DIR__ . '/../templates/error'],
//                'layout' => [__DIR__ . '/../templates/layout'],
//            ],
//        ];
//    }

    /**
     * Returns the doctrine configuration
     *
     * @return array
     */
    public function getDoctrine()
    {
        return ConfigProviderHelper::generate(__NAMESPACE__, __DIR__ . '/Model/Entity');
    }
}
