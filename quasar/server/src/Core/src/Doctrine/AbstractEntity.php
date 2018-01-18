<?php

namespace Core\Doctrine;

use Zend\Hydrator\ClassMethods;

abstract class AbstractEntity implements EntityInterface
{
    /** @var ClassMethods */
    protected $hydrator;

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
        return $result;
    }

    /**
     * Populate on form validation
     * @param $data
     * @return EntityInterface
     */
    public function exchangeArray($data)
    {
        $hydrator = new ClassMethods();
        return $hydrator->hydrate($data, $this);
    }
}
