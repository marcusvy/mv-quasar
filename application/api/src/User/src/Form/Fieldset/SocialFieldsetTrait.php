<?php

namespace User\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\Text;

trait SocialFieldsetTrait
{
    protected $fieldSocialMidia = [
        'facebook' => 'Facebook',
        'googleplus' => 'Google Plus',
        'linkedin' => 'LinkdIn',
        'twitter' => 'Twitter',
        'youtube' => 'Youtube'
    ];

    public function initSocialFieldset()
    {
        foreach ($this->fieldSocialMidia as $name => $label) {
            $this->add([
                'name' => 'user_social_' . $name,
                'type' => Text::class,
                'required' => false,
                'options' => [
                    'label' => $label
                ]
            ]);
        }
    }

    public function getInputFilterSocialFieldset()
    {
        $inputFilterSpecification = [];
        foreach ($this->fieldSocialMidia as $name => $label) {
            array_push($inputFilterSpecification, [
                'required' => false,
                'filters' => [
                    (new Filter\StringTrim()),
                    (new Filter\StripTags()),
                ],
            ]);
        }
        return $inputFilterSpecification;
    }
}
