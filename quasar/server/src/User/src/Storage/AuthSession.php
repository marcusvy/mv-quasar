<?php

namespace User\Storage;

use Zend\Authentication\Storage\Session;
use Zend\Authentication\Storage\StorageInterface;

class AuthSession extends Session implements StorageInterface
{
    protected $namespace = 'MvApp';
}
