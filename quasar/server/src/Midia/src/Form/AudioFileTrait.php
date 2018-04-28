<?php

namespace Midia\Form;

use Core\Filter\FilePathTrait;
use Zend\Filter;
use Zend\Form\Element\File;
use Zend\Validator;

trait AudioFileTrait
{
    use FilePathTrait;

    public function initAudioFile()
    {
        $this->add([
            'name' => 'file',
            'type' => File::class
        ]);
    }

    public function getInputFilterAudioFile($directory = 'public/local/midia', $type = 'audio')
    {
        $target = $this->checkTarget($directory, $type);

        return [
            'file' => [
                'required' => true,
                'filters' => [
                    (new Filter\File\RenameUpload())
                        ->setTarget($target)
                        ->setOverwrite(true)
                        ->setRandomize(true)
                        ->setUseUploadExtension(true)
                ],
                'validators' => [
                    (new Validator\File\Extension(['ogg', 'mp3'])),
                ]
            ]
        ];
    }
}
