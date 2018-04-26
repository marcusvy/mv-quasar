<?php

namespace Core;

/**
 * The configuration provider for the Core module
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
            'aliases' => [
                Manager\FormElementManager::class => 'FormElementManager'
            ],
            'invokables' => [
            ],
            'factories' => [
                Action\DoctrineAction::class => Action\DoctrineActionFactory::class,
                Cors\CorsMiddleware::class => Cors\CorsMiddlewareFactory::class,
                Mail\MailServiceInterface::class => Mail\MailServiceFactory::class,
                I18n\I18nMiddleware::class => I18n\I18nMiddlewareFactory::class,
            ],
            'delegators' => [
//                'MvcTranslator' => [
//                    Delegator\I18nDelegator::class,
//                ],
                'HydratorManager' => [
                    Delegator\HydratorManagerDelegatorFactory::class,
                ],
                'InputFilterManager' => [
                    Delegator\InputFilterManagerDelegatorFactory::class,
                ],
                'FormElementManager' => [
                    Delegator\FormElementManagerDelegatorFactory::class,
                ],
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
                'path' => '/quasar/core',
                'middleware' => Action\InstallAction::class,
                'name' => 'QuasarCoreInstall',
                'allowed_methods' => ['GET']
            ],
            [
                'path' => '/quasar/core/doctrine',
                'middleware' => Action\DoctrineAction::class,
                'name' => 'QuasarCore.Doctrine',
                'allowed_methods' => ['GET']
            ],
        ];
    }
}
