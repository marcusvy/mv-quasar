<?php
namespace User\Service;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
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

    // public function findAll()
    // {
    //     $result = [];
    //     $list = $this->getEntityManger()->getRepository($this->entity)->findAll();
    //     /** @var User $entity */
    //     foreach ($list as $entity) {
    //         $result[$entity->getId()] = $entity->toArray();
    //     }
    //     return $result;
    // }

    /**
     * @param array|User $entity
     * @return ServiceResultInterface
     */
    public function create($entity) : ServiceResultInterface
    {
        // Perfil
        // if ($entity->getPerfil() instanceof Perfil) {
        //     if (!empty($entity->getPerfil()->getName())) {
        //         $entity->setPerfil($this->perfilService->create($entity->getPerfil())->getFirstResult());
        //     }
        // }elseif (is_string($entity->getPerfil())) {
            
        // }
        
        if($entity->getRole() instanceof Role) {
            // @todo 
        }

        $role = (isset($data['role']) && !empty($data['role'])) ? $data['role'] : null;

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

    // public function update($id, $data)
    // {
    //     /** @var User $user */
    //     $user = $this->getEntityManger()->getReference(User::class, $id);
    //     (new ClassMethods(false))->hydrate($data, $user);
    //     $this->getEntityManger()->persist($user);

    //     $perfil = $this->getEntityManger()->getReference(
    //         Perfil::class,
    //         $user->getPerfil()->getId()
    //     );
    //     (new ClassMethods(false))->hydrate($this->perfilService->dataNormalization($data), $perfil);
    //     $this->getEntityManger()->persist($perfil);

    //     $this->getEntityManger()->flush();
    //     return $user;
    // }

    // public function delete($id) : int
    // {
    //     $user = $this->getEntityManger()->getReference($this->entity, $id);
    //     if ($user) {
    //         $perfil = $this->getEntityManger()->getReference(
    //             Perfil::class,
    //             $user->getPerfil()->getId()
    //         );
    //         if ($perfil) {
    //             $this->getEntityManger()->remove($perfil);
    //         }
    //         $this->getEntityManger()->remove($user);
    //         $this->getEntityManger()->flush();
    //         return $id;
    //     }
    //     return 0;
    // }

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

    public function activate($identity, $key) : bool
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
