<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Password;
use Zend\Form\Element\Text;
use Zend\Validator;

trait LoginFieldsetTrait
{

    public function initLoginFieldset()
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
            'name' => 'password',
            'type' => Password::class,
            'required' => true,
            'options' => [
                'label' => 'Senha'
            ]
        ]);
    }

    public function getInputFilterLoginFieldset()
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

            'password' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(80)
                ],
            ],

        ];
    }
}
