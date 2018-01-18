<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
    public function init()
    {

    //    $this->add(array(
    //      'name'=>'login',
    //      'type'=> 'MvUser\Form\Fieldset\Login',
    //    ));

    //    $this->add(array(
    //      'name'=>'activation',
    //      'type'=> 'MvUser\Form\Fieldset\Activation',
    //    ));
    //
        $this->add([
        'name'=> 'role',
        'type'=> Fieldset\RoleFieldset::class,
        ]);
    //
    //    $this->add([
    //      'name'=>'perfil',
    //      'type' => 'MvUser\Form\Fieldset\PersonalPerfil',
    //    ]);
    //
    //    $this->add([
    //      'name'=>'perfilAddress',
    //      'type' => 'MvUser\Form\Fieldset\Address',
    //    ]);
    //
    //    $this->add([
    //      'name'=>'perfilContact',
    //      'type' => 'MvUser\Form\Fieldset\Contact',
    //    ]);
    //
    //    $this->add([
    //      'name'=>'perfilSocial',
    //      'type' => 'MvUser\Form\Fieldset\Social',
    //    ]);
    }
}

/**
 * @todo form on viewhelper
 */
