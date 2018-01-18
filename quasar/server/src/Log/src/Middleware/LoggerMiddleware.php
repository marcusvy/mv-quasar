<?php

namespace Log\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Log\Service\LogServiceInterface;
use Monolog\Logger;
use Psr\Http\Message\ServerRequestInterface;

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
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $uri = $request->getServerParams()['REQUEST_URI'];
        $method = $request->getMethod();
        $data = ['uri' => $uri, 'method' => $method];

        $logger = $this->service->log();
        $logger->log(Logger::INFO,'access', $data);
        $response = $delegate->process($request);

        return $response;
    }
}
