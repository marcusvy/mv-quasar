<?php

namespace Midia\Form;

use Zend\Form\Element\Text;
use Zend\Form\Element\Url;
use Zend\Validator;

trait MidiaFormTrait
{

    public function initMidiaForm()
    {
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

        // url
        $this->add([
            'name' => 'url',
            'type' => Url::class,
            'options' => [
                'label' => 'URL',
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


    }

    public function getInputFilterMidiaForm()
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
            'url' => [
                'required' => false
            ],
            'size' => [
                'required' => false
            ],
        ];
    }
}
