<?php

namespace User\Action;

use Core\Mail\MailServiceInterface;
use Core\Service\ServiceInterface;
use Core\Utils\RequestUtils;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use User\Form\RegisterForm;
use User\Model\Entity\Perfil;
use User\Model\Entity\User;
use User\Service\PerfilService;
use User\Service\UserService;
use Zend\Diactoros\Response\JsonResponse;

use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Form\FormInterface;

class RegisterAction implements MiddlewareInterface
{

    /** @var UserService */
    private $userService;

    /** @var PerfilService */
    private $perfilService;

    /** @var MailServiceInterface */
    private $mailService;

    /** @var FormInterface */
    private $form;

    /** @var FormInterface */
    private $formPerfil;

    /** @var TemplateRendererInterface */
    private $template;

    public function __construct(
        TemplateRendererInterface $template,
        ServiceInterface $userService,
        ServiceInterface $perfilService,
        MailServiceInterface $mailService,
        FormInterface $form = null,
        FormInterface $formPerfil = null
    ) {
        $this->userService = $userService;
        $this->perfilService = $perfilService;
        $this->mailService = $mailService;
        $this->form = $form;
        $this->formPerfil = $formPerfil;
    }

    /**
     * {@inheritDoc}
     */
    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ): \Psr\Http\Message\ResponseInterface {
        $data = RequestUtils::extract($request);

        if ($this->form instanceof RegisterForm) {
            $this->form->setData($data);
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                try {
                    /** @var Perfil $perfil */
//                    $perfil = $this->perfilService->create(['name' => $data['name']])->getFirstResult();

                    $createUser = [
                        'identity' => $data['identity'],
                        'credential' => $data['credential'],
                        'email' => $data['email'],
                        'perfil' => 0,
                        'role' => 0
                    ];
                    $user = $this->userService->create($createUser)->getFirstResult();

                    if ($user instanceof User) {
                        
                        if ($this->mail($user)) {
                            return new JsonResponse([
                                'success' => true,
                                'mail' => true
                            ]);
                        } else {
                            return new JsonResponse([
                                'success' => true,
                                'mail' => false,
                                'message' => 'Usuário criado, porém erro ao enviar e-mail. Seu e-mail está correto?',
                            ]);
                        }

                        return new JsonResponse(['success' => true]);
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
        return new JsonResponse(['success' => false, 'message' => 'Formulário nulo']);
    }

    /**
     * @param User|null $user
     * @return bool
     */
    private function mail(User $user = null)
    {
        if (!is_null($user) && $this->mailService->isEnabled()) {
            $subject = sprintf('Quasar Platform::Registration-%s', $user->getEmail());

            $body = $this->template->render('user::register-email', [
                'layout' => 'layout::email',
                'user' => $user,
            ]);

            $this->mailService
                ->write()
                ->addTo($user->getEmail(), $user->getPerfil()->getName())
                ->setSubject($subject)
                ->setBody($body);

            return $this->mailService->send();
        }
        return false;
    }
}
