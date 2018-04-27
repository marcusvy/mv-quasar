<?php
namespace User\Model\Repository;

interface UserRepositoryInterface
{

  /**
   * Validation for authentication
   *
   * @param string $identity
   * @param string $credential
   * @return bool
   */
    public function checkAuthenticationData($identity, $credential);

    /**
     * Check if user exist by email
     * @param $email
     * @return array
     */
    public function checkEmailExists($email): array;
}
