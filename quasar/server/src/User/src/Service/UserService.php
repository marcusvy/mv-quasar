<?php

namespace User\Service;

use Core\Doctrine\AbstractEntity;
use Core\Service\ServiceResult;
use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Doctrine\ORM\EntityNotFoundException;
use User\Model\Entity\User;
use User\Model\Entity\Perfil;
use User\Model\Entity\Role;
use Zend\Hydrator\ClassMethods;
use Core\Service\ServiceResultInterface;

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

    /** @var User */
    protected $identity;

    /** @var User */
    private $previousValue;

    public function __construct(
        EntityManager $entityManager,
        PerfilServiceInterface $perfilService
    ) {
        $this->entityManager = $entityManager;
        $this->perfilService = $perfilService;
        parent::__construct($entityManager);
    }

    /**
     * @param array $entity
     * @return ServiceResultInterface
     */
    public function create($entity): ServiceResultInterface
    {
        /** @var User $entity */
        $entity = new $this->entity($entity);
        $entity->encriptPassword();
        return parent::create($entity);
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

    public function activate($identity, $key): bool
    {
        if (!is_null($identity) && !is_null($key)) {
            try {
                /** @var User $user */
                $repo = $this->getEntityManger()->getRepository($this->entity);
                $result = $repo->findByIdentity($identity);
                if (count($result) > 0) {
                    $user = array_shift($result);
                    if (($user instanceof User)) {
                        $user->setActive(1);
//                    $user->setActivationKey('');
                        $this->getEntityManger()->persist($user);
                        $this->getEntityManger()->flush();
                        $this->identity = $user;
                        return true;
                    }
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

    public function getConfig($identity)
    {
        if (!is_null($identity)) {
            try {
                /** @var User $user */
                $repo = $this->getEntityManger()->getRepository($this->entity);
                $result = $repo->findByIdentity($identity);
                if (count($result) > 0) {
                    $user = array_shift($result);
                    if (($user instanceof User)) {
                        return $user->toArray();
                    }
                }
            } catch (\Exception $e) {
            }
        }
        return [];
    }
}
