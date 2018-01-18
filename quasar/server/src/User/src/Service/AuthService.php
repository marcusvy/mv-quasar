<?php

namespace User\Service;

use Zend\Authentication\Adapter;
use Zend\Authentication\Result;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage;

class AuthService extends AuthenticationService implements AuthServiceInterface
{

    /**
     * @param Storage\StorageInterface $storage
     * @param Adapter\AdapterInterface $adapter
     */
    public function __construct(
        Storage\StorageInterface $storage,
        Adapter\AdapterInterface $adapter
    ) {
        parent::__construct($storage, $adapter);
    }

    /**
     * @param Adapter\AdapterInterface|null $adapter
     * @return Result
     */
    public function authenticate(Adapter\AdapterInterface $adapter = null)
    {
        return parent::authenticate($this->getAdapter());
    }

    public function check()
    {
        return null;
    }
}
