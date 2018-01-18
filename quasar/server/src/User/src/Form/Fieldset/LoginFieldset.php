<?php

namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\User;

class LoginFieldset extends Fieldset implements ServiceLocatorAwareInterface, InputFilterProviderInterface
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
            'name' => 'credential',
            'type' => 'Text',
            'required' => true,
            'options' => [
                'label' => 'Credencial'
            ]
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'Password',
            'required' => true,
            'options' => [
                'label' => 'Senha'
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [

            'credential' => [
                'required' => true,
                'filters' => [
                    ['name' => 'Zend\Filter\StringTrim'],
                    ['name' => 'Zend\Filter\StripTags'],
                    ['name' => 'Zend\Filter\StringToLower', 'options' => [
                        'encoding' => 'UTF-8'
                    ]],
                ],
                'validators' => [
                    ['name' => 'NotEmpty', 'options' => [
                        'messages' => [
                            'isEmpty' => 'Não pode estar em branco'
                        ]
                    ]],
                    ['name' => 'StringLength', 'options' => [
                        'min' => 6,
                        'max' => 80
                    ]],
                ],
            ],

            'password' => [
                'required' => true,
                'filters' => [
                    ['name' => 'Zend\Filter\StringTrim'],
                    ['name' => 'Zend\Filter\StripTags'],
                ],
                'validators' => [
                    ['name' => 'NotEmpty', 'options' => [
                        'messages' => [
                            'isEmpty' => 'Não pode estar em branco'
                        ]
                    ]],
                    ['name' => 'StringLength', 'options' => [
                        'min' => 6,
                        'max' => 80
                    ]],
                ],
            ],

        ];
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
