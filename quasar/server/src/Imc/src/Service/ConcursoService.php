<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\Concurso;

class ConcursoService extends AbstractService
{
    protected $entity = Concurso::class;
}
