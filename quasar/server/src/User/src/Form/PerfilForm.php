<?php
namespace MvUser\Form;

use Zend\Form\Form;

class PerfilForm extends Form
{
    public function init()
    {
        $this->add([
        'name'=>'perfil',
        'type' => 'MvUser\Form\Fieldset\PersonalPerfil',
        ]);

        $this->add([
        'name'=>'perfilAddress',
        'type' => 'MvUser\Form\Fieldset\Address',
        ]);

        $this->add([
        'name'=>'perfilContact',
        'type' => 'MvUser\Form\Fieldset\Contact',
        ]);

        $this->add([
        'name'=>'perfilSocial',
        'type' => 'MvUser\Form\Fieldset\Social',
        ]);
    }
}
