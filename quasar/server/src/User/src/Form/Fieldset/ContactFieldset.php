<?php
namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\Perfil;

class ContactFieldset extends Fieldset implements ServiceLocatorAwareInterface, InputFilterProviderInterface
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
        'name' => 'phonePersonal',
        'type' => 'Text',
        'required' => false,
        'options' => [
        'label' => 'Pessoal'
        ]
        ]);

        $this->add([
        'name' => 'phoneHome',
        'type' => 'Text',
        'required' => false,
        'options' => [
        'label' => 'Residencial'
        ]
        ]);

        $this->add([
        'name' => 'phoneWork',
        'type' => 'Text',
        'required' => false,
        'options' => [
        'label' => 'Trabalho'
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {

        return [

        'phonePersonal' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 10,
            'max' => 12
          ]],
        ],
        ],

        'phoneHome' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 10,
            'max' => 12
          ]],
        ],
        ],

        'phoneWork' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 10,
            'max' => 12
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
