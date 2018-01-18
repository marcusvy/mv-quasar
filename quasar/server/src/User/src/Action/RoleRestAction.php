<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use User\Entity\Role;

class RoleRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Role::class;
}
