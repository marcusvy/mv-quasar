<?php

namespace Midia\Form;

use Midia\Model\Entity\Video;
use Zend\Form\Element\Select;
use Zend\Hydrator;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class VideoForm extends Form implements InputFilterProviderInterface
{
    use ImageFormTrait, ImageFileTrait, AudioFormTrait, AudioFileTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods());
//        $this->setObject(new Video());

        $this->initImageForm();
        $this->initImageFile();
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
                    'youtube' => 'Youtube',
                    'vimeo' => 'Vimeo',
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
            $this->getInputFilterImageForm(),
            $this->getInputFilterImageFile(),
            $this->getInputFilterAudioForm(),
            $this->getInputFilterAudioFile()
        );
    }

}
