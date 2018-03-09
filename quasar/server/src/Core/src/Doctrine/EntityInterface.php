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
   * @param mixed $options
   * @return EntityInterface
   */
  public function hydrate($options);

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
