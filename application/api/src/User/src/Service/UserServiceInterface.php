<?php

namespace User\Service;

use Core\Service\ServiceInterface;
use Core\Service\ServiceResultInterface;
use User\Model\Entity\User;

interface UserServiceInterface extends ServiceInterface
{
    /**
     * Update the activation status of user
     * @param int $id
     * @param int|string $status The status
     * @return ServiceResultInterface|User
     * @throws ORMException
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

    /**
     * Verify if user exists
     * @param $email
     * @return ServiceResultInterface
     */
    public function verify($email): ServiceResultInterface;

    /**
     * Change password
     *
     * @param int $id
     * @param string $activation_key
     * @param array $data
     * @return ServiceResultInterface
     */
    public function changePassword(int $id, string $activation_key, array $data): ServiceResultInterface;
}
