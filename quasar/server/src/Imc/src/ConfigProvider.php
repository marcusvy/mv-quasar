<?php

namespace Imc;

use Core\Doctrine\Helper\ConfigProviderHelper;

/**
 * The configuration provider for the Imc module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'doctrine' => $this->getDoctrine(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories' => [
                Action\LotacaoAction::class => Action\LotacaoPageFactory::class,
                Action\MicroareaAction::class => Action\MicroareaPageFactory::class,
                Action\ConcursoAction::class => Action\ConcursoPageFactory::class,
                Action\ConcursoArquivoAction::class => Action\ConcursoArquivoPageFactory::class,
                Action\ConcursoInformacaoAction::class => Action\ConcursoInformacaoPageFactory::class,
                Action\CandidatoAtivarPageAction::class => Action\CandidatoAtivarPageFactory::class,
                Action\CandidatoLoginPageAction::class => Action\CandidatoLoginPageFactory::class,
                Action\CandidatoRegistroPageAction::class => Action\CandidatoRegistroPageFactory::class,
                Action\CandidatoAction::class => Action\CandidatoPageFactory::class,
                Action\CandidatoPerfilAction::class => Action\CandidatoPerfilPageFactory::class,
                Service\LotacaoService::class => Service\LotacaoServiceFactory::class,
                Service\MicroareaService::class => Service\MicroareaServiceFactory::class,
                Service\ConcursoService::class => Service\ConcursoServiceFactory::class,
                Service\ConcursoArquivoService::class => Service\ConcursoArquivoServiceFactory::class,
                Service\ConcursoInformacaoService::class => Service\ConcursoInformacaoServiceFactory::class,
                Service\CandidatoService::class => Service\CandidatoServiceFactory::class,
                Service\CandidatoPerfilService::class => Service\CandidatoPerfilServiceFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app' => [__DIR__ . '/../templates/app'],
                'error' => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }

    /**
     * Returns the doctrine configuration
     *
     * @return array
     */
    public function getDoctrine()
    {
        $helper = new ConfigProviderHelper();
        return $helper->generate(
            __NAMESPACE__,
            __DIR__ . '/Entity'
        );
    }
}
