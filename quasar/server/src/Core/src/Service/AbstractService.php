<?php

namespace Core\Service;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Zend\Hydrator;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Core\Doctrine\ORM\AbstractEntityRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Core\Doctrine\EntityInterface;

abstract class AbstractService implements ServiceInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager = null;

    protected $entity;

    protected $permitedSearchColumns = ['id'];

    public function __construct(EntityManagerInterface $entityManager = null)
    {
        if (!is_null($entityManager)) {
            $this->entityManager = $entityManager;
        }
    }

    /**
     * @return ServiceResultInterface
     */
    public function get($id) : ServiceResultInterface
    {
        try {
            $entity = $this->getEntityManger()->find($this->entity, $id);
            if (is_null($entity)) {
                throw new EntityNotFoundException('Not Found');
            }
            return new ServiceResult($entity);
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
    }

    /**
     * @return ServiceResultInterface
     */
    public function list() : ServiceResultInterface
    {
        return new ServiceResult($this->getRepository()->getAll());
    }

    /**
     * @return ServiceResultInterface
     */
    public function paginate($page, $resultsPerPage = 10) : ServiceResultInterface
    {
        try {
            /** @var Paginator $result */
            $result = $this->getRepository()->findAllPaginate($page, $resultsPerPage);
            return new ServiceResult([$result]);
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
    }

    /** 
     * @return ServiceResultInterface
     */
    public function search(array $criteria, array $orderBy = null, $limit = null, $offset = null) : ServiceResultInterface
    {
        try {
            $filteredCriteria = array_filter($criteria, function ($search, $column) {
                return in_array($column, $this->permitedSearchColumns);
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($filteredCriteria)) {

                $list = $this->getRepository()->findBy($filteredCriteria, $orderBy, $limit, $offset);

                if (is_array($list) && !empty($list)) {
                    return new ServiceResult(array_map(function ($entity) {
                        if ($entity instanceof EntityInterface) {
                            return $entity->toArray();
                        }
                    }, $list));
                }
            }
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
        return new ServiceResult([]);
    }

    /** 
     * @return ServiceResultInterface
     */
    public function searchLike(array $criteria, array $orderBy = null, $limit = null, $offset = null) : ServiceResultInterface
    {
        try {
            $filteredCriteria = array_filter($criteria, function ($search, $column) {
                return in_array($column, $this->permitedSearchColumns);
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($filteredCriteria)) {

                $list = $this->getRepository()->findLike($filteredCriteria, $orderBy, $limit, $offset);

                if (is_array($list) && !empty($list)) {
                    return new ServiceResult(array_map(function ($entity) {
                        if ($entity instanceof EntityInterface) {
                            return $entity->toArray();
                        }
                    }, $list));
                }
            }
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
        return new ServiceResult([]);
    }

    /**
     * @param array|\Core\Doctrine\EntityInterface $entity
     * @return ServiceResultInterface
     */
    public function create($entity) : ServiceResultInterface
    {
        if (is_array($entity)) {
            $entity = new $this->entity($entity);
        }
        try {
            $this->getEntityManger()->persist($entity);
            $this->getEntityManger()->flush();
            return new ServiceResult([$entity]);
        } catch (UniqueConstraintViolationException $e) {
            return new ServiceResult([], $e);
        }
    }

    /**
     * @return ServiceResultInterface
     */
    public function update(int $id, EntityInterface $newEntity) : ServiceResultInterface
    {
        try {
            $entity = $this->getEntityManger()->getReference($this->entity, $id);
            $entity->hydradorSetup();
            $entity->getHydrator()->hydrate($newEntity->toArray(), $entity);
            $this->getEntityManger()->persist($entity);
            $this->getEntityManger()->flush();
            return new ServiceResult([$entity]);
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
    }

    /**
     * @return ServiceResultInterface
     */
    public function delete($id) : ServiceResultInterface
    {
        try {
            $entity = $this->getEntityManger()->getReference($this->entity, $id);
            $cacheEntity = $entity;
            $this->getEntityManger()->remove($entity);
            $this->getEntityManger()->flush();
            return new ServiceResult([$cacheEntity]);
        } catch (EntityNotFoundException $e) {
            return new ServiceResult([], $e);
        }
    }

    /**
     * @return AbstractService
     */
    public function setEntityManger(EntityManagerInterface $entityManager = null)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return EntityManagerInterface|null
     */
    public function getEntityManger()
    {
        return $this->entityManager;
    }

    /**
     * @return boolean
     */
    public function hasEntityManager() : bool
    {
        return !is_null($this->entityManager);
    }

    /**
     * @return AbstractEntityRepository
     */
    public function getRepository()
    {
        if ($this->hasEntityManager()) {
            return $this->getEntityManger()->getRepository($this->entity);
        }
    }

}
