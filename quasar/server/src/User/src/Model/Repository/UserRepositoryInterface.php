<?php
namespace User\Model\Repository;

interface UserRepositoryInterface
{

  /**
   * Validation for authentication
   *
   * @param string $credential
   * @param string $password
   * @return bool
   */
    public function checkAuthenticationData($credential, $password);
}
