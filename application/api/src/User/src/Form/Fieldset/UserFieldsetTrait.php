<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Validator;

trait UserFieldsetTrait
{
    use LoginFieldsetTrait;

    public function initUserFieldset()
    {
        $this->initLoginFieldset();

        $this->add([
            'name' => 'email',
            'type' => Email::class
        ]);

        $this->add([
            'name' => 'status',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'active',
            'type' => Checkbox::class,
        ]);

        $this->add([
            'name' => 'perfil',
            'type' => Text::class
        ]);

        $this->add([
            'name' => 'role',
            'type' => Text::class
        ]);

    }

    public function getInputFilterUserFieldset()
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

                'status' => [
                    'required' => false,
                ],
                'active' => [
                    'required' => false,
                    'filters' => [
                        (new Filter\Boolean()),
                    ],
                ],
                'perfil' => [
                    'required' => false,
                ],
                'role' => [
                    'required' => false,
                ],
            ]
        );

    }

}