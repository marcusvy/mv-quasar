<?php

namespace Imc\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
use Zend\Math\Rand;

/**
 * Candidato
 *
 * @ORM\Table(
 *  name="imc_candidato",
 *  uniqueConstraints={
 *    @ORM\UniqueConstraint(name="credential_UNIQUE", columns={"cpf"})
 *  },
 *  indexes={
 *    @ORM\Index(name="fk_candidato_candidato_perfil", columns={"fk_perfil"}),
 *  }
 * )
 * @ORM\Entity(repositoryClass="Imc\Repository\CandidatoRepository")
 */
class Candidato extends AbstractEntity
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
     * @ORM\Column(type="string", length=200, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=80, nullable=false)
     */
    private $salt;

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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=255, nullable=true)
     */
    private $activationKey;

    /**
     * @var CandidatoPerfil
     *
     * @ORM\Column(name="fk_perfil",nullable=true)
     * @ORM\OneToOne(targetEntity="Imc\Entity\CandidatoPerfil")
     * @ORM\JoinColumn(name="fk_perfil", referencedColumnName="id")
     */
    private $perfil;


    public function __construct($options = [])
    {
        $this->setCreatedat(new \DateTime('now'))
            ->setUpdatedat(new \DateTime('now'))
            ->setSalt(base64_encode(Rand::getBytes(8)));

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
     * @return Candidato
     */
    public function setId(int $id): Candidato
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
     * @return Candidato
     */
    public function setNome(string $nome): Candidato
    {
        $this->nome = $nome;
        return $this;
    }


    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return Candidato
     */
    public function setCpf(string $cpf): Candidato
    {
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $this->setActivationKey(md5(sprintf('%s%s', $cpf, $this->salt)));
        $this->cpf = $cpf;
        return $this;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Candidato
     */
    public function setEmail(string $email): Candidato
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Candidato
     */
    public function setPassword(string $password): Candidato
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     * @return Candidato
     */
    public function setSalt(string $salt): Candidato
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedat(): \DateTime
    {
        return $this->createdat;
    }

    /**
     * @param \DateTime $createdat
     * @return Candidato
     */
    public function setCreatedat(\DateTime $createdat): Candidato
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
     * @return Candidato
     */
    public function setUpdatedat(\DateTime $updatedat): Candidato
    {
        $this->updatedat = $updatedat;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Candidato
     */
    public function setStatus($status = null): Candidato
    {
        $this->status = $status;
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
     * @return Candidato
     */
    public function setActive(bool $active): Candidato
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivationKey(): string
    {
        return $this->activationKey;
    }

    /**
     * @param string $activationKey
     * @return Candidato
     */
    public function setActivationKey(string $activationKey): Candidato
    {
        $this->activationKey = $activationKey;
        return $this;
    }

    /**
     * @return CandidatoPerfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param CandidatoPerfil $perfil
     * @return Candidato
     */
    public function setPerfil($perfil): Candidato
    {
        $this->perfil = $perfil;
        return $this;
    }


    public function toArray()
    {
        $perfil = !is_null($this->getPerfil()) ? $this->getPerfil()->toArray() : [];
        $foreign = [
            'perfil' => $perfil,
        ];
        $hydrator = new ClassMethods();
        $result = $hydrator->extract($this);
        unset($result['password']);
        unset($result['salt']);
        unset($result['activation_key']);
        return array_merge($result, $foreign);
    }

    public function encriptPassword()
    {
        $this->setPassword(password_hash($this->getPassword(), PASSWORD_DEFAULT));
        return $this;
    }
}
