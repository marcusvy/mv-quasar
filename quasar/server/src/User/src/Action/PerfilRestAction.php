<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use User\Entity\Perfil;

class PerfilRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Perfil::class;
}
