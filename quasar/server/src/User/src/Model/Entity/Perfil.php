<?php

namespace User\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="mv_user_perfil", indexes={@ORM\Index(name="fk_users_perfil_avatar", columns={"avatar"})})
 * @ORM\Entity(repositoryClass="User\Model\Repository\UserPerfilRepository")
 */
class Perfil extends AbstractEntity
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
   * @ORM\Column(name="name", type="string", length=200, nullable=false)
   */
    private $name;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="birthday", type="datetime", nullable=true)
   */
    private $birthday;

  /**
   * @var string
   *
   * @ORM\Column(name="birth_place", type="string", length=50, nullable=true)
   */
    private $birthPlace;

  /**
   * @var string
   *
   * @ORM\Column(name="nationality", type="string", length=50, nullable=true)
   */
    private $nationality;

  /**
   * @var string
   *
   * @ORM\Column(name="address_number", type="string", length=20, nullable=true)
   */
    private $addressNumber;

  /**
   * @var string
   *
   * @ORM\Column(name="address_street", type="string", length=100, nullable=true)
   */
    private $addressStreet;

  /**
   * @var string
   *
   * @ORM\Column(name="address_district", type="string", length=100, nullable=true)
   */
    private $addressDistrict;

  /**
   * @var string
   *
   * @ORM\Column(name="city", type="string", length=50, nullable=true)
   */
    private $city;

  /**
   * @var string
   *
   * @ORM\Column(name="state", type="string", length=50, nullable=true)
   */
    private $state;

  /**
   * @var string
   *
   * @ORM\Column(name="country", type="string", length=50, nullable=true)
   */
    private $country;

  /**
   * @var string
   *
   * @ORM\Column(name="sociallinks", type="text", length=65535, nullable=true)
   */
    private $sociallinks;


    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_personal", type="string", length=12, nullable=true)
     */
    private $contactPhonePersonal;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_home", type="string", length=12, nullable=true)
     */
    private $contactPhoneHome;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_work", type="string", length=12, nullable=true)
     */
    private $contactPhoneWork;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=12, nullable=true)
     */
    private $postalCode;

  /**
   * @var \Midia\Model\Entity\Image
   *
   * @ORM\Column(nullable=true)
   * @ORM\ManyToOne(targetEntity="Midia\Entity\Image")
   * @ORM\JoinColumns({
   *   @ORM\JoinColumn(name="avatar", referencedColumnName="id")
   * })
   */
    private $avatar;

  /**
   * @return int
   */
    public function getId()
    {
        return $this->id;
    }

  /**
   * @param int $id
   * @return Perfil
   */
    public function setId(int $id): Perfil
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
   * @return Perfil
   */
    public function setName(string $name): Perfil
    {
        $this->name = $name;
        return $this;
    }

  /**
   * @return \DateTime
   */
    public function getBirthday()
    {
        return $this->birthday;
    }

  /**
   * @param \DateTime $birthday
   * @return Perfil
   */
    public function setBirthday(\DateTime $birthday): Perfil
    {
        $this->birthday = $birthday;
        return $this;
    }

  /**
   * @return string
   */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

  /**
   * @param string $birthPlace
   * @return Perfil
   */
    public function setBirthPlace(string $birthPlace): Perfil
    {
        $this->birthPlace = $birthPlace;
        return $this;
    }

  /**
   * @return string
   */
    public function getNationality()
    {
        return $this->nationality;
    }

  /**
   * @param string $nationality
   * @return Perfil
   */
    public function setNationality(string $nationality): Perfil
    {
        $this->nationality = $nationality;
        return $this;
    }

  /**
   * @return string
   */
    public function getAddressNumber()
    {
        return $this->addressNumber;
    }

  /**
   * @param string $addressNumber
   * @return Perfil
   */
    public function setAddressNumber(string $addressNumber): Perfil
    {
        $this->addressNumber = $addressNumber;
        return $this;
    }

  /**
   * @return string
   */
    public function getAddressStreet()
    {
        return $this->addressStreet;
    }

  /**
   * @param string $addressStreet
   * @return Perfil
   */
    public function setAddressStreet(string $addressStreet): Perfil
    {
        $this->addressStreet = $addressStreet;
        return $this;
    }

  /**
   * @return string
   */
    public function getAddressDistrict()
    {
        return $this->addressDistrict;
    }

  /**
   * @param string $addressDistrict
   * @return Perfil
   */
    public function setAddressDistrict(string $addressDistrict): Perfil
    {
        $this->addressDistrict = $addressDistrict;
        return $this;
    }


  /**
   * @return string
   */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

  /**
   * @param string $postalCode
   * @return Perfil
   */
    public function setPostalCode(string $postalCode): Perfil
    {
        $this->postalCode = $postalCode;
        return $this;
    }

  /**
   * @return string
   */
    public function getCity()
    {
        return $this->city;
    }

  /**
   * @param string $city
   * @return Perfil
   */
    public function setCity(string $city): Perfil
    {
        $this->city = $city;
        return $this;
    }

  /**
   * @return string
   */
    public function getState()
    {
        return $this->state;
    }

  /**
   * @param string $state
   * @return Perfil
   */
    public function setState(string $state): Perfil
    {
        $this->state = $state;
        return $this;
    }

  /**
   * @return string
   */
    public function getCountry()
    {
        return $this->country;
    }

  /**
   * @param string $country
   * @return Perfil
   */
    public function setCountry(string $country): Perfil
    {
        $this->country = $country;
        return $this;
    }

  /**
   * @return string
   */
    public function getSociallinks()
    {
        return $this->sociallinks;
    }

  /**
   * @param string $sociallinks
   * @return Perfil
   */
    public function setSociallinks(string $sociallinks): Perfil
    {
        $this->sociallinks = $sociallinks;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhonePersonal()
    {
        return $this->contactPhonePersonal;
    }

    /**
     * @param string $phonePersonal
     * @return Perfil
     */
    public function setContactPhonePersonal(string $phonePersonal): Perfil
    {
        $this->contactPhonePersonal = $phonePersonal;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhoneHome()
    {
        return $this->contactPhoneHome;
    }

    /**
     * @param string $phoneHome
     * @return Perfil
     */
    public function setContactPhoneHome(string $phoneHome): Perfil
    {
        $this->contactPhoneHome = $phoneHome;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactPhoneWork()
    {
        return $this->contactPhoneWork;
    }

    /**
     * @param string $phoneWork
     * @return Perfil
     */
    public function setContactPhoneWork(string $phoneWork): Perfil
    {
        $this->contactPhoneWork = $phoneWork;
        return $this;
    }

  /**
   * @return \Midia\Model\Entity\Image
   */
    public function getAvatar()
    {
        return $this->avatar;
    }

  /**
   * @param \Midia\Model\Entity\Image $avatar
   * @return Perfil
   */
    public function setAvatar(\Midia\Model\Entity\Image $avatar=null): Perfil
    {
        $this->avatar = $avatar;
        return $this;
    }
}
