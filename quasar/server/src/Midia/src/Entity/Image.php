<?php

namespace Midia\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="mv_midia_image")
 * @ORM\Entity(repositoryClass="Midia\Repository\ImageRepository")
 */
class Image extends AbstractEntity
{

  /**
   * @var integer
   *
   * @ORM\Column(name="id", type="integer", nullable=false)
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="IDENTITY")
   */
    private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="title", type="string", length=255, nullable=false)
   */
    private $title;

  /**
   * @var string
   *
   * @ORM\Column(name="description", type="string", length=255, nullable=true)
   */
    private $description;

  /**
   * @var string
   *
   * @ORM\Column(name="uri", type="text", length=65535, nullable=false)
   */
    private $uri;

  /**
   * @var integer
   *
   * @ORM\Column(name="width", type="integer", nullable=true)
   */
    private $width;

  /**
   * @var integer
   *
   * @ORM\Column(name="height", type="integer", nullable=true)
   */
    private $height;

  /**
   * @var string
   *
   * @ORM\Column(name="format", type="string", length=10, nullable=true)
   */
    private $format;

  /**
   * @return int
   */
    public function getId(): int
    {
        return $this->id;
    }

  /**
   * @param int $id
   * @return Image
   */
    public function setId(int $id): Image
    {
        $this->id = $id;
        return $this;
    }

  /**
   * @return string
   */
    public function getTitle(): string
    {
        return $this->title;
    }

  /**
   * @param string $title
   * @return Image
   */
    public function setTitle(string $title): Image
    {
        $this->title = $title;
        return $this;
    }

  /**
   * @return string
   */
    public function getDescription(): string
    {
        return $this->description;
    }

  /**
   * @param string $description
   * @return Image
   */
    public function setDescription(string $description): Image
    {
        $this->description = $description;
        return $this;
    }

  /**
   * @return string
   */
    public function getUri(): string
    {
        return $this->uri;
    }

  /**
   * @param string $uri
   * @return Image
   */
    public function setUri(string $uri): Image
    {
        $this->uri = $uri;
        return $this;
    }

  /**
   * @return int
   */
    public function getWidth(): int
    {
        return $this->width;
    }

  /**
   * @param int $width
   * @return Image
   */
    public function setWidth(int $width): Image
    {
        $this->width = $width;
        return $this;
    }

  /**
   * @return int
   */
    public function getHeight(): int
    {
        return $this->height;
    }

  /**
   * @param int $height
   * @return Image
   */
    public function setHeight(int $height): Image
    {
        $this->height = $height;
        return $this;
    }

  /**
   * @return string
   */
    public function getFormat(): string
    {
        return $this->format;
    }

  /**
   * @param string $format
   * @return Image
   */
    public function setFormat(string $format): Image
    {
        $this->format = $format;
        return $this;
    }
}
