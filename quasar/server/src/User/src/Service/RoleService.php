<?php
namespace User\Service;

use Core\Service\AbstractService;
use User\Model\Entity\Role;
use User\Model\Repository\UserRoleRepository;

class RoleService extends AbstractService implements RoleServiceInterface
{
    protected $entity = Role::class;

    /**
     * @return array
     */
    public function getNamesForSelect()
    {
        /** @var UserRoleRepository $repository */
        $repository = $this->entityManager->getRepository(Role::class);
        $collection = $repository->getNamesForSelect();
        $result = [];
        foreach ($collection as $object) {
            $result[($object->getId())] = $object->getName();
        }
        return $result;
    }
}
