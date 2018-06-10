<?php

use \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use \Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use ContainerInteropDoctrine\EntityManagerFactory;

return [
    'dependencies' => [
        'factories' => [
            EntityManagerInterface::class => EntityManagerFactory::class,
            EntityManager::class => EntityManagerFactory::class,
        ]
    ],
    'doctrine' => [
        'driver' => [
            'orm_default' => [
                'class' => MappingDriverChain::class,
            ],
        ],
    ],
];
