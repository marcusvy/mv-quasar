<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lotacao
 *
 * @ORM\Table(name="imc_lotacao")
 * @ORM\Entity(repositoryClass="Imc\Repository\LotacaoRepository")
 */
class Lotacao extends AbstractEntity
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
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */

    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cnes", type="string", length=255, nullable=true)
     */
    private $cnes;

    /**
     * @var string
     *
     * @ORM\Column(name="localizacao", type="string", length=255, nullable=true)
     */
    private $localizacao;

    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=255, nullable=true)
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="ine", type="string", length=255, nullable=true)
     */
    private $ine;

    /**
     * @var string
     *
     * @ORM\Column(name="equipe", type="string", length=255, nullable=true)
     */
    private $equipe;

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
     * @return Lotacao
     */
    public function setId(int $id): Lotacao
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Lotacao
     */
    public function setNome(string $nome): Lotacao
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCnes(): string
    {
        return $this->cnes;
    }

    /**
     * @param string $cnes
     * @return Lotacao
     */
    public function setCnes(string $cnes): Lotacao
    {
        $this->cnes = $cnes;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalizacao(): string
    {
        return $this->localizacao;
    }

    /**
     * @param string $localizacao
     * @return Lotacao
     */
    public function setLocalizacao(string $localizacao): Lotacao
    {
        $this->localizacao = $localizacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * @param string $area
     * @return Lotacao
     */
    public function setArea(string $area): Lotacao
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return string
     */
    public function getIne(): string
    {
        return $this->ine;
    }

    /**
     * @param string $ine
     * @return Lotacao
     */
    public function setIne(string $ine): Lotacao
    {
        $this->ine = $ine;
        return $this;
    }

    /**
     * @return string
     */
    public function getEquipe(): string
    {
        return $this->equipe;
    }

    /**
     * @param string $equipe
     * @return Lotacao
     */
    public function setEquipe(string $equipe): Lotacao
    {
        $this->equipe = $equipe;
        return $this;
    }



    /**
     * @param \DateTime $createdat
     * @return Lotacao
     */
    public function setCreatedat(\DateTime $createdat): Lotacao
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
     * @return Lotacao
     */
    public function setUpdatedat(\DateTime $updatedat): Lotacao
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
     * @return Lotacao
     */
    public function setActive(bool $active): Lotacao
    {
        $this->active = $active;
        return $this;
    }
}
