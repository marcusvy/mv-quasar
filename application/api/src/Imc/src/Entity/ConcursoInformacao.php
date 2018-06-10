<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * ConcursoInformacao
 *
 * @ORM\Table(name="imc_concurso_informacao")
 * @ORM\Entity(repositoryClass="Imc\Repository\ConcursoInformacaoRepository")
 */
class ConcursoInformacao extends AbstractEntity
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
     * @ORM\OneToOne(targetEntity="Imc\Entity\Concurso", mappedBy="informacao")
     */
    private $concurso;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */

    private $processo;



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
     * @return ConcursoInformacao
     */
    public function setId(int $id): ConcursoInformacao
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
     * @return ConcursoInformacao
     */
    public function setConcurso(Concurso $concurso): ConcursoInformacao
    {
        $this->concurso = $concurso;
        return $this;
    }


    /**
     * @return string
     */
    public function getProcesso(): string
    {
        return $this->processo;
    }

    /**
     * @param string $processo
     * @return ConcursoInformacao
     */
    public function setProcesso(string $processo): ConcursoInformacao
    {
        $this->processo = $processo;
        return $this;
    }
}
