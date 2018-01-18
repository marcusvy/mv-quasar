<?php
namespace User\Form;

use Zend\Form\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
//use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\User;

class ActivationForm extends Form implements InputFilterProviderInterface
{
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
            'name' => 'activation_code',
            'type' => 'Text',
            'required' => true,
            'options' => [
                'label' => 'Código de Ativação'
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

            'activation_code' => [
                'required' => true,
                'filters' => [
                    ['name' => 'Zend\Filter\StringTrim'],
                ],
                'validators' => [
                    ['name' => 'NotEmpty', 'options' => [
                        'messages' => [
                            'isEmpty' => 'Não pode estar em branco'
                        ]
                    ]],
                ],
            ],


        ];
    }
}