<?php

namespace Midia\Action;

use Core\Action\AbstractRestAction;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * Class AbstractMidiaRestAction
 *
 * Enable Rest to work with files e manager in one module
 * @package Midia\Action
 */
abstract class AbstractMidiaRestAction
    extends AbstractRestAction
{

    protected $fileRequest = true;
    protected $fileRequestNames = ['file'];

    /**
     * @param array $data
     * @return array
     */
    public function extractExtraDataFromFiles(array $data)
    {
        if ($this->fileRequest) {
            foreach ($this->fileRequestNames as $file) {
                $data['type'] = $data[$file]['type'] ?? null;
                $data['size'] = $data[$file]['size'] ?? null;
            }
        }
        return $data;
    }
}
