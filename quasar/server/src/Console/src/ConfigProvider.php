<?php

namespace Console;

use Core\Doctrine\Helper\ConfigProviderHelper;

/**
 * The configuration provider for the Console module
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
            'console' => $this->getConsoleCommands(),
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
            'factories'  => [
                Command\ViewUsersCommand::class => Factory\ViewUsersCommandFactory::class,
            ],
        ];
    }

    public function getConsoleCommands() {
        return [
            'commands'  => [
                Command\ViewUsersCommand::class
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