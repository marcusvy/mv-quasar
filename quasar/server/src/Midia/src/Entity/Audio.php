<?php

namespace Midia\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Audio
 *
 * @ORM\Table(name="mv_midia_audio")
 * @ORM\Entity(repositoryClass="Midia\Repository\AudioRepository")
 */
class Audio extends AbstractEntity
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
   * @ORM\Column(name="title", type="string", length=255, nullable=true)
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
   * @return Audio
   */
    public function setId(int $id): Audio
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
   * @return Audio
   */
    public function setTitle(string $title): Audio
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
   * @return Audio
   */
    public function setDescription(string $description): Audio
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
   * @return Audio
   */
    public function setType(string $type): Audio
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
   * @return Audio
   */
    public function setDuration(\DateTime $duration): Audio
    {
        $this->duration = $duration;
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
   * @return Audio
   */
    public function setUri(string $uri): Audio
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
   * @return Audio
   */
    public function setUrlCode(string $urlCode): Audio
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
   * @return Audio
   */
    public function setFormat(string $format): Audio
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
   * @return Audio
   */
    public function setSize(int $size): Audio
    {
        $this->size = $size;
        return $this;
    }
}
