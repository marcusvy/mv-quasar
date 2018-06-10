<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Psr\Http\Server\MiddlewareInterface;
use User\Model\Entity\Role;

class RoleRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Role::class;
}
