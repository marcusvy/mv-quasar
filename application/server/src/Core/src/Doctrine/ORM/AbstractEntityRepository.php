<?php

namespace Core\Doctrine\ORM;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

abstract class AbstractEntityRepository extends EntityRepository
{
    public function findLike(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select(['u']);
        // ->from($this->_entityName, 'u');
        foreach ($criteria as $column => $value) {
            $likePredicate = sprintf('u.%s', $column);
            $likeParameter = sprintf(':%s', $column);
            $whereLike = $qb->expr()->like($likePredicate, $likeParameter);
            $qb->setParameter($likeParameter, '%' . $value . '%');
            $qb->where($whereLike);
        }
        if (!is_null($orderBy) && is_array($orderBy)) {
            foreach ($orderBy as $column => $value) {
                $orderPredicate = sprintf('u.%s', $column);
                $qb->orderBy($orderPredicate, $value);
            }
        }
        if (!is_null($limit)) {
            $qb->setMaxResults($limit);
        }
        if (!is_null($offset)) {
            $qb->setFirstResult($offset);
        }
        return $qb->getQuery()->getResult(Query::HYDRATE_OBJECT);
    }

    public function getAll()
    {
        $qb = $this->createQueryBuilder('e')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    /**
     * @todo OrderBy functionality
     */
    public function findAllPaginate($page = 1, $limit = 10)
    {
        $qb = $this->createQueryBuilder('r');
        $qb->orderBy('r.id', 'ASC');
        $offset = $limit * ($page - 1);
        $paginator = new Paginator($qb);
        $paginator->getQuery()
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->setHydrationMode(Query::HYDRATE_OBJECT);
        return $paginator;
    }
}
