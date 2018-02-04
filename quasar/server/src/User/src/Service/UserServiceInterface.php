<?php

namespace User\Service;

use Core\Service\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    /**
     * Atualiza status de ativação do usuário
     * @param int $id
     * @param int|string $status Actual status
     * @return \User\Entity\User
     */
    public function status($id, $status);


    /**
     * Ativa através de um código de ativação
     * @param $credential
     * @param $key
     * @return mixed
     * @return \User\Entity\User
     */
    public function activate($credential, $key);
}
