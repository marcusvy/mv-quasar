<?php 

use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationConfigInjectionDelegator;

return [
    'dependencies' => [
        'delegators' => [
            Application::class => [
                ApplicationConfigInjectionDelegator::class,
            ],
        ],
    ],
];