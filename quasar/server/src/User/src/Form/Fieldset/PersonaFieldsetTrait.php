<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Date;
use Zend\Form\Element\Text;
use Zend\Validator;

trait PersonaFieldsetTrait
{
    public function initPersonaFieldset()
    {

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Nome Completo'
            ]
        ]);

        $this->add([
            'name' => 'birthday',
            'type' => Date::class,
            'options' => [
                'label' => 'Data de Nascimento'
            ]
        ]);

        $this->add([
            'name' => 'birthPlace',
            'type' => Text::class,
            'required' => false,
            'options' => [
                'label' => 'Naturalidade'
            ]
        ]);

        $this->add([
            'name' => 'nationality',
            'type' => Text::class,
            'required' => false,
            'options' => [
                'label' => 'Nacionalidade'
            ]
        ]);
    }

    public function getInputFilterPersonaFieldset()
    {
        return [

            'name' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(200)
                ],
            ],

            'birthday' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [],
            ],

            'birthPlace' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(2)->setMax(50)
                ],
            ],

            'nationality' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(2)->setMax(50)
                ],
            ],

        ];
    }
}
