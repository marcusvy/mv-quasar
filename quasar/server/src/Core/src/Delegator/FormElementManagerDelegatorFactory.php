<?php

namespace Core\Delegator;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;
use Zend\ServiceManager\Config;

/**
 * FormElementManagerDelegatorFactory
 * @package Core\Delegator
 */
class FormElementManagerDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $formElementManager = $callback();

        $config = $container->has('config') ? $container->get('config') : [];
        $config = isset($config['form_elements']) ? $config['form_elements'] : [];

        if (!empty($config)) {
            (new Config($config))->configureServiceManager($formElementManager);
        }

        return $formElementManager;
    }
}
