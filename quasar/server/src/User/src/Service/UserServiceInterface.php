<?php

namespace User\Service;

use Core\Service\ServiceInterface;
use User\Model\Entity\User;

interface UserServiceInterface extends ServiceInterface
{
    /**
     * Atualiza status de ativação do usuário
     * @param int $id
     * @param int|string $status Actual status
     * @return User
     */
    public function status($id, $status);


    /**
     * Ativa através de um código de ativação
     * @param $identity
     * @param $key
     * @return mixed
     * @return User
     */
    public function activate($identity, $key);

    /**
     * Obtem configurações para serem armazenadas no cliente
     * @param $identity
     * @return array
     */
    public function getConfig($identity);

}
