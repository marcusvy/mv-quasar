<?php
namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SocialFieldset extends Fieldset implements ServiceLocatorAwareInterface, InputFilterProviderInterface
{
    protected $serviceLocator;

  /**
   * Inicialização
   */
    public function init()
    {
        $socialMidia = [
        'facebook'=>'Facebook',
        'googleplus' => 'Google Plus',
        'linkedin' => 'LinkdIn',
        'twitter' => 'Twitter',
        'youtube' => 'Youtube'
        ];

        foreach ($socialMidia as $name => $label) {
            $this->add([
            'name' => $name,
            'type' => 'Text',
            'required' => false,
            'options' => [
              'label' => $label
            ]
            ]);
        }
    }

    public function getInputFilterSpecification()
    {
        return [];
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
