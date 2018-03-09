<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Core\Service\ServiceInterface;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Model\Entity\Perfil;
use User\Model\Entity\User;
use User\Service\UserService;
use Zend\Diactoros\Response\JsonResponse;

use Zend\Form\FormInterface;
use Zend\Json\Json;

class RegisterPageAction implements MiddlewareInterface
{

    /** @var UserService */
    private $service;

    /** @var MailServiceInterface */
    private $mailService;

    /** @var FormInterface */
    private $form;

    /** @var FormInterface */
    private $formPerfil;

    public function __construct(
        ServiceInterface $service,
        MailServiceInterface $mailService,
        FormInterface $form = null,
        FormInterface $formPerfil = null
    )
    {
        $this->service = $service;
        $this->mailService = $mailService;
        $this->form = $form;
        $this->formPerfil = $formPerfil;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = ($request->getHeader('Content-Type')[0] == 'application/json')
            ? Json::decode($request->getBody(), Json::TYPE_ARRAY)
            : $request->getQueryParams();

        if (!is_null($this->form) && !is_null($this->formPerfil)) {
            $this->form->setData($data);
            $this->formPerfil->setData($data);
            if ($this->form->isValid() && $this->formPerfil->isValid()) {
                $user = $this->form->getData();
                $perfil = $this->formPerfil->getData();
                $user->setPerfil($perfil);

                try {
                    $user = $this->service->create($user->toArray(false));

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
                } catch (UniqueConstraintViolationException $e) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Usuário ou E-mail já cadastrado'
                    ]);
                }
            } else {
                return new JsonResponse([
                    'success' => false,
                    'form' => $this->form->getMessages()
                ]);
            }
        }
        return new JsonResponse(['success' => false]);
    }

    private function mail($to, $email, $activationKey)
    {
        $subject = sprintf('Quasar Platform::Registration-%s', $to);

        $texto = <<<MAIL
        <h3>Olá, %s!</h3>
        <p>Antes de utilizar seu cadastro é necessário ativá-lo. 
        Basta colar o código abaixo na página de ativação.</p>
        <p style="padding: 2em;">%s</p>
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
