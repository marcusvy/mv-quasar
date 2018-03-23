<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\CandidatoPerfil;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class CandidatoPerfilAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = CandidatoPerfil::class;
}
