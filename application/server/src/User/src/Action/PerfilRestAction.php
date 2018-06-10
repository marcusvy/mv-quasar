<?php

namespace User\Action;

use Core\Action\AbstractRestAction;
use Psr\Http\Server\MiddlewareInterface;
use User\Model\Entity\Perfil;

class PerfilRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Perfil::class;
}
