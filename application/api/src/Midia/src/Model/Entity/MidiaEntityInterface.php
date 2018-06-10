<?php
/**
 * Created by PhpStorm.
 * User: marcu
 * Date: 10/02/2018
 * Time: 02:07
 */

namespace Midia\Model\Entity;

use Core\Doctrine\EntityInterface;

interface MidiaEntityInterface extends EntityInterface
{
    /**
     * @return string|array
     */
    public function getFile();

    /**
     * @param string $file
     * @return Midia
     */
    public function setFile($file = null): Midia;
}