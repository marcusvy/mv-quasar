<?php
namespace User\Service;

use Zend\Authentication\AuthenticationServiceInterface;
use Zend\Authentication\Result;
use Zend\Authentication\Adapter;

interface AuthServiceInterface extends AuthenticationServiceInterface
{

    /**
     * @return Result
     */
    public function authenticate(Adapter\AdapterInterface $adapter = null);
}
