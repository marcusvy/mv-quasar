<?php

namespace Midia\Form;

use Zend\Form\Form;

class VideoForm extends Form
{

    public function init()
    {

        $this->add([
            'name' => 'video',
            'type' => Fieldset\VideoDetailFieldset::class
        ]);
    }
}
