<?php
namespace User\Service;

use Core\Service\AbstractService;
use User\Model\Entity\Perfil;
use Zend\Hydrator\ClassMethods;

/**
 * Class PerfilService
 * @package MvUser\Service
 */
class PerfilService extends AbstractService implements PerfilServiceInterface
{
    protected $entity = Perfil::class;

    // public function insert(array $data)
    // {
    //     $dataNomalizated = $this->dataNormalization($data);
    //     $perfil = new Perfil($dataNomalizated);
    //     $this->getEntityManger()->persist($perfil);
    //     $this->getEntityManger()->flush();
    //     return $perfil;
    // }

    // public function update($id, $data)
    // {
    //     $dataNormalized = $this->dataNormalization($data);
    //     $perfil = $this->getEntityManger()->getReference($this->entity, $id);
    //     (new ClassMethods(false))->hydrate($dataNormalized, $perfil);
    //     $this->getEntityManger()->persist($perfil);
    //     $this->getEntityManger()->flush();
    //     return $perfil;
    // }

    // public function dataNormalization(array $data)
    // {
    //     return array_merge(
    //         isset($data['perfil']) ? $data['perfil'] : [],
    //         isset($data['perfilAddress']) ? $data['perfilAddress'] : [],
    //         isset($data['perfilContact']) ? $data['perfilContact'] : [],
    //         isset($data['perfilSocial']) ? ['sociallinks' => serialize($data['perfilSocial'])] : []
    //     );
    // }
}
