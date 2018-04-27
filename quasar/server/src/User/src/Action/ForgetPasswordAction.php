<?php

namespace User\Action;

use Core\Config\ServerInfo;
use Core\Mail\MailServiceInterface;
use Core\Service\ServiceInterface;
use Core\Utils\RequestUtils;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use User\Model\Entity\Perfil;
use User\Model\Entity\User;
use User\Service\UserServiceInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Form\FormInterface;
use Zend\Diactoros\Response\TextResponse;

class ForgetPasswordAction implements MiddlewareInterface
{
    /** @var  UserServiceInterface */
    private $service;
    /** @var MailServiceInterface */
    private $mailService;
    /** @var TemplateRendererInterface */
    private $template;
    /** @var  FormInterface */
    private $formForgetPassword;
    /** @var  FormInterface */
    private $formChangePassword;
    /** @var ServerInfo */
    private $config;

    public function __construct(
        ServiceInterface $service,
        MailServiceInterface $mailService,
        TemplateRendererInterface $template,
        FormInterface $formForgetPassword,
        FormInterface $formChangePassword,
        ServerInfo $config
    ) {
        $this->config = $config;
        $this->service = $service;
        $this->mailService = $mailService;
        $this->template = $template;
        $this->formForgetPassword = $formForgetPassword;
        $this->formChangePassword = $formChangePassword;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        switch ($request->getMethod()) {
            case 'OPTIONS':
            case 'GET':
                return $this->recoverAction($request, $delegate);
            // no break
            case 'POST':
                return $this->requestAction($request, $delegate);
            case 'PUT':
            case 'PATCH':
                return $this->changeAction($request, $delegate);
        }
        return new JsonResponse([
            'success' => false,
            'message' => 'Not found!',
        ], 404);
    }

    public function recoverAction(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
//        $data = RequestUtils::extract($request);
        $result = [
            'success' => true,
            'message' => 'Recover with e-mail enabled',
        ];
        $token = $request->getAttribute('token');
        if (!is_null($token)) {
            $result['token'] = $token;
        }
        return new JsonResponse($result);
    }

    /**
     * Request change of password with e-mail
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     */
    public function requestAction(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {

        $data = RequestUtils::extract($request);
        $success = false;
        $message = 'Form not provided';
        $status = 505;
        $token = '';

        if (!is_null($this->formForgetPassword)) {
            $this->formForgetPassword->setData($data);

            if ($this->formForgetPassword->isValid()) {
                $data = $this->formForgetPassword->getData();

                $result = $this->service->verify($data['email']);
                if (!$result->hasError()) {
                    /** @var User $user */
                    $user = $result->getFirstResult();
                    $token = $this->encodeToken($user);
                    $success = true;
                    $message = 'Done';
                    $status = 200;
                    $this->requestMail($user, $token);
                }
            } else {
                $message = $this->formForgetPassword->getMessages();
            }
        }
        return new JsonResponse([
            'success' => $success,
            'message' => $message,
            'token' => $token
        ], $status);
    }

    public function changeAction(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $token = $request->getAttribute('token') ?? null;
        $data = RequestUtils::extract($request);
        $data['token'] = $token;
        $success = false;
        $message = 'Form not provided';
        $status = 505;
        if (!is_null($token)) {

            if (!is_null($this->formChangePassword)) {
                $this->formChangePassword->setData($data);
                if ($this->formChangePassword->isValid()) {

                    $data = $this->formChangePassword->getData();
                    list($id, $activation_key) = $this->decodeToken($token);
                    $result = $this->service->changePassword($id, $activation_key, $data);
                    if (!$result->hasError()) {
                        /** @var User $user */
                        $user = $result->getFirstResult();
                        $success = true;
                        $message = 'Done';
                        $status = 200;
                        $this->changeMail($user);
                    }else{
                        $message = 'User not found or invalid token';
                    }
                } else {
                    $message = $this->formChangePassword->getMessages();
                }
            }
        }

        return new JsonResponse([
            'success' => $success,
            'message' => $message,
        ], $status);
    }


    /**
     * @param User|null $user
     * @param string $token
     * @return bool
     */
    private function requestMail(User $user = null, $token = '')
    {
        if (!is_null($user) && $this->mailService->isEnabled()) {

            $body = $this->template->render('user::forget-password-email', [
                'layout' => 'layout::email',
                'user' => $user,
                'serverInfo' => $this->config[ServerInfo::CONFIG_TOKEN],
                'token' => $token
            ]);
            $this->mailService
                ->write()
                ->setSubject('Quasar Platform::Reset Password')
                ->addTo($user->getEmail(), $user->getPerfil()->getName())
                ->setBody($body);
            return $this->mailService->send();
        }
    }

    /**
     * @param User|null $user
     * @param string $token
     * @return bool
     */
    private function changeMail(User $user = null)
    {
        if (!is_null($user) && $this->mailService->isEnabled()) {

            $body = $this->template->render('user::change-password-email', [
                'layout' => 'layout::email',
                'user' => $user
            ]);
            $this->mailService
                ->write()
                ->setSubject('Quasar Platform::Your Password has changed')
                ->addTo($user->getEmail(), $user->getPerfil()->getName())
                ->setBody($body);
            return $this->mailService->send();
        }
    }

    /**
     * @param User $user
     * @return string
     */
    private function encodeToken(User $user): string
    {
        $id = base64_encode($user->getId());
        $activation_key = base64_encode($user->getActivationKey());
        return base64_encode(sprintf('%s.%s', $id, $activation_key));
    }

    /**
     * @param string $token
     * @return array
     */
    private function decodeToken(string $token): array
    {
        $hash = base64_decode($token);
        $decodeCallback = function ($value) {
            return base64_decode($value);
        };
        list($id, $activation_key) = array_map($decodeCallback, explode('.', $hash));
        return [$id, $activation_key];
    }
}
