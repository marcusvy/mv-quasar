<?php
namespace User\Form;

use Zend\Form\Element\Email;
use Zend\Form\Form;
use Zend\Filter;
use Zend\Validator;
use Zend\InputFilter\InputFilterProviderInterface;

class ForgetPasswordForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {
        $this->add([
            'name' => 'email',
            'type' => Email::class
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
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

        ];
    }


}