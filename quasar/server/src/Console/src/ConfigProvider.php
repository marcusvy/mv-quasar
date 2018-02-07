<?php

namespace Console;

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
                Command\ViewLogsCommand::class => Command\ViewLogsCommandFactory::class,
                Command\InstallCommand::class => Command\InstallCommandFactory::class,
            ],
        ];
    }

    public function getConsoleCommands()
    {
        return [
            'commands' => [
                Command\ViewLogsCommand::class,
                Command\InstallCommand::class,
            ],
        ];
    }
}
