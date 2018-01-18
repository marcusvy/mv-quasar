<?php

namespace Core\Service;

use Doctrine\ORM\EntityManager;

interface ServiceInterface
{
    /**
     * Inject the Doctrine Entity Manager
     * @param EntityManager $entityManager
     * @return ServiceInterface
     */
    public function setEntityManger(EntityManager $entityManager);

    /**
     * Get the Doctrine Entity Manager
     * @return EntityManager
     */
    public function getEntityManger();

    /**
     * Retorna um único registro de usuário
     * @param integer $id
     * @return \Core\Doctrine\AbstractEntity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @return array|\Core\Doctrine\EntityInterface
     */
    public function get($id);

    /**
     * Retorna lista de registros
     * @return array
     */
    public function list();

    /**
     * Obtem listagem com paginação
     * @param int $page Página Atual
     * @param int $resultsPerPage Limite por página
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     */
    public function paginate($page, $resultsPerPage = 10);

    /**
     * Insere um novo registro
     * @param array $data
     * @return \Core\Doctrine\EntityInterface
     */
    public function create(array $data);

    /**
     * Atualiza um registro de usuário
     * @param int $id
     * @param array $data
     * @return int|\Core\Doctrine\EntityInterface
     */
    public function update($id, $data);

    /**
     * Exclui um registro com $id fornecido
     * @param $id
     * @return int
     * @throws \InvalidArgumentException
     */
    public function delete($id);

    /**
     * Search entity by one $column by a term in $search
     * @param $column
     * @param $search
     * @return mixed
     */
    public function searchBy($column, $search);

    /**
     * @param array $parameters Parameters of [$column => $searchValue]
     */
    public function searchByParameters(array $parameters);
}
