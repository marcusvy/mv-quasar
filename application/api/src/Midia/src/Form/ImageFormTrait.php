<?php

namespace Midia\Form;

use Zend\Form\Element\Text;


trait ImageFormTrait
{
    use MidiaFormTrait;

    public function initImageForm()
    {
        $this->initMidiaForm();

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

    }

    public function getInputFilterImageForm()
    {
        $inputFilterMapping = [
            'width' => [
                'required' => false
            ],
            'height' => [
                'required' => false
            ],
        ];
        return array_merge_recursive(
            $this->getInputFilterMidiaForm(),
            $inputFilterMapping
        );
    }
}
