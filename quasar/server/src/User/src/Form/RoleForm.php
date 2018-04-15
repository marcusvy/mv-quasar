<?php

namespace User\Form;


use User\Model\Entity\Role;
use User\Form\Fieldset\RoleFieldsetTrait;
use Zend\Form\Form;
use Zend\Hydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class RoleForm extends Form implements InputFilterProviderInterface
{
    use RoleFieldsetTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(false));
//        $this->setObject(new Role());
        
        $this->initRoleFieldset(); 
    }

    public function getInputFilterSpecification()
    {
        return $this->getInputFilterRoleFieldset();
    }
}
