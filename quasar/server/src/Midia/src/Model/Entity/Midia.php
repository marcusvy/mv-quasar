<?php
namespace Midia\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Midia
 * @ORM\MappedSuperclass
 */
class Midia extends AbstractEntity implements MidiaEntityInterface
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
     * @ORM\Column(name="url", type="text", length=65535, nullable=true)
     */
    private $url = null;

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
     * @var string
     * @ORM\Column(name="file", type="string", nullable=true)
     */
    private $file = null;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Midia
     */
    public function setId($id): Midia
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
     * @return Midia
     */
    public function setTitle($title): Midia
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
     * @return Midia
     */
    public function setDescription($description = ''): Midia
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Midia
     */
    public function setUrl($url = ''): Midia
    {
        $this->url = $url;
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
     * @return Midia
     */
    public function setSize($size = null): Midia
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
     * @return Midia
     */
    public function setType($type): Midia
    {
        $this->type = $type;
        return $this;
    }

        /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return Midia
     */
    public function setFile($file = null): Midia
    {
        $this->file = $file;
        return $this;
    }

    public function toArray()
    {
        $data =  parent::toArray();
        if(is_array($data['file']) && isset($data['file']['tmp_name'])){
            $data['file'] = $data['file']['tmp_name'];
        }
        return $data;
    }

}