<?php

namespace Midia\Form;

use Zend\Form\Form;

class ImageForm extends Form
{

    public function init()
    {

        $this->add([
            'name' => 'detail',
            'type' => Fieldset\ImageDetailFieldset::class
        ]);

        $this->add([
            'name' => 'file',
            'type' => Fieldset\ImageFileFieldset::class
        ]);
    }
}
