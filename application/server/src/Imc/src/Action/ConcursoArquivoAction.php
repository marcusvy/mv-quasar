<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\ConcursoArquivo;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class ConcursoArquivoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = ConcursoArquivo::class;
}
