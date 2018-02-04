<?php

namespace User\Form;

use User\Form\Fieldset\LoginFieldset;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'login',
            'type' => LoginFieldset::class,
        ]);
    }
}
