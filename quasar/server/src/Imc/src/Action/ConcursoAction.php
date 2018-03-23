<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Concurso;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class ConcursoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Concurso::class;
}
