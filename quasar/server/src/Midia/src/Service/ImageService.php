<?php
namespace Midia\Service;

use Core\Service\AbstractService;
use Midia\Model\Entity\Image;

class ImageService extends AbstractService implements ImageServiceInterface
{
    protected $entity = Image::class;
}
