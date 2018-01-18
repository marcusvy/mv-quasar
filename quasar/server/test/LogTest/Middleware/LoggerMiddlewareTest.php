<?php

namespace LogTest\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Log\Middleware\LoggerMiddleware;
use Log\Service\LogServiceInterface;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\NullLogger;

class LoggerMiddlewareTest extends TestCase
{
    /** @var MiddlewareInterface */
    private $middleware;

    /** @var string */
    private $autoloadFile = __DIR__ . '/../../../config/autoload/log.global.php';

    /** @var array */
    private $config = [];


    public function setUp()
    {
        $this->config = include($this->autoloadFile);
        $service = $this->prophesize(LogServiceInterface::class);
        $service->log()->willReturn(new NullLogger('mv_log'));
        $this->middleware = new LoggerMiddleware($service->reveal());
    }

    public function testDefaultAutoloadFileExist() {
        $this->assertFileExists($this->autoloadFile);
    }

    public function testTestCreateStreamLogger()
    {
        $this->middleware->process(
            $this->prophesize(ServerRequestInterface::class)->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );

        $this->setOutputCallback(function (){
            return '';
        });
        $config = $this->config['log']['handlers']['stream'];
        $file = $file = sprintf('%s%s', $config['output_dir'], $config['output_file']);
        $this->assertFileExists($file);
    }
}
