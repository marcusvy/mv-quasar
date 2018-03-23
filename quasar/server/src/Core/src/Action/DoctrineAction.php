<?php

namespace Core\Action;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class DoctrineAction implements MiddlewareInterface
{
    /** @var EntityManagerInterface */
    private $entityManager = null;

    public function __construct(EntityManagerInterface $entityManager = null)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        $installed = !is_null($this->entityManager);
        return new JsonResponse(['installed' => $installed]);
    }
}
