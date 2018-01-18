<?php
namespace Midia\Form;

use Zend\Form\Form;

class Video extends Form
{

    public function init()
    {

        $this->add([
        'name' => 'video',
        'type' => 'MvMidia\Form\Fieldset\VideoDetail'
        ]);
    }
}
