<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * BadgeAssertion
 *
 * @ORM\Table(name="badge_assertion")
 * @ORM\Entity
 */
class BadgeAssertion
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
     * @var integer
     *
     * @ORM\Column(name="badge_id", type="integer")
     */
    private $badge_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="recipient_id", type="integer")
     */
    private $recipient_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="issued_on", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $issued_on;

    /**
     * @var \Model\Badge
     *
     * @ORM\OneToOne(targetEntity="Model\Badge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="badge_id", referencedColumnName="id", unique=true)
     * })
     */
    private $badge;

    /**
     * @var \Model\Recipient
     *
     * @ORM\OneToOne(targetEntity="Model\Recipient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recipient_id", referencedColumnName="id", unique=true)
     * })
     */
    private $recipient;


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
     * Set badge_id
     *
     * @param integer $badgeId
     * @return BadgeAssertion
     */
    public function setBadgeId($badgeId)
    {
        $this->badge_id = $badgeId;
    
        return $this;
    }

    /**
     * Get badge_id
     *
     * @return integer 
     */
    public function getBadgeId()
    {
        return $this->badge_id;
    }

    /**
     * Set recipient_id
     *
     * @param integer $recipientId
     * @return BadgeAssertion
     */
    public function setRecipientId($recipientId)
    {
        $this->recipient_id = $recipientId;
    
        return $this;
    }

    /**
     * Get recipient_id
     *
     * @return integer 
     */
    public function getRecipientId()
    {
        return $this->recipient_id;
    }

    /**
     * Set issued_on
     *
     * @param \DateTime $issuedOn
     * @return BadgeAssertion
     */
    public function setIssuedOn($issuedOn)
    {
        $this->issued_on = $issuedOn;
    
        return $this;
    }

    /**
     * Get issued_on
     *
     * @return \DateTime 
     */
    public function getIssuedOn()
    {
        return $this->issued_on;
    }

    /**
     * Set badge
     *
     * @param \Model\Badge $badge
     * @return BadgeAssertion
     */
    public function setBadge(\Model\Badge $badge = null)
    {
        $this->badge = $badge;
    
        return $this;
    }

    /**
     * Get badge
     *
     * @return \Model\Badge 
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Set recipient
     *
     * @param \Model\Recipient $recipient
     * @return BadgeAssertion
     */
    public function setRecipient(\Model\Recipient $recipient = null)
    {
        $this->recipient = $recipient;
    
        return $this;
    }

    /**
     * Get recipient
     *
     * @return \Model\Recipient 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }
}
