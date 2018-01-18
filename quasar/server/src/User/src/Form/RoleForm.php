<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class RoleForm extends Form implements InputFilterProviderInterface
{

    public function init()
    {
        $this->add([
        'name' => 'name',
        'type' => \Zend\Form\Element\Text::class,
        'required' => true,
        'options' => [
        'label' => 'Função'
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
        'name' => [
        'validators' => [
          ['name' => 'NotEmpty', 'options' => [
            'messages' => [
              'isEmpty' => 'Você tem que insterir um nome'
            ]
          ]],
        ],
        ]
        ];
    }
}
