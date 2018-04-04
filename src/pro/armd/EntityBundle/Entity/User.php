<?php

namespace pro\armd\EntityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Persisters\Collection\CollectionPersister;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="pro\armd\EntityBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", length=10, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=100)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reg_date", type="datetime")
     */
    private $regDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_visit", type="datetime")
     */
    private $lastVisit;

    /**
     * @var UserAbout[]|ArrayCollection|CollectionPersister
     *
     * @ORM\OneToMany(targetEntity="UserAbout", mappedBy="user", cascade={"persist", "remove"})
     */
    private $abouts;


    public function __construct()
    {
        $this->abouts = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role.
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set regDate.
     *
     * @param \DateTime $regDate
     *
     * @return User
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate.
     *
     * @return \DateTime
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set lastVisit.
     *
     * @param \DateTime $lastVisit
     *
     * @return User
     */
    public function setLastVisit($lastVisit)
    {
        $this->lastVisit = $lastVisit;

        return $this;
    }

    /**
     * Get lastVisit.
     *
     * @return \DateTime
     */
    public function getLastVisit()
    {
        return $this->lastVisit;
    }

    /**
     * @return UserAbout[]|ArrayCollection|CollectionPersister
     */
    public function getAbouts()
    {
        return $this->abouts;
    }

    /**
     * @param ArrayCollection $abouts
     */
    public function setAbouts(ArrayCollection $abouts)
    {
        $this->abouts = $abouts;
    }
}
