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
            'name' => 'identity',
            'type' => Text::class,
            'options' => [
                'label' => 'Identidade'
            ]
        ]);

        $this->add([
            'name' => 'credential',
            'type' => Password::class,
            'options' => [
                'label' => 'Senha'
            ]
        ]);
    }

    public function getInputFilterLoginFieldset()
    {
        return [

            'identity' => [
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

            'credential' => [
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
