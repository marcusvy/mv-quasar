<?php
namespace Midia\Form;

use Zend\Form\Form;

class Audio extends Form
{

    public function init()
    {

        $this->add([
        'name' => 'audio',
        'type' => 'MvMidia\Form\Fieldset\AudioDetail'
        ]);

        $this->add([
        'name' => 'file',
        'type' => 'MvMidia\Form\Fieldset\AudioFile'
        ]);
    }
}
