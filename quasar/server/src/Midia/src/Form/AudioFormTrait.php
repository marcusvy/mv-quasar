<?php

namespace Midia\Form;

use Zend\Form\Element\Text;
use Zend\Form\Element\Time;

trait AudioFormTrait
{
    use MidiaFormTrait;

    public function initAudioForm()
    {
        $this->initMidiaForm();

        // duration
        $this->add([
            'name' => 'duration',
            'type' => Time::class,
            'options' => [
                'label' => 'Duração',
                'format' => 'H:i:s'
            ],
            'attributes' => [
                'min' => '00:00:00',
                'max' => '23:59:59',
                'step' => '60'
            ]
        ]);

        // format
        $this->add([
            'name' => 'format',
            'type' => Text::class,
            'options' => [
                'label' => 'Formato',
            ]
        ]);

        // url_code
        $this->add([
            'name' => 'urlcode',
            'type' => Text::class,
            'options' => [
                'label' => 'Código (Hash)',
            ]
        ]);
    }

    public function getInputFilterAudioForm()
    {
        $inputFilterMapping = [
            'duration' => [
                'required' => false
            ],
            'format' => [
                'required' => false
            ],
            'urlcode' => [
                'required' => false
            ],
        ];
        return array_merge_recursive(
            $this->getInputFilterMidiaForm(),
            $inputFilterMapping
        );
    }
}
