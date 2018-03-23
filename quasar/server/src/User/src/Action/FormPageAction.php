<?php

namespace User\Action;

use Psr\Http\Server\RequestHandlerInterface as DelegateInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class FormPageAction implements MiddlewareInterface
{

    private $template;

    /** @var \Zend\Form\FormInterface */
    private $form;

    public function __construct(TemplateRendererInterface $template = null, $form = null)
    {
        $this->template = $template;
        $this->form = $form;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {

        $data = [];
        $this->form->setData($request->getParsedBody());
        if ($this->form->isValid()) {
            //autopopulate with filters
            $data = $this->form->setData($this->form->getData());
        }

        return new HtmlResponse($this->template->render('user::form-page', [
            'form' => $this->form,
            'data' => $data
        ]));
    }
}
