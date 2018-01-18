<?php

namespace User\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
use Zend\Math\Rand;

/**
 * User
 *
 * @ORM\Table(
 *  name="mv_user",
 *  uniqueConstraints={
 *    @ORM\UniqueConstraint(name="credential_UNIQUE", columns={"credential"})
 *  },
 *  indexes={
 *    @ORM\Index(name="fk_users_user_perfil", columns={"fk_perfil"}),
 *    @ORM\Index(name="fk_users_user_role", columns={"fk_role"})
 *  }
 * )
 * @ORM\Entity(repositoryClass="User\Repository\UserRepository")
 */
class User extends AbstractEntity
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
     * @ORM\Column(name="credential", type="string", length=255, nullable=false)
     */
    private $credential;

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
     * @var Perfil
     *
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_perfil", referencedColumnName="id")
     * })
     */
    private $perfil;

    /**
     * @var Role
     *
     * @ORM\Column(name="fk_role", nullable=true)
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_role", referencedColumnName="id")
     * })
     */
    private $role;

    public function __construct($options = [])
    {
        $this->setCreatedat(new \DateTime('now'))
            ->setUpdatedat(new \DateTime('now'))
            ->setSalt(base64_encode(Rand::getBytes(8)))
            ->setActivationKey(md5(sprintf('%s%s', $this->credential, $this->salt)));

        if (isset($options['perfil'])) {
            $options['perfil'] = (is_array($options['perfil'])) ? new Perfil($options['perfil']) : null;
        }
        parent::__construct($options);
    }

    public function hydratorFilters($property)
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param string $credential
     * @return User
     */
    public function setCredential(string $credential): User
    {
        $this->credential = $credential;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     * @return User
     */
    public function setSalt(string $salt): User
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * @param \DateTime $createdat
     * @return User
     */
    public function setCreatedat(\DateTime $createdat): User
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
     * @return User
     */
    public function setUpdatedat(\DateTime $updatedat): User
    {
        $this->updatedat = $updatedat;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return User
     */
    public function setStatus(string $status = null): User
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
     * @return User
     */
    public function setActive(bool $active): User
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
     * @return User
     */
    public function setActivationKey(string $activationKey): User
    {
        $this->activationKey = $activationKey;
        return $this;
    }

    /**
     * @return Perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param Perfil $perfil
     * @return User
     */
    public function setPerfil(Perfil $perfil): User
    {
        $this->perfil = $perfil;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return User
     */
    public function setRole($role): User
    {
        $this->role = $role;
        return $this;
    }

    public function toArray()
    {
        $perfil = !is_null($this->getPerfil()) ? $this->getPerfil()->toArray() : [];
        $role = !is_null($this->getrole()) ? $this->getRole()->toArray() : [];
        $foreign = [
            'perfil' => $perfil,
            'role' => $role
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
