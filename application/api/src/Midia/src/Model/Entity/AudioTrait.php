<?php

namespace Midia\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

trait AudioTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time", nullable=true)
     */
    private $duration = null;

    /**
     * @var string
     *
     * @ORM\Column(name="url_code", type="string", length=255, nullable=true)
     */
    private $urlCode = null;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=10, nullable=true)
     */
    private $format = null;


    /**
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param \DateTime $duration
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }


    /**
     * @return string
     */
    public function getUrlCode()
    {
        return $this->urlCode;
    }

    /**
     * @param string $urlCode
     * @return self
     */
    public function setUrlCode($urlCode)
    {
        $this->urlCode = $urlCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return self
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }
}