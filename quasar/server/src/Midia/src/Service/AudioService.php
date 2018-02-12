<?php
namespace Midia\Service;

use Midia\Model\Entity\Audio;

class AudioService extends AbstractMidiaService implements AudioServiceInterface
{
    protected $entity = Audio::class;
}
