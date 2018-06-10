<?php
namespace Midia\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ImageTrait
{
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
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return self
     */
    public function setWidth($width = null)
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
     * @return self
     */
    public function setHeight($height = null)
    {
        $this->height = $height;
        return $this;
    }
}