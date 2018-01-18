<?php

namespace Core\Doctrine\ORM;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

abstract class AbstractEntityRepository extends EntityRepository
{
    public function getAll()
    {
        $qb = $this->createQueryBuilder('e')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function findAllPaginate($page, $limit = 10)
    {
        $qb = $this->createQueryBuilder('r');
        $qb->orderBy('r.id', 'ASC');
        return $this->paginate($qb, $page, $limit);
    }

    protected function paginate($query, $page = 1, $limit = 10)
    {
        $offset = $limit * ($page - 1);
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->setHydrationMode(Query::HYDRATE_ARRAY);
        return $paginator;
    }
}
