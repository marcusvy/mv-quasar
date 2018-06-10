<?php

namespace User\Form;

use User\Form\Fieldset\LoginFieldset;
use User\Form\Fieldset\LoginFieldsetTrait;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class LoginForm extends Form implements InputFilterProviderInterface
{
    use LoginFieldsetTrait;

    public function init()
    {
        $this->initLoginFieldset();
    }

    public function getInputFilterSpecification()
    {
        return $this->getInputFilterLoginFieldset();
    }
}
