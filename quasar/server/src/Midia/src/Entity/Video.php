<?php

namespace Midia\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="mv_midia_video")
 * @ORM\Entity(repositoryClass="Midia\Repository\VideoRepository")
 */
class Video extends AbstractEntity
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
   * @ORM\Column(name="title", type="string", length=200, nullable=true)
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
   * @ORM\Column(name="type", type="string", length=50, nullable=false)
   */
    private $type;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="duration", type="time", nullable=true)
   */
    private $duration;

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
   * @ORM\Column(name="uri", type="string", length=255, nullable=true)
   */
    private $uri;

  /**
   * @var string
   *
   * @ORM\Column(name="url_code", type="string", length=255, nullable=true)
   */
    private $urlCode;

  /**
   * @var string
   *
   * @ORM\Column(name="format", type="string", length=10, nullable=true)
   */
    private $format;

  /**
   * @var integer
   *
   * @ORM\Column(name="size", type="integer", nullable=true)
   */
    private $size;

  /**
   * @return int
   */
    public function getId(): int
    {
        return $this->id;
    }

  /**
   * @param int $id
   * @return Video
   */
    public function setId(int $id): Video
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
   * @return Video
   */
    public function setTitle(string $title): Video
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
   * @return Video
   */
    public function setDescription(string $description): Video
    {
        $this->description = $description;
        return $this;
    }

  /**
   * @return string
   */
    public function getType(): string
    {
        return $this->type;
    }

  /**
   * @param string $type
   * @return Video
   */
    public function setType(string $type): Video
    {
        $this->type = $type;
        return $this;
    }

  /**
   * @return \DateTime
   */
    public function getDuration(): \DateTime
    {
        return $this->duration;
    }

  /**
   * @param \DateTime $duration
   * @return Video
   */
    public function setDuration(\DateTime $duration): Video
    {
        $this->duration = $duration;
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
   * @return Video
   */
    public function setWidth(int $width): Video
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
   * @return Video
   */
    public function setHeight(int $height): Video
    {
        $this->height = $height;
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
   * @return Video
   */
    public function setUri(string $uri): Video
    {
        $this->uri = $uri;
        return $this;
    }

  /**
   * @return string
   */
    public function getUrlCode(): string
    {
        return $this->urlCode;
    }

  /**
   * @param string $urlCode
   * @return Video
   */
    public function setUrlCode(string $urlCode): Video
    {
        $this->urlCode = $urlCode;
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
   * @return Video
   */
    public function setFormat(string $format): Video
    {
        $this->format = $format;
        return $this;
    }

  /**
   * @return int
   */
    public function getSize(): int
    {
        return $this->size;
    }

  /**
   * @param int $size
   * @return Video
   */
    public function setSize(int $size): Video
    {
        $this->size = $size;
        return $this;
    }
}
