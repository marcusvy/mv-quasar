<?php

namespace User\Service;

use Core\Doctrine\AbstractEntity;
use Core\Service\ServiceResult;
use Doctrine\ORM\EntityManager;
use Core\Service\AbstractService;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\ORMException;
use User\Model\Entity\User;
use User\Model\Entity\Perfil;
use User\Model\Entity\Role;
use User\Model\Repository\UserRepository;
use User\Model\Repository\UserRepositoryInterface;
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

    /** @var  PerfilService */
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

    /**
     * @param int $id
     * @param int|string $status
     * @return ServiceResultInterface|User
     * @throws ORMException
     */
    public function status($id, $status)
    {
        $data = ['status' => $status];
        return parent::update($id, $data);
    }

    /**
     * Verify if user exists
     * @param $email
     * @return ServiceResultInterface
     */
    public function verify($email): ServiceResultInterface
    {
        try {
            /** @var UserRepositoryInterface $repo */
            $repo = $this->getRepository();
            $result = $repo->checkEmailExists($email);
            return new ServiceResult($result);
        } catch (\Exception $e) {
            return new ServiceResult([], $e);
        }
    }


    /**
     * @param int $id
     * @param string $activation_key
     * @param array $data
     * @return ServiceResultInterface
     */
    public function changePassword(int $id, string $activation_key, array $data): ServiceResultInterface
    {
        try {
            $user = $this->getRepository()->findOneBy(['id' => $id, 'activationKey' => $activation_key]);
            if ($user instanceof User) {
                $user->setCredential($data['credential'])->encriptPassword();
                $user->setSalt($user->generateSalt());
                $user->setActivationKey($user->generateActivationKey());

                $data['credential'] = $user->getCredential();
                $data['salt'] = $user->getSalt();
                $data['activationKey'] = $user->getActivationKey();
                return parent::update($user->getId(), $data);
            }else{
                throw new EntityNotFoundException('User not found');
            }
        } catch (\Exception $e) {
            return new ServiceResult([], $e);
        }
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
