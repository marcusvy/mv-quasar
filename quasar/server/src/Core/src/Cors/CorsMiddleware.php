<?php

namespace Core\Cors;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class CorsMiddleware implements MiddlewareInterface
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config['cors'];
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {

        $allowed_origins = implode(',', $this->config['allowed_origins']);
        $allowed_methods = implode(',', $this->config['allowed_methods']);
        $allowed_headers = implode(',', $this->config['allowed_headers']);
        $expose_headers = implode(',', $this->config['expose_headers']);
        $max_age = $this->config['max_age'];
        $allowed_credentials = ($this->config['allowed_credentials']) ? 'true' : 'false';

        $response = $delegate->process($request);
        $response = $response->withHeader('Access-Control-Allow-Origin', $allowed_origins)
            ->withHeader('Access-Control-Allow-Methods', $allowed_methods)
            ->withHeader('Access-Control-Allow-Headers', $allowed_headers)
            ->withHeader('Access-Control-Expose-Headers', $expose_headers)
            ->withHeader('Access-Control-Allow-Credentials', $allowed_credentials)
            ->withHeader('Access-Control-Max-Age', $max_age);

        return $response;
    }
}
