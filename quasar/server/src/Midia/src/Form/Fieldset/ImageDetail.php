<?php
namespace Midia\Form\Fieldset;

use Midia\Entity\Image;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;

class ImageDetail extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new Image());

    //    title
        $this->add([
        'name' => 'title',
        'type' => 'Text',
        'options' => [
        'label' => 'Título',
        ],
        ]);

        // description
        $this->add([
        'name' => 'description',
        'type' => 'Text',
        'options' => [
        'label' => 'Descrição',
        ],
        ]);

        // uri
        $this->add([
        'name' => 'uri',
        'type' => 'Text',
        'options' => [
        'label' => 'URL',
        ]
        ]);

        // width
        $this->add([
        'name' => 'width',
        'type' => 'Text',
        'options' => [
        'label' => 'Largura',
        ]
        ]);

        // height
        $this->add([
        'name' => 'height',
        'type' => 'Text',
        'options' => [
        'label' => 'Altura',
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
        'title' => [
        'required' => false,
        'validators' => [
          ['name' => 'NotEmpty', 'options' => [
            'messages' => [
              'isEmpty' => 'Você tem que insterir um título'
            ]
          ]],
        ],
        ],
        'description' => [
        'required' => false
        ],
        'uri' => [
        'required' => false
        ],
        'width' => [
        'required' => false
        ],
        'height' => [
        'required' => false
        ],
        ];
    }
}
