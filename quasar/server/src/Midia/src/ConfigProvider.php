<?php

namespace Midia;

use Core\Doctrine\Helper\ConfigProviderHelper;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

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
            'templates' => $this->getTemplates(),
            'doctrine' => $this->getDoctrine(),
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

    /**
     * Returns the doctrine configuration
     *
     * @return array
     */
    public function getDoctrine()
    {
        $config = new Confi
        return [
            'driver' => [
                'orm_default' => [
                    'drivers' => [
                        __NAMESPACE__ . '\Model\Entity' => __NAMESPACE__ . 'Entity',
                    ],
                ],
                __NAMESPACE__ . 'Entity' => [
                    'class' => AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => __DIR__ . '/Model/Entity',
                ],
            ],
        ];
    }
}
