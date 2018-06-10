<?php

namespace LogTest\Factory;

use Interop\Container\ContainerInterface;
use Log\Middleware\LoggerMiddlewareFactory;
use Log\Middleware\LoggerMiddleware;
use PHPUnit\Framework\TestCase;

class LoggerMiddlewareFactoryTest extends TestCase
{
    /** @var ContainerInterface */
    protected $container;

    protected function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
    }

    public function testFactoryReturnMiddleware()
    {
        $factory = new LoggerMiddlewareFactory();
        $this->assertInstanceOf(LoggerMiddlewareFactory::class, $factory);

        $middleware = $factory($this->container->reveal(), LoggerMiddleware::class);
        $this->assertInstanceOf(LoggerMiddleware::class, $middleware);
    }
}
