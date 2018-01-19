<?php
namespace User\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;

class UserForm extends Form
{
    public function init()
    {

        $this->add([
            'name' => 'credential',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'email',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'password',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'status',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'active',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'perfil',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'role',
            'type' => Text::class
        ]);


//        $this->add([
//        'name'=> 'role',
//        'type'=> Fieldset\RoleFieldset::class,
//        ]);
    //
    }
}

/**
 * @todo form on viewhelper
 */
