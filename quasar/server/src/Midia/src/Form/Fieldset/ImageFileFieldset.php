<?php

namespace Midia\Form\Fieldset;

use Zend\Filter;
use Zend\Form\Element\File;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Filter\RealPath;
use Zend\Validator;

class ImageFileFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function init()
    {
        $this->add([
            'name' => 'image',
            'type' => File::class
        ]);
    }

    public function getInputFilterSpecification()
    {
        $filter = new RealPath(true);
        $date = new \DateTime('now');
        $target = sprintf('public/local/image/%s/%s', $date->format('Y'), $date->format('m'));
        if (!$filter->filter($target)) {
            mkdir($target, 0755, true);
        }
        return [
            'image' => [
                'required' => false,
                'filters' => [
                    (new Filter\File\RenameUpload())
                        ->setTarget($target)
                        ->setOverwrite(true)
                        ->setRandomize(true)
                        ->setUseUploadExtension(true)
                ],
                'validators' => [
                    (new Validator\File\IsImage()),
                    (new Validator\File\Extension(['gif', 'jpg', 'jpeg', 'png', 'svg', 'tiff']))
                ]
            ]
        ];
    }
}
