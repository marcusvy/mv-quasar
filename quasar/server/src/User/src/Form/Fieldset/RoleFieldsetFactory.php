<?php
namespace User\Factory;

use Interop\Container\ContainerInterface;
use User\Form\Fieldset\RoleFieldset;
use User\Service\RoleServiceInterface;

class RoleFieldsetFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(RoleServiceInterface::class);
        return new RoleFieldset($service);
    }
}
