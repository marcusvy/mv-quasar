<?php

namespace Core\Service;

use Core\Doctrine\ORM\AbstractEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Zend\Hydrator;

abstract class AbstractService implements ServiceInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager = null;

    protected $entity;

    public function __construct(EntityManagerInterface $entityManager = null)
    {
        if (!is_null($entityManager)) {
            $this->entityManager = $entityManager;
        }
    }

    public function setEntityManger(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getEntityManger()
    {
        return $this->entityManager;
    }

    public function hasEntityManager()
    {
        return !is_null($this->entityManager);
    }

    public function get($id)
    {
        $entity = $this->getEntityManger()->find($this->entity, $id);
        return $entity;
    }

    public function list()
    {
        $result = [];
        /** @var AbstractEntityRepository $repo */
        $repo = $this->getEntityManger()->getRepository($this->entity);
        return $repo->getAll();
    }

    public function paginate($page, $resultsPerPage = 10)
    {
        /** @var AbstractEntityRepository $repo */
        $repo = $this->getEntityManger()->getRepository($this->entity);
        $paginator = $repo->findAllPaginate($page, $resultsPerPage);
        return $paginator;
    }

    public function searchBy($column, $search)
    {
        $result = [];
    }

    public function searchByParameters(array $parameters)
    {
        $result = [];
        $list = $this->getEntityManger()
            ->getRepository($this->entity)
            ->findBy($parameters);
        if (count($list) > 0) {
            foreach ($list as $entity) {
                $result[] = $entity->toArray();
            }
        }
        return $result;
    }

    public function create(array $data)
    {
        $entity = new $this->entity($data);
        $this->getEntityManger()->persist($entity);
        $this->getEntityManger()->flush();
        return $entity;
    }

    public function update($id, $data)
    {
        $entity = $this->getEntityManger()->getReference($this->entity, $id);
        (new Hydrator\ClassMethods(false))->hydrate($data, $entity);
        $this->getEntityManger()->persist($entity);
        $this->getEntityManger()->flush();
        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->getEntityManger()->getReference($this->entity, $id);
        if ($entity) {
            $cacheEntity = $entity->toArray();
            $this->getEntityManger()->remove($entity);
            $this->getEntityManger()->flush();
            return $cacheEntity;
        }
        return 0;
    }
}
