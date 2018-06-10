<?php

namespace Log\Service;

use Monolog\Handler\HandlerInterface;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;

interface LogServiceInterface
{


    public function getName();

    public function setName(string $name): LogService;

    /**
     * Enable Stream Handler
     * @return LogServiceInterface
     */
    public function enableStream();

    /**
     * Disable Stream Handler
     * @return LogServiceInterface
     */
    public function disableStream();

    /**
     * Enable Doctrine Handler
     * @return LogServiceInterface
     */
    public function enableDoctrine();

    /**
     * Disable Doctrine Handler
     * @return LogServiceInterface
     */
    public function disableDoctrine();


    /**
     * Add a StreamHandler to generate a log in file
     *
     * @param StreamHandler|null $handler
     * @return $this
     */
    public function addStreamHandler(StreamHandler $handler);

    /**
     * Add a DoctrineHandler to store in database
     *
     * @param HandlerInterface|null $handler
     * @return $this
     */
    public function addDoctrineHandler(HandlerInterface $handler);

    /**
     * Get the configured logger
     * @return LoggerInterface
     */
    public function log(): LoggerInterface;
}
