<?php

namespace Imc\Action;

use Core\Action\AbstractRestAction;
use Imc\Entity\Microarea;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;

class MicroareaAction extends AbstractRestAction implements ServerMiddlewareInterface
{
    protected $entity = Microarea::class;
}
