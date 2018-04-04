<?php

namespace pro\armd\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAbout
 *
 * @ORM\Table(name="users_about")
 * @ORM\Entity(repositoryClass="pro\armd\EntityBundle\Repository\UserAboutRepository")
 */
class UserAbout
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="abouts")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="item", type="string", length=10, columnDefinition="enum('country','firstname','state')")
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=250)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime")
     */
    private $upDate;


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
     * Set user.
     *
     * @param User $user
     *
     * @return UserAbout
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set item.
     *
     * @param string $item
     *
     * @return UserAbout
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item.
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return UserAbout
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set upDate.
     *
     * @param \DateTime $upDate
     *
     * @return UserAbout
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;

        return $this;
    }

    /**
     * Get upDate.
     *
     * @return \DateTime
     */
    public function getUpDate()
    {
        return $this->upDate;
    }
}
