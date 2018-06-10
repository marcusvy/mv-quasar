<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * CandidatoPerfil
 *
 * @ORM\Table(name="imc_candidato_perfil")
 * @ORM\Entity(repositoryClass="Imc\Repository\CandidatoPerfilRepository")
 */
class CandidatoPerfil extends AbstractEntity
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
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $datanascimento;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nomemae;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $nomepai;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $tipodocumento;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $numdocumento;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $orgaodocumento;

    /**
     * @ORM\Column(type="string")
     */
    private $ufdocumento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $dataemissaodocumento;

    /**
     * @ORM\Column(type="string")
     */
    private $nacionalidade;

    /**
     * @ORM\Column(type="string")
     */
    private $naturalidade;

    /**
     * @ORM\Column(type="string")
     */
    private $sexo;

    /**
     * @ORM\Column(type="string")
     */
    private $estadocivil;

    /**
     * @ORM\Column(type="string")
     */
    private $nivelescolar;

    /**
     * @ORM\Column(type="string")
     */
    private $cep;

    /**
     * @ORM\Column(type="string")
     */
    private $tipologradouro;

    /**
     * @ORM\Column(type="string")
     */
    private $endereco;

    /**
     * @ORM\Column(type="string")
     */
    private $endereconumero;

    /**
     * @ORM\Column(type="string")
     */
    private $enderecobairro;

    /**
     * @ORM\Column(type="string")
     */
    private $enderecouf;

    /**
     * @ORM\Column(type="string")
     */
    private $enderecomunicipio;

    /**
     * @ORM\Column(type="string")
     */
    private $tel1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tel2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tel3;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CandidatoPerfil
     */
    public function setId(int $id): CandidatoPerfil
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatanascimento(): \DateTime
    {
        return $this->datanascimento;
    }

    /**
     * @param string $datanascimento
     * @return CandidatoPerfil
     */
    public function setDatanascimento($datanascimento): CandidatoPerfil
    {
        if (is_string($datanascimento)) {
            $datanascimento = new \DateTime($datanascimento);
        }
        $this->datanascimento = $datanascimento;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomemae(): string
    {
        return $this->nomemae;
    }

    /**
     * @param string $nomemae
     * @return CandidatoPerfil
     */
    public function setNomemae(string $nomemae): CandidatoPerfil
    {
        $this->nomemae = $nomemae;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomepai(): string
    {
        return $this->nomepai;
    }

    /**
     * @param string $nomepai
     * @return CandidatoPerfil
     */
    public function setNomepai(string $nomepai): CandidatoPerfil
    {
        $this->nomepai = $nomepai;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipodocumento(): string
    {
        return $this->tipodocumento;
    }

    /**
     * @param string $tipodocumento
     * @return CandidatoPerfil
     */
    public function setTipodocumento(string $tipodocumento): CandidatoPerfil
    {
        $this->tipodocumento = $tipodocumento;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumdocumento(): string
    {
        return $this->numdocumento;
    }

    /**
     * @param string $numdocumento
     * @return CandidatoPerfil
     */
    public function setNumdocumento(string $numdocumento): CandidatoPerfil
    {
        $this->numdocumento = $numdocumento;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrgaodocumento(): string
    {
        return $this->orgaodocumento;
    }

    /**
     * @param string $orgaodocumento
     * @return CandidatoPerfil
     */
    public function setOrgaodocumento(string $orgaodocumento): CandidatoPerfil
    {
        $this->orgaodocumento = $orgaodocumento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUfdocumento()
    {
        return $this->ufdocumento;
    }

    /**
     * @param mixed $ufdocumento
     * @return CandidatoPerfil
     */
    public function setUfdocumento($ufdocumento)
    {
        $this->ufdocumento = $ufdocumento;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataemissaodocumento(): \DateTime
    {
        return $this->dataemissaodocumento;
    }

    /**
     * @param \DateTime $dataemissaodocumento
     * @return CandidatoPerfil
     */
    public function setDataemissaodocumento($dataemissaodocumento): CandidatoPerfil
    {
        if (is_string($dataemissaodocumento)) {
            $dataemissaodocumento = new \DateTime($dataemissaodocumento);
        }
        $this->dataemissaodocumento = $dataemissaodocumento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * @param mixed $nacionalidade
     * @return CandidatoPerfil
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * @param mixed $naturalidade
     * @return CandidatoPerfil
     */
    public function setNaturalidade($naturalidade)
    {
        $this->naturalidade = $naturalidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     * @return CandidatoPerfil
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
    }

    /**
     * @param mixed $estadocivil
     * @return CandidatoPerfil
     */
    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNivelescolar()
    {
        return $this->nivelescolar;
    }

    /**
     * @param mixed $nivelescolar
     * @return CandidatoPerfil
     */
    public function setNivelescolar($nivelescolar)
    {
        $this->nivelescolar = $nivelescolar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     * @return CandidatoPerfil
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipologradouro()
    {
        return $this->tipologradouro;
    }

    /**
     * @param mixed $tipologradouro
     * @return CandidatoPerfil
     */
    public function setTipologradouro($tipologradouro)
    {
        $this->tipologradouro = $tipologradouro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     * @return CandidatoPerfil
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereconumero()
    {
        return $this->endereconumero;
    }

    /**
     * @param mixed $endereconumero
     * @return CandidatoPerfil
     */
    public function setEndereconumero($endereconumero)
    {
        $this->endereconumero = $endereconumero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecobairro()
    {
        return $this->enderecobairro;
    }

    /**
     * @param mixed $enderecobairro
     * @return CandidatoPerfil
     */
    public function setEnderecobairro($enderecobairro)
    {
        $this->enderecobairro = $enderecobairro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecouf()
    {
        return $this->enderecouf;
    }

    /**
     * @param mixed $enderecouf
     * @return CandidatoPerfil
     */
    public function setEnderecouf($enderecouf)
    {
        $this->enderecouf = $enderecouf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecomunicipio()
    {
        return $this->enderecomunicipio;
    }

    /**
     * @param mixed $enderecomunicipio
     * @return CandidatoPerfil
     */
    public function setEnderecomunicipio($enderecomunicipio)
    {
        $this->enderecomunicipio = $enderecomunicipio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * @param mixed $tel1
     * @return CandidatoPerfil
     */
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * @param mixed $tel2
     * @return CandidatoPerfil
     */
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel3()
    {
        return $this->tel3;
    }

    /**
     * @param mixed $tel3
     * @return CandidatoPerfil
     */
    public function setTel3($tel3)
    {
        $this->tel3 = $tel3;
        return $this;
    }
}
