<?php

namespace User\Form;

use User\Form\Fieldset\LoginFieldsetTrait;
use Zend\Form\Element\Text;
use Zend\Filter;
use Zend\Validator;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class ChangePasswordForm extends Form implements InputFilterProviderInterface
{
    use LoginFieldsetTrait;

    public function init()
    {
        $this->initLoginFieldset();
        $this->remove('identity');

        $this->add([
            'type'=> Text::class,
            'name'=>'token'
        ]);
    }

    public function getInputFilterSpecification()
    {
        $parent = $this->getInputFilterLoginFieldset();
        unset($parent['identity']);
        return array_merge_recursive($parent,[
            'token' => [
                'required' => true,
                'filters' => [
                    (new Filter\StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty()),
                ],
            ]
        ]);
    }
}