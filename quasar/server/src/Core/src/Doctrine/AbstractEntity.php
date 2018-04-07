<?php

namespace Core\Doctrine;

use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\HydratorAwareInterface;
use Zend\Hydrator\HydratorAwareTrait;

abstract class AbstractEntity implements EntityInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;

    protected $__filtered = false;

    /**
     * Array of properties that exclude from toArray method result
     * @var array
     */
    protected $__protectedProperties = [];

    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->hydradorSetup($options);
    }

    /**
     * @param array $options
     * @return AbstractEntity
     */
    public function hydradorSetup($options = [])
    {
        $this->hydrator = new ClassMethods();
        $this->getHydrator()->hydrate($options, $this);
        return $this;
    }
    /**
     * @param bool $filtered
     * @return AbstractEntity
     */
    public function setFiltered(bool $filtered): AbstractEntity
    {
        $this->__filtered = $filtered;
        return $this;
    }

    /**
     * @param array $protectedProperties
     */
    public function setProtectedProperties(array $protectedProperties): void
    {
        $this->__protectedProperties = $protectedProperties;
    }

    /**
     * Transform entity to array
     * @return array
     */
    public function toArray()
    {
        $result = $this->getHydrator()->extract($this);
        unset($result['hydrator']);
        if($this->__filtered){
            foreach ($this->__protectedProperties as $property) {
                unset($result[$property]);
            }
        }
        return $result;
    }

    /**
     * Populate on form validation
     * @param $data
     * @return array|object
     */
    public function exchangeArray($data)
    {
        return $this->getHydrator()->hydrate($data, $this);
    }
}
