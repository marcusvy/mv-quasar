<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Model\Entity\User;
use Zend\Diactoros\Response\JsonResponse;
use Core\Service\ServiceInterface;
use User\Service\UserService;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Json\Json;

class ActivationAction implements MiddlewareInterface
{
    /** @var UserService */
    private $service;

    /** @var MailServiceInterface */
    private $mailService;

    /** @var TemplateRendererInterface */
    private $template;

    public function __construct(
        ServiceInterface $service,
        MailServiceInterface $mailService,
        TemplateRendererInterface $template
    ) {
        $this->service = $service;
        $this->mailService = $mailService;
    }

    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ): \Psr\Http\Message\ResponseInterface {
        $credential = $request->getAttribute('credential');
        $key = $request->getAttribute('key');

//        @todo add form to sanitize
        if (!is_null($credential) && !is_null($key)) {
            if ($this->service->activate($credential, $key)) {
                $this->mail($this->service->getIdentity());
                return new JsonResponse([
                    'success' => true
                ]);
            }
        }

        return new JsonResponse([
            'success' => false,
            'message' => 'Chave inválida',
        ]);
    }


    /**
     * @param User $user
     * @return bool
     */
    private function mail(User $user = null)
    {
        if (!is_null($user) && $this->mailService->isEnabled()) {
            $body = $this->template->render('user::activation-email', [
                'layout' => 'layout::email',
                'user' => $user,
            ]);

            $this->mailService
                ->write()
                ->setSubject('Quasar Platform::Activation')
                ->addTo($user->getEmail(), $user->getPerfil()->getName())
                ->setBody($body);
            return $this->mailService->send();
        }
    }
}
