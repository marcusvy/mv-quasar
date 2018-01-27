<?php

namespace User\Form;

use Zend\Filter;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class SimpleForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {

        $this->add([
            'name' => 'credential',
            'type' => Text::class
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'credential' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                    (new Filter\StringToLower())->setEncoding('UTF-8'),
                ],
                'validators' => [
//                    (new Validator\NotEmpty())->setMessages([
//                        Validator\NotEmpty::IS_EMPTY => 'Não pode estar em branco'
//                    ]),
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(80)
                ]
            ]
        ];
    }

//    public function getInputFilterSpecification()
//    {
//        return [
//            'credential' => [
//                'required' => true,
//                'filters' => [
//                    ['name' => StringTrim::class],
//                    ['name' => StripTags::class],
//                    ['name' => StringToLower::class, 'options' => [
//                        'encoding' => 'UTF-8'
//                    ]],
//                ],
//                'validators' => [
//                    ['name' => NotEmpty::class, 'options' => [
//                        'messages' => [
//                            NotEmpty::IS_EMPTY => 'Não pode estar em branco'
//                        ]
//                    ]],
//                    ['name' => StringLength::class, 'options' => [
//                        'min' => 6,
//                        'max' => 80
//                    ]],
//                ],
//            ],
//        ];
//    }
}
