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
        $helper = new ConfigProviderHelper();
        return $helper->generate(
            __NAMESPACE__,
            __DIR__ . '/Entity'
        );
    }
}
