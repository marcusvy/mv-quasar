<?php

namespace User\Form;

use User\Form\Fieldset\UserFieldsetTrait;
use User\Model\Entity\User;
use Zend\Form\Form;
Use Zend\Hydrator;
use Zend\InputFilter\InputFilterProviderInterface;


class UserForm extends Form implements InputFilterProviderInterface
{

    use UserFieldsetTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new User());

        $this->initUserFieldset();
    }

    public function getInputFilterSpecification()
    {
        return $this->getInputFilterUserFieldset();
    }
}
