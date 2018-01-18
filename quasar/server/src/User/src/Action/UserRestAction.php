<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use User\Entity\User;

class UserRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = User::class;
}
