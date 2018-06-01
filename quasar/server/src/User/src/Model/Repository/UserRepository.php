<?php

namespace User\Model\Repository;

use Core\Doctrine\ORM\AbstractEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use User\Model\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends AbstractEntityRepository implements UserRepositoryInterface
{
    public function getNames()
    {
        return $this->createQueryBuilder('u')
            ->select(['u'])
            ->join('u.fkPerfil', 'p', Join::WITH, 'u.fkPerfil = p.id')
            ->groupBy('p.name')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $identity
     * @param string $credential
     * @return bool
     */
    public function checkAuthenticationData($identity, $credential): bool
    {
        /** @var User $user */
        $user = $this->findOneBy(['identity' => $identity, 'active' => 1]);
        if ($user instanceof User) {
            return password_verify($credential, $user->getCredential());
        }
        return false;
    }

    /**
     * @param $email
     * @return array
     */
    public function checkEmailExists($email): array
    {
        $entity = $this->findOneBy(['email' => $email]);
        if ($entity instanceof User) {
            return [$entity];
        }
        return [];
    }

    /**
     * Activate a user with the identity and correct activation_code
     *
     * @param string $identity
     * @param string $key
     * @return array
     */
    public function checkUserForActivation($identity, $key):array
    {
        /** #var User $user */
        $user = $this->findOneBy(['identity' => $identity, 'activationKey' => $key]);
        if (($user instanceof User)) {
            return [$user];
        }
        return [];
    }
}
