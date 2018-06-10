<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Text;
use Zend\Validator;

trait RoleFieldsetTrait
{

    public function initRoleFieldset()
    {
        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Função'
            ]
        ]);
    }

    public function getInputFilterRoleFieldset()
    {
        return [
            'name' => [
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
            ]
        ];
    }
}
