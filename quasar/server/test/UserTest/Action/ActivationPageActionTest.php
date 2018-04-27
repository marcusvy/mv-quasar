<?php

namespace UserTest\Action;

use Core\Mail\MailServiceInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use User\Action\ActivationAction;
use User\Entity\User;
use User\Service\PerfilServiceInterface;
use User\Service\UserService;
use User\Service\UserServiceInterface;
use Zend\Diactoros\Response\JsonResponse;

class ActivationPageActionTest extends TestCase
{
    /** @var EntityManagerInterface */
    private $em;

    /** @var UserServiceInterface */
    private $service;

    /** @var MailServiceInterface */
    private $mailService;

    /** @var MiddlewareInterface */
    private $middleware;

    /** @var ServerRequestInterface */
    private $request;

    protected function setUp()
    {
        $this->em = $this->prophesize(EntityManager::class);
        $this->request = $this->prophesize(ServerRequestInterface::class);
        $this->service = new UserService(
            $this->em->reveal(),
            $this->prophesize(PerfilServiceInterface::class)->reveal()
        );

        $this->mailService = $this->prophesize(MailServiceInterface::class);
        $this->mailService->send()->willReturn(true);

        $this->middleware = new ActivationAction(
            $this->service,
            $this->mailService->reveal()
        );
    }

    public function testActivationPageReturnJson()
    {
        $response = $this->eventDispatch();

        $this->assertInstanceOf(JsonResponse::class, $response);
//       No key provided
        $expect = [
            'success' => false,
            'message' => 'Chave inválida',
        ];
        $payload = $response->getPayload();
        $this->assertEquals($expect, $payload);
    }

//    public function testAttributeKeyIsProvidedOnRoute()
//    {
////        $this->eventRequestDataWillBeProvided();
//        $this->eventRegisterUserDataOnDatabase();
//        $response = $this->eventDispatch();
//
//        $this->assertInstanceOf(JsonResponse::class, $response);
//        $expect = ['success' => true];
//        $payload = $response->getPayload();
//        $this->assertEquals($expect, $payload);
//    }

    private function eventDispatch()
    {
        return $this->middleware->process(
            $this->request->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );
    }

//    private function eventRequestDataWillBeProvided()
//    {
//        $this->request->getAttribute('id')->willReturn(1);
//        $this->request->getAttribute('key')->willReturn('123');
//    }

    private function eventRegisterUserDataOnDatabase()
    {
        $user = new User(['id' => 1]);

        $this->em->getReference(User::class, 1)->willReturn($user);
        $this->em->persist($user)->shouldBeCalled()->willReturn(null);
        $this->em->flush()->shouldBeCalled()->willReturn(null);
    }

}
