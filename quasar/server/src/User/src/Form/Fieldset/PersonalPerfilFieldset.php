<?php
namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator;
use User\Entity\Perfil;

class PersonalPerfilFieldset extends Fieldset implements ServiceLocatorAwareInterface, InputFilterProviderInterface
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
        'name' => 'name',
        'type' => 'Text',
        'required' => true,
        'options' => [
        'label' => 'Nome Completo'
        ]
        ]);

        $this->add([
        'name' => 'birthday',
        'type' => 'Date',
        'required' => false,
        'options' => [
        'label' => 'Data de Nascimento'
        ]
        ]);

        $this->add([
        'name' => 'birthPlace',
        'type' => 'Text',
        'required' => false,
        'options' => [
        'label' => 'Naturalidade'
        ]
        ]);

        $this->add([
        'name' => 'nationality',
        'type' => 'Text',
        'required' => false,
        'options' => [
        'label' => 'Nacionalidade'
        ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [

        'name' => [
        'required' => true,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'NotEmpty', 'options' => [
            'messages' => [
              'isEmpty' => 'Não pode estar em branco'
            ]
          ]],
          ['name' => 'StringLength', 'options' => [
            'min' => 6,
            'max' => 200
          ]],
        ],
        ],

        'birthday' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [],
        ],

        'birthPlace' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 2,
            'max' => 50
          ]],
        ],
        ],

        'nationality' => [
        'required' => false,
        'filters' => [
          ['name' => 'Zend\Filter\StringTrim'],
          ['name' => 'Zend\Filter\StripTags'],
        ],
        'validators' => [
          ['name' => 'StringLength', 'options' => [
            'min' => 2,
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
