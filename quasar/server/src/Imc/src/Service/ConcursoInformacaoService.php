<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\ConcursoInformacao;

class ConcursoInformacaoService extends AbstractService
{
    protected $entity = ConcursoInformacao::class;
}
