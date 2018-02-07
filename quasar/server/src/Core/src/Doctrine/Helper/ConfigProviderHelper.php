<?php

namespace Core\Doctrine\Helper;

use \Doctrine\ORM\Mapping\Driver\AnnotationDriver;

/**
 * Helper for ConfigProvider
 */
class ConfigProviderHelper
{
    public function generate($namespace, $paths)
    {
        return [
        'driver' => [
          'orm_default' => [
            'drivers' => [
              $namespace.'\Model\Entity' => $namespace.'Entity',
            ],
          ],
            $namespace.'Entity' => [
              'class' => AnnotationDriver::class,
              'cache' => 'array',
              'paths' => $paths,
            ],
          ],
        ];
    }
}
