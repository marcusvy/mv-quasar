<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;
use User\Entity\User;
use Zend\Validator;

class LoginFieldset extends Fieldset implements InputFilterProviderInterface
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
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                    (new Filter\StringToLower())->setEncoding('UTF-8'),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(80)
                ],
            ],

            'password' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                    (new Validator\StringLength())->setMin(6)->setMax(80)
                ],
            ],

        ];
    }
}
