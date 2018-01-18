<?php
namespace Midia\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Filter\RealPath;

class ImageFile extends Fieldset implements InputFilterProviderInterface
{
    public function init()
    {
        $this->add([
        'name' => 'image',
        'type' => 'File'
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
          ['name' => 'Zend\Filter\File\RenameUpload', 'options' => [
            'target' => $target,
            'overwrite' => true,
            'randomize' => true,
            'use_upload_extension' => true
          ]],
        ],
        'validators' => [
          ['name' => 'Zend\Validator\File\IsImage'],
          ['name' => 'Zend\Validator\File\Extension', 'options' => [
            'extension' => ['gif', 'jpg', 'jpeg', 'png', 'svg', 'tiff']
          ]],
        ]
        ]
        ];
    }
}
