<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\Lotacao;

class LotacaoService extends AbstractService
{
    protected $entity = Lotacao::class;
}
