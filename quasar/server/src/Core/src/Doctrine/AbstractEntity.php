<?php

namespace Core\Doctrine;

use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorAwareInterface;
use Zend\Hydrator\HydratorAwareTrait;

abstract class AbstractEntity implements EntityInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->hydradorSetup($options);
    }

    protected function hydradorSetup($options)
    {
        $this->hydrator = new ClassMethods();
        $this->hydrator->hydrate($options, $this);
    }

    /**
     * Transforma a entidade em um array
     * @return array
     */
    public function toArray()
    {
        $hydrator = new ClassMethods();
        $result = $hydrator->extract($this);
        unset($result['hydrator']);
        return $result;
    }

    /**
     * Populate on form validation
     * @param $data
     * @return array|object
     */
    public function exchangeArray($data)
    {
        $hydrator = new ClassMethods();
        return $hydrator->hydrate($data, $this);
    }
}
