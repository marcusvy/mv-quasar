<?php

namespace Midia\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="mv_midia_image")
 * @ORM\Entity(repositoryClass="Midia\Model\Repository\ImageRepository")
 */
class Image extends Midia
{
    use ImageTrait;
}
