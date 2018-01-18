<?php

namespace Log\Action;

use Core\Action\AbstractRestAction;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Log\Entity\Logger;

class LoggerRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Logger::class;
}
