<?php

namespace User\Service;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use User\Entity\User;
use User\Entity\Perfil;
use User\Entity\Role;
use Zend\Hydrator\ClassMethods;

/**
 * Class UserService
 * @package User\Service
 */
class UserService extends AbstractService implements UserServiceInterface
{
    /** @var User */
    protected $entity = User::class;

    /** @var  \User\Service\PerfilService */
    protected $perfilService;

    /**
     * @var User
     */
    protected $identity;

    public function __construct(
        EntityManager $entityManager,
        PerfilServiceInterface $perfilService
    ) {

        $this->entityManager = $entityManager;
        $this->perfilService = $perfilService;
    }

    public function findAll()
    {
        $result = [];
        $list = $this->getEntityManger()->getRepository($this->entity)->findAll();
        /** @var User $entity */
        foreach ($list as $entity) {
            $result[$entity->getId()] = $entity->toArray();
        }
        return $result;
    }

    public function create(array $data)
    {
        // Perfil
        $perfil = $this->perfilService->insert($data);

        //Usuário
        $user = new User($data);

        $role = isset($data['role']) ? $data['role'] : null;
        if (!is_null($role)) {
            $role = $this->getEntityManger()->getRepository(Role::class)->find($role['id']);
        }
        $user->setRole($role)
            ->setPerfil($perfil)
            ->encriptPassword();

        $this->getEntityManger()->persist($user);
        $this->getEntityManger()->flush();
        return $user;
    }

    public function update($id, $data)
    {
        /** @var \User\Entity\User $user */
        $user = $this->getEntityManger()->getReference(User::class, $id);
        (new ClassMethods(false))->hydrate($data, $user);
        $this->getEntityManger()->persist($user);

        $perfil = $this->getEntityManger()->getReference(
            Perfil::class,
            $user->getPerfil()->getId()
        );
        (new ClassMethods(false))->hydrate($this->perfilService->dataNormalization($data), $perfil);
        $this->getEntityManger()->persist($perfil);

        $this->getEntityManger()->flush();
        return $user;
    }

    public function delete($id): int
    {
        $user = $this->getEntityManger()->getReference($this->entity, $id);
        if ($user) {
            $perfil = $this->getEntityManger()->getReference(
                Perfil::class,
                $user->getPerfil()->getId()
            );
            if ($perfil) {
                $this->getEntityManger()->remove($perfil);
            }
            $this->getEntityManger()->remove($user);
            $this->getEntityManger()->flush();
            return $id;
        }
        return 0;
    }

    public function status($id, $status)
    {
        $user = $this->getEntityManger()->getReference($this->entity, $id);
        if ($user) {
            $data = ['status' => $status];
            (new ClassMethods(false))->hydrate($data, $user);
            $this->getEntityManger()->persist($user);
            $this->getEntityManger()->flush();
            return $user;
        }
        return false;
    }

    public function activate($id, $key): bool
    {
        if (!is_null($id) && !is_null($key)) {
            try {
                /** @var \User\Entity\user $user */
                $user = $this->getEntityManger()->getReference($this->entity, $id);
                if (($user instanceof User)) {
                    $user->setActive(1);
                    $user->setActivationKey('');
                    $this->getEntityManger()->persist($user);
                    $this->getEntityManger()->flush();
                    $this->identity = $user;
                    return true;
                }
            } catch (\Exception $e) {
            }
        }
        return false;
    }

    public function getIdentity()
    {
        return $this->identity;
    }
}
