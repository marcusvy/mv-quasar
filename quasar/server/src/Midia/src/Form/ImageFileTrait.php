<?php

namespace Midia\Form;

use Core\Filter\FilePathTrait;
use Zend\Filter;
use Zend\Form\Element\File;
use Zend\Validator;

trait ImageFileTrait
{
    use FilePathTrait;

    public function initImageFile()
    {
        $this->add([
            'name' => 'file',
            'type' => File::class
        ]);
    }

    public function getInputFilterImageFile($directory = 'public/local/midia', $type = 'image')
    {
        $target = $this->checkTarget($directory, $type);

        return [
            'file' => [
                'required' => false,
                'filters' => [
                    (new Filter\File\RenameUpload())
                        ->setTarget($target)
                        ->setOverwrite(true)
                        ->setRandomize(true)
                        ->setUseUploadExtension(true)
                ],
                'validators' => [
                    (new Validator\File\IsImage()),
                    (new Validator\File\Extension(['gif', 'jpg', 'jpeg', 'png', 'svg', 'tiff']))
                ]
            ]
        ];
    }
}
