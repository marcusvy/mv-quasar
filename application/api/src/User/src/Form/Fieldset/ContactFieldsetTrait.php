<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Text;
use Zend\Validator;

trait ContactFieldsetTrait
{
    public function initContactFieldset()
    {

        $this->add([
            'name' => 'contactPhonePersonal',
            'type' => Text::class,
            'options' => [
                'label' => 'Pessoal'
            ]
        ]);

        $this->add([
            'name' => 'contactPhoneHome',
            'type' => Text::class,
            'options' => [
                'label' => 'Residencial'
            ]
        ]);

        $this->add([
            'name' => 'contactPhoneWork',
            'type' => Text::class,
            'options' => [
                'label' => 'Trabalho'
            ]
        ]);
    }

    public function getInputFilterContactFieldset()
    {

        return [
            'contactPhonePersonal' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    ['name' => 'StringLength', 'options' => [
                        'min' => 10,
                        'max' => 12
                    ]],
                ],
            ],

            'contactPhoneHome' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(10)->setMax(12)
                ],
            ],

            'contactPhoneWork' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(10)->setMax(12)
                ],
            ],

        ];
    }
}
