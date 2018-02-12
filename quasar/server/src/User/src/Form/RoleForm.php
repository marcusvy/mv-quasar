<?php

namespace User\Form;

use User\Form\Fieldset\RoleFieldsetTrait;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class RoleForm extends Form implements InputFilterProviderInterface
{
    use RoleFieldsetTrait;

    public function init()
    {
        $this->initRoleFieldset();
    }

    public function getInputFilterSpecification()
    {
        return $this->getInputFilterRoleFieldset();
    }
}
