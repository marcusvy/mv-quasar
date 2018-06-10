<?php

namespace Midia\Form;

use Midia\Model\Entity\Audio;
use Zend\Form\Element\Select;
use Zend\Hydrator;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class AudioForm extends Form implements InputFilterProviderInterface
{
    use AudioFormTrait, AudioFileTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods());
//        $this->setObject(new Audio());

        $this->initAudioForm();
        $this->initAudioFile();

        // type
        $this->add([
            'name' => 'type',
            'type' => Select::class,
            'options' => [
                'label' => 'Type',
                'value_options' => [
                    'local' => 'Local',
                    'soundcloud' => 'Soudcloud',
                    'youtube' => 'Youtube',
                ]
            ],
        ]);
    }

    public function getInputFilterSpecification()
    {
        return array_merge_recursive(
            [
                'type' => [
                    'required' => false
                ],
            ],
            $this->getInputFilterAudioForm(),
            $this->getInputFilterAudioFile()
        );
    }

}
