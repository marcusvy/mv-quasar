<?php

namespace Midia\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table(name="mv_midia_audio")
 * @ORM\Entity(repositoryClass="Midia\Model\Repository\AudioRepository")
 */
class Audio extends Midia
{
    use AudioTrait;
}
