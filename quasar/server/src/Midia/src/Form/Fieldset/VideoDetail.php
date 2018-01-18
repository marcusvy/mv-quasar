<?php
namespace Midia\Form\Fieldset;

use Midia\Entity\Video;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;

class VideoDetail extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new Video());

        // format (automatic)
        // size (automatic)

        // title
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

        // type
        $this->add([
        'name' => 'type',
        'type' => 'Select',
        'options' => [
        'label' => 'Type',
        'value_options'=>[
          'local' => 'Local',
          'youtube' => 'Youtube',
          'vimeo' => 'Vimeo',
        ]
        ],
        ]);

        // duration
        $this->add([
        'name' => 'duration',
        'type' => 'Time',
        'options' => [
        'label' => 'Duração',
        'format' => 'H:i:s'
        ],
        'attributes' => [
        'min' => '00:00:00',
        'max' => '23:59:59',
        'step' => '60'
        ]
        ]);

        // uri
        $this->add([
        'name' => 'uri',
        'type' => 'Text',
        'options' => [
        'label' => 'URL',
        ]
        ]);

        // url_code
        $this->add([
        'name' => 'urlCode',
        'type' => 'Text',
        'options' => [
        'label' => 'Código (Hash)',
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
        'type' => [
        'required' => true,
        ],
        'description'=>[
        'required' => false
        ],
        'duration' => [
        'required' => false
        ],
        'uri' => [
        'required' => false
        ],
        'urlCode' => [
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
