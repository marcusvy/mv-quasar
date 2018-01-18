<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\ConcursoArquivo;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class ConcursoArquivoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = ConcursoArquivo::class;
}
