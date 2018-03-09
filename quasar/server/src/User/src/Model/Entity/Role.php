<?php

namespace User\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserRole
 *
 * @ORM\Table(name="mv_user_role", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="mv_users_role_name_UNIQUE", columns={"name"})
 * })
 * @ORM\Entity(repositoryClass="User\Model\Repository\UserRoleRepository")
 */
class Role extends AbstractEntity
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
   * @ORM\Column(name="name", type="string", length=45, nullable=false)
   */
    private $name = '';

  /**
   * @return int
   */
    public function getId(): int
    {
        return $this->id;
    }

  /**
   * @param int $id
   * @return Role
   */
    public function setId(int $id): Role
    {
        $this->id = $id;
        return $this;
    }

  /**
   * @return string
   */
    public function getName(): string
    {
        return $this->name;
    }

  /**
   * @param string $name
   * @return Role
   */
    public function setName(string $name=''): Role
    {
        $this->name = $name;
        return $this;
    }
}
