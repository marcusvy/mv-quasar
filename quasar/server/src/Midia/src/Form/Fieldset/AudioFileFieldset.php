<?php

namespace Midia\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\File;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class AudioFileFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->add([
            'name' => 'audio',
            'type' => File::class
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'audio' => [
                'required' => false,
                'filters' => [
                    (new Filter\File\RenameUpload())
                        ->setTarget('public/local/audio')
                        ->setOverwrite(true)
                        ->setRandomize(true)
                        ->setUseUploadExtension(true)
                ],
                'validators' => [
                    (new Validator\File\Extension())->setExtension(['ogg', 'mp3']),
                ]
            ]
        ];
    }
}
