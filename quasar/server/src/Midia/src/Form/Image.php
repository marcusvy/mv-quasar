<?php
namespace Midia\Form;

use Zend\Form\Form;

class Image extends Form
{

    public function init()
    {

        $this->add([
        'name' => 'image',
        'type' => 'MvMidia\Form\Fieldset\ImageDetail'
        ]);

        $this->add([
        'name' => 'file',
        'type' => 'MvMidia\Form\Fieldset\ImageFile'
        ]);
    }
}
