<?php

namespace Core\Filter;

use Zend\Filter;

trait FilePathTrait
{
    /**
     * Check the directory and create, if not exist, and return the target directory to storage files
     *
     * @param string $directory Base directory on server
     * @param string $type Type of midia: "audio", "image", "video", "doc", "extra"
     * @return string
     */
    public function checkTarget($directory = 'public/local/', $type = 'midia')
    {
        $filter = new Filter\RealPath(true);
        $date = new \DateTime('now');
        $target = sprintf('%s/%s/%s/%s', $directory, $type, $date->format('Y'), $date->format('m'));
        if (!$filter->filter($target)) {
            mkdir($target, 0755, true);
        }
        return $target;
    }
}