<?php
namespace Midia\Form\Fieldset;

use Midia\Entity\Audio;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;

class AudioDetail extends Fieldset implements InputFilterProviderInterface
{

    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new Audio());

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

        // type
        $this->add([
        'name' => 'type',
        'type' => 'Select',
        'options' => [
        'label' => 'Type',
        'value_options'=>[
          'local' => 'Local',
          'soundcloud' => 'Soudcloud',
          'youtube' => 'Youtube',
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
        ];
    }
}
