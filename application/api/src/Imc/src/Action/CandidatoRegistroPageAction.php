<?php

namespace Imc\Action;

use Imc\Entity\Candidato;
use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

use Zend\Json\Json;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

class CandidatoRegistroPageAction implements MiddlewareInterface
{
    /** @var Message */
    private $mail;

    /** @var Smtp */
    private $transport;

    /** @var Candidato */
    private $candidato;

    /** @var string */
    private $hash;

    public function __construct(array $config = [])
    {
        $this->mail = new Message();
        $this->config($config['options']);
        $this->candidato = new Candidato();
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {

        $contentType = $request->getHeader('Content-Type')[0];
        $data = ($contentType == 'application/json')
            ? Json::decode($request->getBody(), Json::TYPE_ARRAY)
            : $request->getQueryParams();

        if (isset($data['nome']) &&
            isset($data['user']) &&
            isset($data['email'])) {
            $this->gerarCandidato($data['nome'], $data['user'], $data['email']);
            $this->registerHash();
            $this->writeMail();

            try {
                $this->transport->send($this->mail);
            } catch (\Zend\Mail\Exception\RuntimeException $e) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Erro ao enviar e-mail. Seu e-mail está correto?',
                    'backtrace' => $this->hash
                ]);
            }
            return new JsonResponse(['success' => true]);
        }
        return new JsonResponse(['success' => false]);
    }

    private function gerarCandidato($nome, $cpf, $email)
    {
        $this->candidato->setCpf($cpf)
            ->setNome($nome)
            ->setEmail($email)
            ->setPassword($this->geraSenha());
        return $this->candidato;
    }

    private function writeMail()
    {
        $text = <<<EOT
        Cadastro de inscrição - 
        Processo Seletivo 01/2017 Prefeitura Municipal de Humaitá-%s
EOT;
        $subject = sprintf($text, $this->candidato->getCpf());
        $this->mail->setFrom('teste@mviniciusconsultoria.com.br');
        $this->mail->addTo($this->candidato->getEmail(), $this->candidato->getCpf());
        $this->mail->setSubject($subject);
        $this->mail->setEncoding('UTF-8');
        $this->mail->getHeaders()->addHeaderLine('Content-Type', 'text/html');
        $this->mail->setBody($this->emailBody());
    }

    private function config(array $mailOptions = null)
    {
        $this->transport = new Smtp();
        $this->transport->setOptions(new SmtpOptions($mailOptions));
    }

    private function emailBody()
    {
        $modelo = <<<EMAILMODEL
        <h3>Caro Candidato.(a): %s</h3>
        <p>Email: <strong>%s</strong></p> 
        <p>Estamos enviando este email, confirmando seu cadastro.</p>
        <p>Para ter acesso a consulta de sua inscrição ou do comprovante de inscrição, 
        seu login é o número do CPF cadastrado na ficha de inscrição.</p> 
        <ul>
            <li>Seu Login: <strong>%s</strong></li>
            <li>Sua Senha: <strong style="color: red">%s</strong></li>
        </ul>
        <p>Informamos que seu cartão de inscrição só será gerado após 
        a confirmação Bancária do pagamento do Boleto. </p>
        <p>Você poderá acompanhar acessando a CONSULTA SITUAÇÃO - INSCRIÇÃO. 
        Na página a qual você fez sua inscrição. </p>
        <p style="color:darkblue">Para ativar sua conta, você deve confirmar este e-mail clicando no link a seguir:
            <a href="http://localhost:8000/api/candidato-ativar/%s">Confirmar minha inscrição</a>
        </p>
        
        <p><strong>Mult Task Informática</strong>. </p>
EMAILMODEL;
        $texto = sprintf(
            $modelo,
            $this->candidato->getNome(),
            $this->candidato->getEmail(),
            $this->candidato->getCpf(),
            $this->candidato->getPassword(),
            $this->hash
        );
        return $texto;
    }

    private function geraSenha()
    {
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyz@";
        return substr(str_shuffle($caracteres), 0, 12);
    }

    private function registerHash(): string
    {
        $data = [
            "nome" => $this->candidato->getNome(),
            "email" => $this->candidato->getEmail(),
            "cpf" => $this->candidato->getCpf(),
            "password" => $this->candidato->getPassword()
        ];
        $this->hash = urlencode(base64_encode(Json::encode($data)));
        return $this->hash;
    }
}
