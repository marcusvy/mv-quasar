<?php
namespace MvBase\Controller;

interface RestfulControllerInterface
{
  /**
   * @return \Doctrine\ORM\EntityManager
   */

    public function getEntityManager();
}
