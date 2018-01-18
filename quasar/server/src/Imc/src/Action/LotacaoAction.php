<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Lotacao;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class LotacaoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Lotacao::class;
}
