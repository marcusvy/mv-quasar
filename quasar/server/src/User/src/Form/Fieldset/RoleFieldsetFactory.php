<?php
namespace User\Form\Fieldset;

use Interop\Container\ContainerInterface;
use User\Service\RoleServiceInterface;

class RoleFieldsetFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $service = $container->get(RoleServiceInterface::class);
        return new RoleFieldset($service);
    }
}
