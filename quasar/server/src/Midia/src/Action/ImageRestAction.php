<?php

namespace Midia\Action;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Midia\Model\Entity\Image;

class ImageRestAction extends AbstractMidiaRestAction implements MiddlewareInterface
{
    protected $entity = Image::class;
}
