<?php
use \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain;
use \Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
  'doctrine' => [
    'driver' => [
      'orm_default' => [
        'class' => MappingDriverChain::class,
      ],
    ],
  ],
];
