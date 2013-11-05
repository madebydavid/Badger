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
     * @ORM\Column(name="issued_on", type="datetime")
     */
    private $issued_on;


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
}
