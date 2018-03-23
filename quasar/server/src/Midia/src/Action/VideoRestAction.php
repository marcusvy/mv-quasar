<?php

namespace Midia\Action;

use Psr\Http\Server\MiddlewareInterface;
use Midia\Model\Entity\Video;

class VideoRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Video::class;
}
