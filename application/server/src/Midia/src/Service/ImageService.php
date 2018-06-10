<?php
namespace Midia\Service;

use Midia\Model\Entity\Image;

class ImageService extends AbstractMidiaService implements ImageServiceInterface
{
    protected $entity = Image::class;
}
