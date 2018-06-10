<?php
namespace User\Adapter;

use User\Model\Repository\UserRepositoryInterface;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Zend\Authentication\Exception\RuntimeException;

class AuthAdapter extends AbstractAdapter implements AdapterInterface
{

  /**
   * @var UserRepositoryInterface
   */
    protected $repository;


  /**
   * AuthAdapter constructor.
   * @param UserRepositoryInterface $repository
   */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

  /**
   * Performs an authentication attempt
   *
   * @return \Zend\Authentication\Result
   * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface
   *               If authentication cannot be performed
   */
    public function authenticate()
    {
        if (empty($this->getIdentity()) || empty($this->getCredential())) {
            throw new RuntimeException(
                'Request and Response objects must be set before calling authenticate()'
            );
        }

        if ($this->repository->checkAuthenticationData( $this->getIdentity(), $this->getCredential())) {
            return new Result(Result::SUCCESS, $this->getIdentity(), ['success' => true]);
        }

        return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, ['success' => false]);
    }
}
