<?php

namespace Log\Form;


use Zend\Filter\StringTrim;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class LoggerForm extends Form implements InputFilterProviderInterface
{
    public function init() {

        $this->add([
            'name' => 'channel',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'level',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'message',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'time',
            'type' => Text::class
        ]);

    }

    public function getInputFilterSpecification()
    {
        return [
            'channel'=> [
                'required' => false,
                'filters' => [
                    (new StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty())
                ]
            ],
            'level'=> [
                'required' => false,
                'filters' => [
                    (new StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty())
                ]
            ],
            'message'=> [
                'required' => false,
                'filters' => [
                    (new StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty())
                ]
            ],
            'time'=> [
                'required' => false,
                'filters' => [
                    (new StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty())
                ]
            ],
        ];
    }


}