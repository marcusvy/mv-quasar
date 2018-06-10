<?php

namespace Log\Handler;

use Log\Service\LoggerServiceInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class DoctrineHandler extends AbstractProcessingHandler
{
    /** @var LoggerServiceInterface|null */
    private $service = null;

    public function __construct(
        LoggerServiceInterface $service = null,
        int $level = Logger::DEBUG,
        bool $bubble = true
    ) {
        $this->service = $service;
        parent::__construct($level, $bubble);
    }

    /**
     * Writes the record down to the log of the implementing handler
     *
     * @param  array $record
     * @return void
     */
    protected function write(array $record)
    {
        if (!is_null($this->service)) {
            $data = [
                'channel' => $record['channel'],
                'level' => $record['level'],
                'message' => $record['formatted'],
                'time' => $record['datetime'],
            ];
            try {
                $this->service->create($data);
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }
    }
}
