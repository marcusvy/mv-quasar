<?php

namespace Log\Middleware;

use Log\Service\LogServiceInterface;
use Monolog\Logger;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoggerMiddleware implements MiddlewareInterface
{

    /** @var LogServiceInterface  */
    private $service;

    /**
     * LoggerMiddleware constructor.
     * @param LogServiceInterface $service
     */
    public function __construct(LogServiceInterface $service = null)
    {
        $this->service = $service;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : \Psr\Http\Message\ResponseInterface
    {
        $uri = $request->getServerParams()['REQUEST_URI'];
        $method = $request->getMethod();
        
        $data = ['uri' => $uri, 'method' => $method];

        $logger = $this->service->log();
        $logger->log(Logger::INFO, 'access', $data);

        $response = $handler->handle($request);

        return $response;
    }
}
