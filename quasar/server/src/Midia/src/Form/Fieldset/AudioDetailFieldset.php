<?php

namespace Midia\Form\Fieldset;

use Midia\Model\Entity\Audio;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Time;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;
use Zend\Validator;

class AudioDetailFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new Audio());

        //    title
        $this->add([
            'name' => 'title',
            'type' => Text::class,
            'options' => [
                'label' => 'Título',
            ],
        ]);

        // description
        $this->add([
            'name' => 'description',
            'type' => Text::class,
            'options' => [
                'label' => 'Descrição',
            ],
        ]);

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

        // duration
        $this->add([
            'name' => 'duration',
            'type' => Time::class,
            'options' => [
                'label' => 'Duração',
                'format' => 'H:i:s'
            ],
            'attributes' => [
                'min' => '00:00:00',
                'max' => '23:59:59',
                'step' => '60'
            ]
        ]);

        // uri
        $this->add([
            'name' => 'uri',
            'type' => Text::class,
            'options' => [
                'label' => 'URL',
            ]
        ]);

        // url_code
        $this->add([
            'name' => 'urlCode',
            'type' => Text::class,
            'options' => [
                'label' => 'Código (Hash)',
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'required' => false,
                'validators' => [
                    (new Validator\NotEmpty()),
                ],
            ],
            'type' => [
                'required' => true,
            ],
            'description' => [
                'required' => false
            ],
            'duration' => [
                'required' => false
            ],
            'uri' => [
                'required' => false
            ],
            'urlCode' => [
                'required' => false
            ],
        ];
    }
}
