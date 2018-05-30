<?php

namespace User\Action;

use Core\Utils\RequestUtils;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Model\Entity\User;
use User\Service\AuthService;
use User\Service\AuthServiceInterface;
use User\Service\UserServiceInterface;
use Zend\Authentication\Result;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Form\FormInterface;
use Zend\Json\Json;

class AuthenticationAction implements MiddlewareInterface
{
    /** @var AuthService */
    private $service;

    /** @var FormInterface */
    private $form;

    /** @var UserServiceInterface */
    private $userService;

    public function __construct(
        AuthServiceInterface $service,
        UserServiceInterface $userService,
        FormInterface $form       // Form $form
    )
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->form = $form;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        $data = RequestUtils::extract($request);
//        $contentType = $request->getHeader('Content-Type')[0];

//        $data = ($contentType == 'application/json')
//            ? Json::decode($request->getBody(), Json::TYPE_ARRAY)
//            : $request->getQueryParams();

        list($identity, $credential) = Json::decode(base64_decode($data['token']));

        $this->form->setData([
            'identity' => $identity,
            'credential' => $credential,
        ]);
        if ($this->form->isValid()) {
            $this->service->getAdapter()->setIdentity($identity)->setCredential($credential);
            $result = $this->service->authenticate();

            if ($result->getCode() === Result::SUCCESS) {
                return new JsonResponse([
                    'success' => $result->getMessages()['success'],
                    'token' => $this->storageDataForClient($result)
                ]);
            }
        }

        return new JsonResponse([
            'success' => false
        ]);
    }

    /**
     * @param Result $result
     * @return array
     */
    private function storageDataForClient($result = null): array
    {
        /** @todo Create a class with storage configuration for user based on db configuration table */
        /** @todo Send the token for use with client */
        $data = [];
        if (!is_null($result) and ($result instanceof Result)) {
            return $this->userService->getConfig($result->getIdentity());
        }
        return $data;
    }
}
