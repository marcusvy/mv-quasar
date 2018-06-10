<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\ConcursoInformacao;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class ConcursoInformacaoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = ConcursoInformacao::class;
}
