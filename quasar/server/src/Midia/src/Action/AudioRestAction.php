<?php

namespace Midia\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Midia\Model\Entity\Audio;

class AudioRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Audio::class;
}
