<?php

namespace Midia\Action;

use Psr\Http\Server\MiddlewareInterface;
use Midia\Model\Entity\Image;

class ImageRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Image::class;
}