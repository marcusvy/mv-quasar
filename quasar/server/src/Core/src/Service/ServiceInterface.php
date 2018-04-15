<?php

namespace Core\Service;

use Core\Doctrine\EntityInterface;
use Core\Service\ServiceResultInterface;
use Doctrine\ORM\EntityManagerInterface;
use Core\Doctrine\ORM\AbstractEntityRepository;

interface ServiceInterface
{

    /**
     * Retorna um único registro de usuário
     * @param integer $id
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @return ServiceResultInterface
     */
    public function get($id): ServiceResultInterface;

    /**
     * Retorna lista de registros
     * @return ServiceResultInterface
     */
    public function list(): ServiceResultInterface;

    /**
     * Obtem listagem com paginação
     * @param int $page Página Atual
     * @param int $resultsPerPage Limite por página
     * @return ServiceResultInterface
     */
    public function paginate($page, $resultsPerPage = 10): ServiceResultInterface;

    /**
     * Insere um novo registro
     * @param array $data
     * @return ServiceResultInterface
     */
    public function create(array $data): ServiceResultInterface;

    /**
     * Atualiza um registro de usuário
     * @param int $id
     * @param array $data
     * @return ServiceResultInterface
     */
    public function update(int $id, array $data): ServiceResultInterface;

    /**
     * Exclui um registro com $id fornecido
     * @param $id
     * @return ServiceResultInterface
     * @throws \InvalidArgumentException
     */
    public function delete($id): ServiceResultInterface;


    /**
     * @param array $parameters Parameters of [$column => $searchValue]
     */
    public function search(array $criteria, array $orderBy = null, $limit = null, $offset = null) : ServiceResultInterface;

    /**
     * @param array $parameters Parameters of [$column => $searchValue]
     */
    public function searchLike(array $criteria, array $orderBy = null, $limit = null, $offset = null) : ServiceResultInterface;

    /**
     * Inject the Doctrine Entity Manager
     * @param EntityManagerInterface $entityManager
     * @return ServiceInterface
     */
    public function setEntityManger(EntityManagerInterface $entityManager=null);

    /**
     * Get the Doctrine Entity Manager
     * @return EntityManagerInterface|null
     */
    public function getEntityManger();

    /**
     * Verify if Doctrine Entity Manager exist on service
     * @return boolean
     */
    public function hasEntityManager() : bool;

    /**
     * @return AbstractEntityRepository
     */
    public function getRepository();
}
