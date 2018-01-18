<?php

namespace User\Form\Fieldset;

use User\Service\RoleServiceInterface;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Hydrator;
use User\Entity\Role;

class RoleFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var RoleServiceInterface
     */
    private $service;

    public function __construct(RoleServiceInterface $service)
    {
        parent::__construct('user_role');
        $this->service = $service;
    }

    /**
     * Inicialization
     */
    public function init()
    {
        $this->setHydrator(new Hydrator\ClassMethods(true));
        $this->setObject(new RoleFieldset($this->service));

        $options = $this->service->getNamesForSelect();

        $this->add([
            'type' => \Zend\Form\Element\Select::class,
            'name' => 'name',
            'options' => [
                'label' => 'Função',
                'value_options' => $options,
            ],
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
