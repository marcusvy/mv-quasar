<?php

namespace User\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Service\AuthService;
use User\Service\AuthServiceInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Result;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Form\FormInterface;
use Zend\Json\Json;

class AuthPageAction implements MiddlewareInterface
{
    /** @var AuthService */
    private $service;

    /** @var FormInterface */
    private $form;

    public function __construct(
        AuthServiceInterface $service,
        FormInterface $form       // Form $form
    ) {
        $this->service = $service;
        $this->form = $form;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $contentType = $request->getHeader('Content-Type')[0];

        $data = ($contentType == 'application/json')
            ? Json::decode($request->getBody(), Json::TYPE_ARRAY)
            : $request->getQueryParams();

        list($credential, $password) = Json::decode(base64_decode($data['token']));

        $this->form->setData(['login' => [
            'credential' => $credential,
            'password' => $password
        ]]);
        if ($this->form->isValid()) {
            $this->service->getAdapter()->setCredential($credential)->setIdentity($password);
            $result = $this->service->authenticate();
            if ($result->getCode() === Result::SUCCESS) {
                return new JsonResponse([
                    'success' => true,
                    'token' => $this->storageDataForClient()
                ]);
            }
        }
        return new JsonResponse([
            'success' => false
        ]);
    }

    private function storageDataForClient(): array
    {
        return [];
    }
}
