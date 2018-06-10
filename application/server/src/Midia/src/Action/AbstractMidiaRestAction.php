<?php

namespace Midia\Action;

use Core\Action\AbstractRestAction;

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
                $data['url'] = $this->resolveUrlForData($data[$file]['tmp_name']);
                $data['type'] = $data[$file]['type'] ?? null;
                $data['size'] = $data[$file]['size'] ?? null;
            }
        }
        return $data;
    }

    public function resolveUrlForData($value)
    {
        return str_replace('public/', '', $value);
    }
}
