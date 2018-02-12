<?php

namespace User\Form;

use Zend\Filter;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class ActivationForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {

        $this->add([
            'name' => 'credential',
            'type' => Text::class,
            'required' => true,
            'options' => [
                'label' => 'Credencial'
            ]
        ]);

        $this->add([
            'name' => 'activation_code',
            'type' => Text::class,
            'required' => true,
            'options' => [
                'label' => 'Código de Ativação'
            ]
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
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(80)
                ],
            ],

            'activation_code' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                ],
            ],


        ];
    }
}
