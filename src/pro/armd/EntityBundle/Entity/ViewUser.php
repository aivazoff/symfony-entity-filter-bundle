<?php

namespace pro\armd\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViewUser
 *
 * @ORM\Table(name="view_users")
 * @ORM\Entity(repositoryClass="pro\armd\EntityBundle\Repository\ViewUserRepository")
 */
class ViewUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
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
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=250)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=250)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=250)
     */
    private $state;


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
     * @return ViewUser
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
     * @return ViewUser
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
     * @return ViewUser
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
     * @return ViewUser
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
     * @return ViewUser
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
     * Set country.
     *
     * @param string $country
     *
     * @return ViewUser
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set firstName.
     *
     * @param string $firstName
     *
     * @return ViewUser
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return ViewUser
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
