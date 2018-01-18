<?php
namespace Log\Service;

use Core\Service\AbstractService;
use Log\Entity\Logger;

class LoggerService extends AbstractService implements LoggerServiceInterface
{
    protected $entity = Logger::class;
}
