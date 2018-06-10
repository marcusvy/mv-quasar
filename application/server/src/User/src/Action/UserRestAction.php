<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Psr\Http\Server\MiddlewareInterface;
use User\Model\Entity\User;


class UserRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = User::class;
}
