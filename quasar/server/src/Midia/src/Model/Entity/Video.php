<?php

namespace Midia\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="mv_midia_video")
 * @ORM\Entity(repositoryClass="Midia\Model\Repository\VideoRepository")
 */
class Video extends Midia
{
    use ImageTrait;
    use AudioTrait;
}
