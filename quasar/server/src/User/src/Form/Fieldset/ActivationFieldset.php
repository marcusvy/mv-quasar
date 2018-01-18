<?php

namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\User;

class ActivationFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $serviceLocator;

    /**
     * Inicialização
     */
    public function init()
    {

        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new User());

        $this->add([
            'name' => 'active',
            'type' => 'Checkbox',
            'required' => false,
            'options' => [
                'label' => 'Ativado?'
            ]
        ]);
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function getInputFilterSpecification()
    {
        return [
            'active' => [
                'required' => false,
                'filters' => [
                    ['name' => 'Zend\Filter\Boolean', 'options' => [
                        'casting' => true
                    ]],
                ]
            ]
        ];
    }
}
