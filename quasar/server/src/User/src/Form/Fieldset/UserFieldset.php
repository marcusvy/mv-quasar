<?php

namespace User\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;
use User\Entity\User as UserEntity;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * Inicialization
     */
    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new UserEntity());

        $realServiceLocator = $this->serviceLocator->getServiceLocator();
        $entityManager = $realServiceLocator->get('Doctrine\ORM\EntityManager');

        $this->add([
            'name' => 'id',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => [
                'label' => 'Função',
                'object_manager' => $entityManager,
                'target_class' => 'User\Entity\User',
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => 'Selecione...',
                'find_method' => [
                    'name' => 'getNames'
                ],
            ]
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'id' => [
                'required' => true,
            ]
        ];
    }
}
