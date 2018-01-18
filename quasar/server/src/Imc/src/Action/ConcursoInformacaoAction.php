<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\ConcursoInformacao;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class ConcursoInformacaoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = ConcursoInformacao::class;
}
