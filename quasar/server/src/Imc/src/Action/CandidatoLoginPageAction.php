<?php

namespace Imc\Action;

use Imc\Entity\Candidato;
use Imc\Service\CandidatoService;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

use Zend\Diactoros\Response\RedirectResponse;
use Zend\Json\Json;

class CandidatoLoginPageAction implements MiddlewareInterface
{

    /**
     * @var Candidato
     */
    private $candidato;
    /**
     * @var CandidatoService
     */
    private $service;

    public function __construct(CandidatoService $service)
    {
        $this->service = $service;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        $contentType = $request->getHeader('Content-Type');
        $data = $this->normalizeData($contentType[0], $request);

        //output: $result->getId();
        $token = $this->service->authenticateByCpf($data);
        if (!empty($token)) {
            return new JsonResponse(['success' => true, 'token' => $token]);
        }
        return new JsonResponse(['success' => false]);
    }

    private function normalizeData(string $contentType, ServerRequestInterface $request)
    {
        //input: btoa(JSON.stringify([user, password]))};
        $token = null;
        if ($contentType == 'application/json') {
            $token = Json::decode($request->getBody(), Json::TYPE_ARRAY);
        }
        if ($contentType == 'application/x-www-form-urlencoded') {
            $token = $request->getQueryParams();
        }
        return Json::decode(base64_decode($token['token']));
    }
}
