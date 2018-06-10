<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Concurso
 *
 * @ORM\Table(name="imc_concurso")
 * @ORM\Entity(repositoryClass="Imc\Repository\ConcursoRepository")
 */
class Concurso extends AbstractEntity
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
     * @ORM\Column(name="uf", type="string", length=255, nullable=true)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var ConcursoInformacao
     *
     * @ORM\OneToOne(targetEntity="Imc\Entity\ConcursoInformacao", inversedBy="concurso")
     * @ORM\JoinColumn(name="fk_concurso_informacao", referencedColumnName="id")
     */
    private $informacao;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Imc\Entity\ConcursoArquivo", mappedBy="concurso")
     */
    private $arquivos;

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
        $this->arquivos = new ArrayCollection();

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
     * @return Concurso
     */
    public function setId(int $id): Concurso
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
     * @return Concurso
     */
    public function setNome(string $nome): Concurso
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getUf(): string
    {
        return $this->uf;
    }

    /**
     * @param string $uf
     * @return Concurso
     */
    public function setUf(string $uf): Concurso
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Concurso
     */
    public function setDescricao(string $descricao): Concurso
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return ConcursoInformacao
     */
    public function getInformacao(): ConcursoInformacao
    {
        return $this->informacao;
    }

    /**
     * @param ConcursoInformacao $informacao
     * @return Concurso
     */
    public function setInformacao(ConcursoInformacao $informacao): Concurso
    {
        $this->informacao = $informacao;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getArquivos(): ArrayCollection
    {
        return $this->arquivos;
    }

    /**
     * @param ArrayCollection $arquivos
     */
    public function setArquivos(ArrayCollection $arquivos)
    {
        $this->arquivos = $arquivos;
    }



    /**
     * @param \DateTime $createdat
     * @return Concurso
     */
    public function setCreatedat(\DateTime $createdat): Concurso
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
     * @return Concurso
     */
    public function setUpdatedat(\DateTime $updatedat): Concurso
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
     * @return Concurso
     */
    public function setActive(bool $active): Concurso
    {
        $this->active = $active;
        return $this;
    }
}
