<?php

namespace Imc\Service;

use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Imc\Entity\CandidatoPerfil;

class CandidatoPerfilService extends AbstractService
{
    protected $entity = CandidatoPerfil::class;
}
