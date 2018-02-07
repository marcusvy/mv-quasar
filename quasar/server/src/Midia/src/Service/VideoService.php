<?php
namespace Midia\Service;

use Core\Service\AbstractService;
use Midia\Model\Entity\Video;

class VideoService extends AbstractService implements VideoServiceInterface
{
    protected $entity = Video::class;
}
