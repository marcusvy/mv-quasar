<?php
namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\Perfil;

class AddressFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $serviceLocator;

  /**
   * Inicialização
   */
    public function init()
    {

        $this->setHydrator(new Hydrator\ClassMethods(false));
        $this->setObject(new Perfil());

        $this->add([
        'name' => 'addressStreet',
        'type' => 'Text',
        'options' => [
        'label' => 'Logradouro'
        ]
        ]);

        $this->add([
        'name' => 'addressNumber',
        'type' => 'Text',
        'options' => [
        'label' => 'Número'
        ]
        ]);

        $this->add([
        'name' => 'addressDistrict',
        'type' => 'Text',
        'options' => [
        'label' => 'Bairro/Setor'
        ]
        ]);


        $this->add([
        'name' => 'postalCode',
        'type' => 'Text',
        'options' => [
        'label' => 'CEP'
        ]
        ]);

        $this->add([
        'name' => 'city',
        'type' => 'Text',
        'options' => [
        'label' => 'Cidade'
        ]
        ]);

        $this->add([
        'name' => 'state',
        'type' => 'Text',
        'options' => [
        'label' => 'Estado'
        ]
        ]);

        $this->add([
        'name' => 'country',
        'type' => 'Text',
        'options' => [
        'label' => 'País'
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [

        'addressStreet' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 100
          ]],
        ],
        ],

        'addressNumber' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 20
          ]],
        ],
        ],

        'addressDistrict' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 100
          ]],
        ],
        ],

        'postalCode' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 8,
            'max' => 8
          ]],
        ],
        ],

        'city' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 100
          ]],
        ],
        ],

        'state' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 50
          ]],
        ],
        ],

        'country' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 1,
            'max' => 50
          ]],
        ],
        ],

        ];
    }

  /**
   * @param ServiceLocatorInterface $serviceLocator
   */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}
