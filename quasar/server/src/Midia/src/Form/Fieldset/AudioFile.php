<?php
namespace Midia\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class AudioFile extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->add([
        'name' => 'audio',
        'type' => 'File'
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
        'audio' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\File\RenameUpload', 'options' => [
            'target' => 'public/local/audio',
            'overwrite' => true,
            'randomize' => true,
            'use_upload_extension' => true
          ]],
        ],
        'validators' => [
          ['name' => 'Zend\Validator\File\Extension', 'options' => [
            'extension'=> ['ogg','mp3']
          ]],
        ]
        ]
        ];
    }
}
