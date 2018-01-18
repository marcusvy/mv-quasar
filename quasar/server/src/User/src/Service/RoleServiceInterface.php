<?php
namespace User\Service;

use Core\Service\ServiceInterface;

interface RoleServiceInterface extends ServiceInterface
{
    /**
     * @return array
     */
    public function getNamesForSelect();
}
