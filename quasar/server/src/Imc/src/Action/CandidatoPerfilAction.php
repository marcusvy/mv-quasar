<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\CandidatoPerfil;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class CandidatoPerfilAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = CandidatoPerfil::class;
}
