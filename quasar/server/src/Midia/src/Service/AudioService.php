<?php
namespace Midia\Service;

use Core\Service\AbstractService;
use Midia\Model\Entity\Audio;

class AudioService extends AbstractService implements AudioServiceInterface
{
    protected $entity = Audio::class;
}
