<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Zend\I18n\ConfigProvider::class,
    \Zend\Serializer\ConfigProvider::class,
    \Zend\Paginator\ConfigProvider::class,
    \Zend\Mail\ConfigProvider::class,
    \Zend\Form\ConfigProvider::class,
    \Zend\InputFilter\ConfigProvider::class,
    \Zend\Filter\ConfigProvider::class,
    \Zend\Hydrator\ConfigProvider::class,
    \Zend\Validator\ConfigProvider::class,

    // Include cache configuration
    new ArrayProvider($cacheConfig),

    // Default App module config
    App\ConfigProvider::class,
    Core\ConfigProvider::class,
    Console\ConfigProvider::class,
    Log\ConfigProvider::class,
    Midia\ConfigProvider::class,
    User\ConfigProvider::class,

    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/conf.d/{{,*.}global,{,*.}local}.php'),
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
