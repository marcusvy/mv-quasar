<?php

namespace Core\Service;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\EntityManager;

interface ServiceResultInterface
{

    /**
     * Return the first result
     * @return mixed
     */
    public function getFirstResult();

    /**
     * Retorna a entidade     
     * @return array
     */
    public function getResult(): array;

    /**
     * @return ServiceResultInterface
     */
    public function setResult($result): ServiceResultInterface;

    /**
     * Retorna lista de registros
     * @return \Exception
     */
    public function getError();

    /**
     * Altera erro
     * @param \Exception $error
     */
    public function setError($error): ServiceResultInterface;

    /**
     * Verifica se possui erro no resultado
     */
    public function hasError(): bool;
    
}
