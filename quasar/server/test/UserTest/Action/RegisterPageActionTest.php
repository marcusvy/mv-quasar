<?php

namespace UserTest\Action;

use Core\Mail\MailServiceInterface;
use Core\Service\ServiceInterface;
use User\Action\RegisterPageAction;
use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use User\Entity\User;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Json\Json;
use Zend\Mail\Message;

class RegisterPageActionTest extends TestCase
{
    /** @var RouterInterface */
    protected $service;

    /** @var MailServiceInterface */
    protected $mailService;

    protected $middleware;

    protected function setUp()
    {
        $this->service = $this->prophesize(ServiceInterface::class);

        $this->mailService = $this->prophesize(MailServiceInterface::class);
        $this->mailService->write()->willReturn(new Message());
        $this->mailService->send()->willReturn(true);
    }

    public function testReturnsJsonResponseWhenNoTemplateRendererProvided()
    {

        $this->middleware = new RegisterPageAction(
            $this->service->reveal(),
            $this->mailService->reveal()
        );

        $response = $this->middleware->process(
            $this->prophesize(ServerRequestInterface::class)->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );

        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    public function testRequiredKeysAreReceived()
    {
        $this->middleware = new RegisterPageAction(
            $this->service->reveal(),
            $this->mailService->reveal()
        );

        $data = [
            'name' => "Aline",
            'credential' => "aline",
            'email' => 'alineneves@live.com',
            'password' => '1234'
        ];
        $actual = $this->middleware->requiredFieldsExists($data);
        $this->assertTrue($actual);

        $dataFalse = [
            'name' => "Aline"
        ];
        $actual = $this->middleware->requiredFieldsExists($dataFalse);
        $this->assertFalse($actual);
    }

    public function testReceiveUserData()
    {
        $response = $this->defaultProccess();

        $this->assertInstanceOf(JsonResponse::class, $response);

        $payload = $response->getPayload();
        $expected = ['success' => true];
        $this->assertEquals($expected, $payload);
    }


    public function testEmailNotSend()
    {
        $this->mailService->send()->willReturn(false);

        $response = $this->defaultProccess();

        $this->assertInstanceOf(JsonResponse::class, $response);

        $expected = [
            'success' => false,
            'message' => 'Erro ao enviar e-mail. Seu e-mail está correto?',
        ];
        $this->assertEquals($expected, $response->getPayload());
    }

    private function defaultProccess()
    {
        $this->middleware = new RegisterPageAction(
            $this->service->reveal(),
            $this->mailService->reveal()
        );

        $data = [
            'name' => "Aline",
            'credential' => "aline",
            'email' => 'alineneves@live.com',
            'password' => '1234'
        ];
        $body = Json::encode($data);

        $request = $this->prophesize(ServerRequestInterface::class);
        $request->getHeader('Content-Type')->willReturn(['application/json']);
        $request->getBody()->willReturn($body);

        $dataUserToServe = [
            'perfil' => ['name' => $data['name']],
            'credential' => $data['credential'],
            'email' => $data['email'],
            'password' => $data['password']
        ];

        // service create
        $user = $this->prophesize(User::class);
        $user->getActivationKey()->willReturn('abc');
        $this->service->create($dataUserToServe)->willReturn($user->reveal());


        $response = $this->middleware->process(
            $request->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );

        return $response;
    }
}
