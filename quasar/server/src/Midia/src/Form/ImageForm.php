<?php

namespace Midia\Form;

use Zend\Form\Element\Text;
use Zend\Hydrator;
use Midia\Model\Entity\Image;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class ImageForm extends Form implements InputFilterProviderInterface
{
    use ImageFormTrait, ImageFileTrait;

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods());
        $this->setObject(new Image());

        $this->initImageForm();
        $this->initImageFile();

        // type
        $this->add([
            'name' => 'type',
            'type' => Text::class,
            'options' => [
                'label' => 'Tipo',
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return array_merge_recursive(
            [
                'type' => [
                    'required' => false
                ],
            ],
            $this->getInputFilterImageForm(),
            $this->getInputFilterImageFile()
        );
    }

}
