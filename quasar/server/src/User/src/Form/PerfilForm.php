<?php

namespace User\Form;

use User\Form\Fieldset\AddressFieldsetTrait;
use User\Form\Fieldset\ContactFieldsetTrait;
use User\Form\Fieldset\PersonaFieldsetTrait;
use User\Form\Fieldset\SocialFieldsetTrait;
use User\Model\Entity\Perfil;
use Zend\Form\Form;
use Zend\Hydrator;
use Zend\InputFilter\InputFilterProviderInterface;

class PerfilForm extends Form implements InputFilterProviderInterface
{
    use AddressFieldsetTrait, ContactFieldsetTrait, PersonaFieldsetTrait, SocialFieldsetTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new Perfil());

        $this->initAddressFieldset();
        $this->initContactFieldset();
        $this->initPersonaFieldset();
        $this->initSocialFieldset();
    }

    public function getInputFilterSpecification()
    {
        return array_merge_recursive(
            $this->getInputFilterPersonaFieldset(),
            $this->getInputFilterAddressFieldset(),
            $this->getInputFilterContactFieldset(),
            $this->getInputFilterSocialFieldset()
        );
    }
}
