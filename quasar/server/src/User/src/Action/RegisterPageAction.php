<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Core\Service\ServiceInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Entity\User;
use User\Service\UserService;
use Zend\Diactoros\Response\JsonResponse;

use Zend\Json\Json;

class RegisterPageAction implements MiddlewareInterface
{

    /** @var UserService */
    private $service;

    /** @var MailServiceInterface */
    private $mailService;


    public function __construct(ServiceInterface $service, MailServiceInterface $mailService)
    {
        $this->service = $service;
        $this->mailService = $mailService;
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

        if ($this->requiredFieldsExists($data)) {
            $user = [
                'perfil' => ['name' => $data['name']],
                'credential' => $data['credential'],
                'email' => $data['email'],
                'password' => $data['password']
            ];

            $user = $this->service->create($user);

            if ($user instanceof User) {
                if ($this->mail($data['name'], $data['email'], $user->getActivationKey())) {
                    return new JsonResponse(['success' => true]);
                } else {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Erro ao enviar e-mail. Seu e-mail está correto?',
                    ]);
                }
            }
        }
        return new JsonResponse(['success' => false]);
    }

    public function requiredFieldsExists($data)
    {
        return (is_array($data) &&
            isset($data['name']) &&
            isset($data['credential']) &&
            isset($data['email']) &&
            isset($data['password'])
        );
    }

    private function mail($to, $email, $activationKey)
    {
        $subject = sprintf('Quasar Platform::Registration-%s', $to);

        $texto = <<<MAIL
        <h3>Olá, %s!</h3>
        <p>Antes de utilizar seu cadastro é necessário ativá-lo. 
        Basta colar o código abaixo na página de ativação.</p>
        <p style="padding: 2em; color: ">%s</p>
MAIL;

        $this->mailService
            ->write()
            ->setFrom('teste@mviniciusconsultoria.com.br')
            ->addTo($email, $to)
            ->setSubject($subject)
            ->setBody(sprintf($texto, $to, $activationKey));

        return $this->mailService->send();
    }
}
