<?php

namespace User\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Math\Rand;

/**
 * User
 *
 * @ORM\Table(
 *  name="mv_user",
 *  uniqueConstraints={
 *    @ORM\UniqueConstraint(name="credential_UNIQUE", columns={"credential"}),
 *    @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})
 *  },
 *  indexes={
 *    @ORM\Index(name="fk_users_user_perfil", columns={"fk_perfil"}),
 *    @ORM\Index(name="fk_users_user_role", columns={"fk_role"})
 *  }
 * )
 * @ORM\Entity(repositoryClass="User\Model\Repository\UserRepository")
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
    private $id = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="identity", type="string", length=80, nullable=false)
     */
    private $identity;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="credential", type="string", length=255, nullable=false)
     */
    private $credential;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=80, nullable=true)
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
    private $active = false;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_key", type="string", length=255, nullable=true)
     */
    private $activationKey;

    /**
     * @var Perfil
     *
     * @ORM\Column(name="fk_perfil", nullable=true, type="integer")
     * @ORM\OneToOne(targetEntity="Perfil")
     * @ORM\JoinColumn(name="fk_perfil", referencedColumnName="id")
     *
     */
    private $perfil = null;

    /**
     * @var Role
     *
     * @ORM\Column(name="fk_role", nullable=true, type="integer")
     * @ORM\OneToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="fk_role", referencedColumnName="id")
     */
    private $role = null;

    protected $__protectedProperties = [
        'credential',
        'salt',
        'activation_key',
    ];

    public function __construct($options = [])
    {
        $this->perfil = new Perfil();
        $this->role = new Role();
        $this->setCreatedat(new \DateTime('now'))
            ->setUpdatedat(new \DateTime('now'))
            ->setSalt($this->generateSalt())
            ->setActivationKey($this->generateActivationKey());

        if (isset($options['perfil'])) {
            $options['perfil'] = (is_array($options['perfil'])) ? new Perfil($options['perfil']) : null;
        }
        parent::__construct($options);
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
    public function setId($id): User
    {
        if (is_string($id)) {
            $id = (int)$id;
        }
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     * @return User
     */
    public function setIdentity($identity): User
    {
        $this->identity = $identity;
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
    public function setEmail($email): User
    {
        $this->email = $email;
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
    public function setCredential($credential): User
    {
        $this->credential = $credential;
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
    public function setSalt($salt): User
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
    public function getStatus()
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
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     * @return User
     */
    public function setActive($active): User
    {
        if(is_int($active)){
            $active = (bool)$active;
        }
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getActivationKey()
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
     * @param Perfil|int $perfil
     * @return User
     */
    public function setPerfil($perfil = null): User
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
     * @param Role|int $role
     * @return User
     */
    public function setRole($role = 0): User
    {
        $this->role = $role;
        return $this;
    }

    public function encriptPassword()
    {
        $this->setCredential(password_hash($this->getCredential(), PASSWORD_DEFAULT));
        return $this;
    }

    public function generateSalt()
    {
        return base64_encode(Rand::getBytes(8));
    }

    public function generateActivationKey(){
        return md5(sprintf('%s%s', $this->credential, $this->salt));
    }
}
