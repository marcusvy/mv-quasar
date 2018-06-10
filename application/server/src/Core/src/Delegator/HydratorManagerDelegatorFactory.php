<?php
namespace Core\Delegator;

use Interop\Container\ContainerInterface;
use Zend\Hydrator\HydratorPluginManager;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
use Zend\ServiceManager\Config;

/**
 * Class HydratorManagerDelegatorFactory
 * @package Core\Delegator
 */
class HydratorManagerDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var HydratorPluginManager $hydratorManager */
        $hydratorManager = $callback();

        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['hydrators']) ? $config['hydrators'] : [];

        (new Config($config))->configureServiceManager($hydratorManager);

        return $hydratorManager;
    }
}
