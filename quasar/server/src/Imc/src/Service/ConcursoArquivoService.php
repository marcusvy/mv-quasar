<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\ConcursoArquivo;

class ConcursoArquivoService extends AbstractService
{
    protected $entity = ConcursoArquivo::class;
}
