<?php

namespace Midia\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Midia\Model\Entity\Video;

class VideoRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Video::class;
}
