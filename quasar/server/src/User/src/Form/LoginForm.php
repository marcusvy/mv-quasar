<?php
namespace User\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function init()
    {
        $this->add([
        'name' => 'login',
        'type' => 'User\Form\Fieldset\LoginFieldset',
        ]);

        $this->add([
        'name' => 'remember',
        'type' => 'Checkbox',
        'options'=>[
        'label'=>'Lembrar meu registro'
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
        'remember' => [
        'filters' => [
          ['name' => 'Zend\Filter\Boolean']
        ]
        ]
        ];
    }
}
