<?php

namespace Log\Action;

use Core\Action\AbstractRestAction;
use Psr\Http\Server\MiddlewareInterface;
use Log\Entity\Logger;

class LoggerRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Logger::class;
}
