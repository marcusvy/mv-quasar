<?php

namespace Midia\Form\Fieldset;

use Midia\Model\Entity\Image;
use Zend\Form\Element\Text;
use Zend\Form\Element\Url;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;
use Zend\Validator;

class ImageDetailFieldset extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new Image());

        //    title
        $this->add([
            'name' => 'title',
            'type' => Text::class,
            'options' => [
                'label' => 'Título',
            ],
        ]);

        // description
        $this->add([
            'name' => 'description',
            'type' => Text::class,
            'options' => [
                'label' => 'Descrição',
            ],
        ]);

        // uri
        $this->add([
            'name' => 'uri',
            'type' => Text::class,
            'options' => [
                'label' => 'URL',
            ]
        ]);

        // width
        $this->add([
            'name' => 'width',
            'type' => Text::class,
            'options' => [
                'label' => 'Largura',
            ]
        ]);

        // height
        $this->add([
            'name' => 'height',
            'type' => Text::class,
            'options' => [
                'label' => 'Altura',
            ]
        ]);

        // width
        $this->add([
            'name' => 'width',
            'type' => Text::class,
            'options' => [
                'label' => 'Largura',
            ]
        ]);

        // height
        $this->add([
            'name' => 'height',
            'type' => Text::class,
            'options' => [
                'label' => 'Altura',
            ]
        ]);

        // Size
        $this->add([
            'name' => 'size',
            'type' => Text::class,
            'options' => [
                'label' => 'Tamanho do Arquivo',
            ]
        ]);

        // type
        $this->add([
            'name' => 'type',
            'type' => Text::class,
            'options' => [
                'label' => 'Tipo',
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'title' => [
                'required' => true,
                'validators' => [
                    (new Validator\NotEmpty()),
                ],
            ],
            'description' => [
                'required' => false
            ],
            'uri' => [
                'required' => false
            ],
            'width' => [
                'required' => false
            ],
            'height' => [
                'required' => false
            ],
            'size' => [
                'required' => false
            ],
            'type' => [
                'required' => false
            ],
        ];
    }
}
