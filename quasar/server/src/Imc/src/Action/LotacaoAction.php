<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Lotacao;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class LotacaoAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Lotacao::class;
}
