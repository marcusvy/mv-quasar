<?php

namespace User\Form;


use User\Form\Fieldset\LoginFieldsetTrait;
use User\Model\Entity\User;
use Zend\Filter;
use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Form;
Use Zend\Hydrator;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class RegisterForm extends Form implements InputFilterProviderInterface
{
    use LoginFieldsetTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new User());

        $this->initLoginFieldset();
        $this->add([
            'name' => 'email',
            'type' => Email::class,
            'options' => [
                'label' => 'E-mail'
            ]
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'nome'
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return array_merge_recursive(
            $this->getInputFilterLoginFieldset(),
            [
                'email' => [
                    'required' => true,
                    'filters' => [
                        (new Filter\StringTrim()),
                        (new Filter\StripTags()),
                        (new Filter\StringToLower())->setEncoding('UTF-8'),
                    ],
                    'validators' => [
                        (new Validator\NotEmpty()),
                        (new Validator\EmailAddress()),
                        (new Validator\StringLength())->setMin(6)->setMax(80)
                    ],
                ],

                'name' => [
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
            ]
        );
    }
}