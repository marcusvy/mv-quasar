<?php
namespace Core\Delegator;

use Interop\Container\ContainerInterface;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
use Zend\ServiceManager\Config;

/**
 * Class InputFilterManagerDelegatorFactory
 * @package Core\Delegator
 */
class InputFilterManagerDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var InputFilterPluginManager $inputFilterManager */
        $inputFilterManager = $callback();

        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['input_filters']) ? $config['input_filters'] : [];
        (new Config($config))->configureServiceManager($inputFilterManager);

        return $inputFilterManager;
    }
}
