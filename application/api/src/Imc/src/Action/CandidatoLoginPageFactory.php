<?php

namespace Imc\Action;

use Imc\Service\CandidatoService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CandidatoLoginPageFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return CandidatoAtivarPageAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(CandidatoService::class);

        return new CandidatoLoginPageAction($service);
    }
}
