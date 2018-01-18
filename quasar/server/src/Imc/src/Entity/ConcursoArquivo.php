<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * ConcursoArquivo
 *
 * @ORM\Table(name="imc_concurso_arquivo")
 * @ORM\Entity(repositoryClass="Imc\Repository\ConcursoArquivoRepository")
 */
class ConcursoArquivo extends AbstractEntity
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
     * @ORM\ManyToOne(targetEntity="Imc\Entity\Concurso", inversedBy="arquivos")
     * @ORM\JoinColumn(name="fk_concurso_concurso_arquivo", referencedColumnName="id")
     */
    private $concurso;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $local;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicado_at", type="datetime", nullable=true)
     */
    private $publicadoAt;


    public function __construct($options = [])
    {
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
     * @return ConcursoArquivo
     */
    public function setId(int $id): ConcursoArquivo
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
     * @return ConcursoArquivo
     */
    public function setConcurso(Concurso $concurso): ConcursoArquivo
    {
        $this->concurso = $concurso;
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
     * @return ConcursoArquivo
     */
    public function setNome(string $nome): ConcursoArquivo
    {
        $this->nome = $nome;
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
     * @return ConcursoArquivo
     */
    public function setDescricao(string $descricao): ConcursoArquivo
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocal(): string
    {
        return $this->local;
    }

    /**
     * @param string $local
     * @return ConcursoArquivo
     */
    public function setLocal(string $local): ConcursoArquivo
    {
        $this->local = $local;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPublicadoAt(): \DateTime
    {
        return $this->publicadoAt;
    }

    /**
     * @param \DateTime $publicadoAt
     * @return ConcursoArquivo
     */
    public function setPublicadoAt(\DateTime $publicadoAt): ConcursoArquivo
    {
        $this->publicadoAt = $publicadoAt;
        return $this;
    }
}
