<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Text;
use Zend\Validator;

trait AddressFieldsetTrait
{
    public function initAddressFieldset()
    {
        $this->add([
            'name' => 'addressStreet',
            'type' => Text::class,
            'options' => [
                'label' => 'Logradouro'
            ]
        ]);

        $this->add([
            'name' => 'addressNumber',
            'type' => Text::class,
            'options' => [
                'label' => 'Número'
            ]
        ]);

        $this->add([
            'name' => 'addressDistrict',
            'type' => Text::class,
            'options' => [
                'label' => 'Bairro/Setor'
            ]
        ]);


        $this->add([
            'name' => 'postalCode',
            'type' => Text::class,
            'options' => [
                'label' => 'CEP'
            ]
        ]);

        $this->add([
            'name' => 'city',
            'type' => Text::class,
            'options' => [
                'label' => 'Cidade'
            ]
        ]);

        $this->add([
            'name' => 'state',
            'type' => Text::class,
            'options' => [
                'label' => 'Estado'
            ]
        ]);

        $this->add([
            'name' => 'country',
            'type' => Text::class,
            'options' => [
                'label' => 'País'
            ]
        ]);
    }

    public function getInputFilterAddressFieldset()
    {
        return [
            'addressStreet' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(100)
                ],
            ],

            'addressNumber' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(20)
                ],
            ],

            'addressDistrict' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(100)
                ],
            ],

            'postalCode' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(8)->setMax(8)
                ],
            ],

            'city' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(100)
                ],
            ],

            'state' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(50)
                ],
            ],

            'country' => [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\StringLength())->setMin(1)->setMax(50)
                ],
            ],

        ];
    }

}
