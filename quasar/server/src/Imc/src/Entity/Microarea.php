<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Microarea
 *
 * @ORM\Table(
 *  name="imc_microarea",
 *  indexes={
 *    @ORM\Index(name="fk_microarea_lotacao", columns={"fk_lotacao"})
 *  }
 * )
 * @ORM\Entity(repositoryClass="Imc\Repository\MicroareaRepository")
 */
class Microarea extends AbstractEntity
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
     * @var Lotacao
     *
     * @ORM\ManyToOne(targetEntity="Imc\Entity\Lotacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_lotacao", referencedColumnName="id")
     * })
     */
    private $lotacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero",type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="abrangencia", type="string",  length=255, nullable=true)
     */
    private $abrangencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedat", type="datetime", nullable=true)
     */
    private $updatedat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;


    public function __construct($options = [])
    {
        $this->setCreatedat(new \DateTime('now'))
            ->setUpdatedat(new \DateTime('now'));

        parent::__construct($options);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Microarea
     */
    public function setId(int $id): Microarea
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Lotacao
     */
    public function getLotacao(): Lotacao
    {
        return $this->lotacao;
    }

    /**
     * @param Lotacao $lotacao
     * @return Microarea
     */
    public function setLotacao(Lotacao $lotacao): Microarea
    {
        $this->lotacao = $lotacao;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     * @return Microarea
     */
    public function setNumero(int $numero): Microarea
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbrangencia(): string
    {
        return $this->abrangencia;
    }

    /**
     * @param string $abrangencia
     * @return Microarea
     */
    public function setAbrangencia(string $abrangencia): Microarea
    {
        $this->abrangencia = $abrangencia;
        return $this;
    }


    /**
     * @param \DateTime $createdat
     * @return Microarea
     */
    public function setCreatedat(\DateTime $createdat): Microarea
    {
        $this->createdat = $createdat;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedat(): \DateTime
    {
        return $this->updatedat;
    }

    /**
     * @param \DateTime $updatedat
     * @return Microarea
     */
    public function setUpdatedat(\DateTime $updatedat): Microarea
    {
        $this->updatedat = $updatedat;
        return $this;
    }


    /**
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return Microarea
     */
    public function setActive(bool $active): Microarea
    {
        $this->active = $active;
        return $this;
    }
}
