<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\Microarea;

class MicroareaService extends AbstractService
{
    protected $entity = Microarea::class;
}
