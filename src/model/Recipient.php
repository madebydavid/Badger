<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recipient
 *
 * @ORM\Table(name="recipient")
 * @ORM\Entity
 */
class Recipient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Model\Badge", mappedBy="badge_assertion")
     */
    private $badges;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badges = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Recipient
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Recipient
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add badges
     *
     * @param \Model\Badge $badges
     * @return Recipient
     */
    public function addBadge(\Model\Badge $badges)
    {
        $this->badges[] = $badges;
    
        return $this;
    }

    /**
     * Remove badges
     *
     * @param \Model\Badge $badges
     */
    public function removeBadge(\Model\Badge $badges)
    {
        $this->badges->removeElement($badges);
    }

    /**
     * Get badges
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadges()
    {
        return $this->badges;
    }
}