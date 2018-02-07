<?php

namespace Midia\Form;

use Zend\Form\Form;

class AudioForm extends Form
{

    public function init()
    {

        $this->add([
            'name' => 'detail',
            'type' => Fieldset\AudioDetailFieldset::class
        ]);

        $this->add([
            'name' => 'file',
            'type' => Fieldset\AudioFileFieldset::class
        ]);
    }
}
