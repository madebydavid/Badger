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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Model\BadgeAssertion", mappedBy="recipient")
     */
    private $badge_assertion;

    /**
     * @var \Model\User
     *
     * @ORM\ManyToOne(targetEntity="Model\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $created_by;

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
     * Set created
     *
     * @param \DateTime $created
     * @return Recipient
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
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

    /**
     * Set created_by
     *
     * @param \Model\User $createdBy
     * @return Recipient
     */
    public function setCreatedBy(\Model\User $createdBy = null)
    {
        $this->created_by = $createdBy;
    
        return $this;
    }

    /**
     * Get created_by
     *
     * @return \Model\User 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }
}
