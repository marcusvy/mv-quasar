<?php
namespace User\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;

class SimpleForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'credential',
            'type' => Text::class
        ]);
    }

    /** @todo: add filter for validation */
    /** @todo: obtain from container in controller */
    /** @todo: obtain from container in controller */
}
