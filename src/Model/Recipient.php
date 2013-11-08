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
     * @ORM\OneToMany(targetEntity="Model\BadgeAssertion", mappedBy="badge_assertion")
     */
    private $badge_assertion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badge_assertion = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add badge_assertion
     *
     * @param \Model\BadgeAssertion $badgeAssertion
     * @return Recipient
     */
    public function addBadgeAssertion(\Model\BadgeAssertion $badgeAssertion)
    {
        $this->badge_assertion[] = $badgeAssertion;
    
        return $this;
    }

    /**
     * Remove badge_assertion
     *
     * @param \Model\BadgeAssertion $badgeAssertion
     */
    public function removeBadgeAssertion(\Model\BadgeAssertion $badgeAssertion)
    {
        $this->badge_assertion->removeElement($badgeAssertion);
    }

    /**
     * Get badge_assertion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadgeAssertion()
    {
        return $this->badge_assertion;
    }
}
