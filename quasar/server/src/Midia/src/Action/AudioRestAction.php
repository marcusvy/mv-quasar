<?php

namespace Midia\Action;

use Psr\Http\Server\MiddlewareInterface;
use Midia\Model\Entity\Audio;

class AudioRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Audio::class;
}
