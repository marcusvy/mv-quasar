<?php

namespace User\Form;

use User\Form\Fieldset\LoginFieldsetTrait;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class ChangePasswordForm extends Form implements InputFilterProviderInterface
{
    use LoginFieldsetTrait;

    public function init()
    {
        $this->initLoginFieldset();
        $this->remove('identity');
    }

    public function getInputFilterSpecification()
    {
        $parent = $this->getInputFilterLoginFieldset();
        unset($parent['identity']);
        return $parent;
    }
}