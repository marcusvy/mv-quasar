<?php
namespace Core\Doctrine;

interface EntityInterface
{
  /**
   * Return the array representation of entity
   * @return array
   */
    public function toArray();

  /**
   * Transforma a entidade em um array
   * @return array
   */
    public function exchangeArray($data);
}
