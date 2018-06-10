<?php

namespace Log\Service;

use Log\Handler\DoctrineHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class LogService implements LogServiceInterface
{
    /** @var Logger */
    private $logger;

    /** @var array */
    private $config = [];

    /** @var string */
    private $name = '';

    /** @var array */
    private $handlers = [];

    /** @var LoggerServiceInterface */
    private $service;

    /** @var bool Activate the logService */
    private $enabled = false;

    /** @var bool The stream handler activation */
    private $enableStreamHandler = true;

    /** @var bool The stream handler activation */
    private $enableDoctrineHandler = true;

    /**
     * LoggerMiddleware constructor.
     * @param array $config
     * @param LoggerServiceInterface $service
     */
    public function __construct(LoggerServiceInterface $service = null, $config = [])
    {
        $this->service = $service;
        $this->config = $config;
        $this->name = (isset($config['name'])) ? $config['name'] : 'mv_log';
        $this->enabled = (isset($config['enabled'])) ? $config['enabled'] : false;
        $this->handlers = $config['handlers'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return LogService
     */
    public function setName(string $name): LogService
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Enable Stream Handler
     * @return $this
     */
    public function enableStream()
    {
        $this->enableStreamHandler = true;
        return $this;
    }

    /**
     * Disable Stream Handler
     * @return $this
     */
    public function disableStream()
    {
        $this->enableStreamHandler = true;
        return $this;
    }

    /**
     * Enable Doctrine Handler
     * @return $this
     */
    public function enableDoctrine()
    {
        $this->enableDoctrineHandler = true;
        return $this;
    }

    /**
     * Disable Doctrine Handler
     * @return $this
     */
    public function disableDoctrine()
    {
        $this->enableDoctrineHandler = false;
        return $this;
    }

    /**
     * Add a StreamHandler to generate a log in file
     *
     * @param StreamHandler|null $handler
     * @return $this
     */
    public function addStreamHandler(StreamHandler $handler = null)
    {
        if (is_null($handler)) {
            if (isset($this->handlers['stream'])) {
                $config = $this->handlers['stream'];
                $list = [
                    $config['enabled'],
                    $config['format'],
                    $config['output_dir'],
                    $config['output_file'],
                    $config['level'],
                    $config['bubble'],
                    $config['file_permission'],
                    $config['use_locking'],
                ];

                list($enabled, $format, $outputDir, $outputFile, $level, $bubble, $filePermission, $useLocking) = $list;

                if ($enabled) {
                    $file = sprintf('%s%s', $outputDir, $outputFile);
                    $formatter = new LineFormatter($format);
                    $handler = new StreamHandler($file, $level, $bubble, $filePermission, $useLocking);
                    $handler->setFormatter($formatter);
                }
            }
        }
        if ($handler instanceof StreamHandler) {
            $this->logger->pushHandler($handler);
        }
        return $this;
    }

    /**
     * Add a DoctrineHandler to store in database
     *
     * @param HandlerInterface|null $handler
     * @return $this
     */
    public function addDoctrineHandler(HandlerInterface $handler = null)
    {
        if (is_null($handler)) {
            if (isset($this->handlers['doctrine'])) {
                $config = $this->handlers['doctrine'];
                $list = [
                    $config['enabled'],
                    $config['format'],
                ];
                list ($enabled, $format) = $list;

                if ($enabled) {
                    $formatter = new LineFormatter($format);
                    $handler = new DoctrineHandler($this->service);
                    $handler->setFormatter($formatter);
                }
            }
        }
        if ($handler instanceof HandlerInterface) {
            $this->logger->pushHandler($handler);
        }
        return $this;
    }

    /**
     * Get the configured logger
     * @return LoggerInterface
     */
    public function log(): LoggerInterface
    {
        if (is_null($this->logger)) {
            $this->logger = new Logger($this->name);
        }

        if ($this->enabled) {
            if ($this->enableStreamHandler) {
                $this->addStreamHandler();
            }
            if ($this->enableDoctrineHandler) {
                $this->addDoctrineHandler();
            }
        }
        return $this->logger;
    }
}
