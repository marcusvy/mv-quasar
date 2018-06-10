<?php

namespace Core\Doctrine;

interface EntityInterface
{

    /**
     * @param mixed $options
     * @return EntityInterface
     */
    public function hydradorSetup($options);

    /**
     * Return the array representation of entity
     * @return array
     */
    public function toArray();

    /**
     * Transforma a entidade em um array
     * @param $data
     * @return array|object
     */
    public function exchangeArray($data);

}
