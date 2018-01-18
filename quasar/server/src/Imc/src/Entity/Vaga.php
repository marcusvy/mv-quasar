<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vaga
 *
 * @ORM\Table(name="imc_vaga")
 * @ORM\Entity(repositoryClass="Imc\Repository\VagaRepository")
 */
class Vaga extends AbstractEntity
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
     * @var Concurso
     *
     * @ORM\Column(name="fk_concurso", type="string", nullable=false)
     * @ORM\OneToOne(targetEntity="Imc\Entity\Concurso")
     * @ORM\JoinColumn(name="fk_concurso", referencedColumnName="id")
     */
    private $concurso;

    /**
     * @var Lotacao
     *
     * @ORM\Column(name="fk_lotacao", type="string", nullable=false)
     * @ORM\OneToOne(targetEntity="Imc\Entity\Lotacao")
     * @ORM\JoinColumn(name="fk_lotacao", referencedColumnName="id")
     */
    private $lotacao;

    /**
     * @var Microarea
     *
     * @ORM\Column(name="fk_microarea", type="string", nullable=false)
     * @ORM\OneToOne(targetEntity="Imc\Entity\Microarea")
     * @ORM\JoinColumn(name="fk_microarea", referencedColumnName="id")
     */
    private $microarea;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $imediata;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $reserva;

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
     * @return Vaga
     */
    public function setId(int $id): Vaga
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Concurso
     */
    public function getConcurso(): Concurso
    {
        return $this->concurso;
    }

    /**
     * @param Concurso $concurso
     * @return Vaga
     */
    public function setConcurso(Concurso $concurso): Vaga
    {
        $this->concurso = $concurso;
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
     * @return Vaga
     */
    public function setLotacao(Lotacao $lotacao): Vaga
    {
        $this->lotacao = $lotacao;
        return $this;
    }

    /**
     * @return Microarea
     */
    public function getMicroarea(): Microarea
    {
        return $this->microarea;
    }

    /**
     * @param Microarea $microarea
     * @return Vaga
     */
    public function setMicroarea(Microarea $microarea): Vaga
    {
        $this->microarea = $microarea;
        return $this;
    }

    /**
     * @return int
     */
    public function getImediata(): int
    {
        return $this->imediata;
    }

    /**
     * @param int $imediata
     * @return Vaga
     */
    public function setImediata(int $imediata): Vaga
    {
        $this->imediata = $imediata;
        return $this;
    }

    /**
     * @return int
     */
    public function getReserva(): int
    {
        return $this->reserva;
    }

    /**
     * @param int $reserva
     * @return Vaga
     */
    public function setReserva(int $reserva): Vaga
    {
        $this->reserva = $reserva;
        return $this;
    }

    /**
     * @param \DateTime $createdat
     * @return Vaga
     */
    public function setCreatedat(\DateTime $createdat): Vaga
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
     * @return Vaga
     */
    public function setUpdatedat(\DateTime $updatedat): Vaga
    {
        $this->updatedat = $updatedat;
        return $this;
    }
}
