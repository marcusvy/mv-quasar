<?php

namespace Midia\Action;

use Psr\Http\Server\MiddlewareInterface;
use Midia\Model\Entity\Audio;

class AudioRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Audio::class;

    public function onBeforeFormValidation(array $data)
    {
        if ($this->form->has('url') && isset($data['url'])) {
            $this->form->getInputFilter()->get('file')->setRequired(false);
            $this->form->getInputFilter()->get('url')->setRequired(true);
        }
    }

}