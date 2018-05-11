<?php
namespace User\Service;

use Core\Service\AbstractService;
use User\Model\Entity\Perfil;

/**
 * Class PerfilService
 * @package MvUser\Service
 */
class PerfilService extends AbstractService implements PerfilServiceInterface
{
    protected $entity = Perfil::class;
}
