<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Candidato;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class CandidatoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Candidato::class;
}
