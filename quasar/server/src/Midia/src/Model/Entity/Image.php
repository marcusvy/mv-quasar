<?php

namespace Midia\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="mv_midia_image")
 * @ORM\Entity(repositoryClass="Midia\Model\Repository\ImageRepository")
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
    private $description = '';

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="text", length=65535, nullable=true)
     */
    private $uri = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size = null;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=true)
     */
    private $type = null;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Image
     */
    public function setId($id): Image
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle($title): Image
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Image
     */
    public function setDescription($description = ''): Image
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
    public function setUri($uri = ''): Image
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Image
     */
    public function setWidth($width = null): Image
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Image
     */
    public function setHeight($height = null): Image
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Image
     */
    public function setSize($size = null): Image
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Image
     */
    public function setType($type): Image
    {
        $this->type = $type;
        return $this;
    }


}
