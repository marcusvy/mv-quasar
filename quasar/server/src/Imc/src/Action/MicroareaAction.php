<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Microarea;
use Psr\Http\Server\MiddlewareInterface as ServerMiddlewareInterface;

class MicroareaAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Microarea::class;
}
