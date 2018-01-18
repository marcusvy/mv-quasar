<?php

namespace Imc\Action;

use Imc\Entity\Candidato;
use Imc\Entity\CandidatoPerfil;
use Imc\Service\CandidatoPerfilService;
use Imc\Service\CandidatoService;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\Response\TextResponse;
use Zend\Json\Json;

class CandidatoAtivarPageAction implements MiddlewareInterface
{

    /** @var Candidato */
    private $candidato;

    /** @var CandidatoPerfil */
    private $perfil;

    /** @var CandidatoService */
    private $service;

    /** @var CandidatoPerfilService */
    private $servicePerfil;

    public function __construct(CandidatoService $service, CandidatoPerfilService $servicePerfil)
    {
        $this->service = $service;
        $this->servicePerfil = $servicePerfil;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $key = $request->getAttribute('key');
        $data = Json::decode(base64_decode(urldecode($key)), Json::TYPE_ARRAY);
        $data['active'] = true;
        try {
            $this->perfil = $this->servicePerfil->create($this->getInitialPerfil($data));
            if ($this->perfil) {
                try {
                    $this->candidato = $this->service->create($data);
                } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
                    return new JsonResponse([
                        'success' => true,
                        'messsage' => 'Usuário já registrado.'
                    ]);
                }
            }
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
            return new JsonResponse([
                'success' => true,
                'messsage' => 'Perfil já registrado.'
            ]);
        }
        return new JsonResponse([
            'success' => true, 'redirect' => true
        ]);
    }

    /**
     * @return array
     */
    private function getInitialPerfil($data)
    {
        var_dump($data);
        return [];
    }
}
