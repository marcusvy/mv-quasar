<?php

namespace Imc\Action;

use Imc\Service\CandidatoPerfilService;
use Imc\Service\CandidatoService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CandidatoAtivarPageFactory implements FactoryInterface
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
        $servicePerfil = $container->get(CandidatoPerfilService::class);

        return new CandidatoAtivarPageAction($service, $servicePerfil);
    }
}
