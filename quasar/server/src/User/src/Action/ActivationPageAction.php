<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Entity\User;
use Zend\Diactoros\Response\JsonResponse;
use Core\Service\ServiceInterface;
use User\Service\UserService;
use Zend\Json\Json;

class ActivationPageAction implements MiddlewareInterface
{
    /** @var UserService */
    protected $service;

    /** @var MailServiceInterface */
    protected $mailService;


    public function __construct(
        ServiceInterface $service,
        MailServiceInterface $mailService
    )
    {
        $this->service = $service;
        $this->mailService = $mailService;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
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
    private function mail(User $user=null)
    {
        if(!is_null($user)){
            $texto = "<h3>Parabéns, %s!</h3><p>Seu registro foi ativado.</p>";

            $this->mailService
                ->write()
                ->setSubject('Quasar Platform::Activation')
                ->setFrom('teste@mviniciusconsultoria.com.br')
                ->addTo($user->getEmail(), $user->getPerfil()->getName())
                ->setBody(sprintf($texto, $user->getPerfil()->getName()));
            return $this->mailService->send();
        }
    }
}
