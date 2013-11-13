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
     * @var \DateTime
     *
     * @ORM\Column(name="issued_on", type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $issued_on;

    /**
     * @var \Model\Badge
     *
     * @ORM\ManyToOne(targetEntity="Model\Badge", inversedBy="badge_assertion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="badge_id", referencedColumnName="id")
     * })
     */
    private $badge;

    /**
     * @var \Model\Recipient
     *
     * @ORM\ManyToOne(targetEntity="Model\Recipient", inversedBy="badge_assertion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recipient_id", referencedColumnName="id")
     * })
     */
    private $recipient;

    /**
     * @var \Model\User
     *
     * @ORM\ManyToOne(targetEntity="Model\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="issued_by", referencedColumnName="id")
     * })
     */
    private $issued_by;


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

    /**
     * Set issued_by
     *
     * @param \Model\User $issuedBy
     * @return BadgeAssertion
     */
    public function setIssuedBy(\Model\User $issuedBy = null)
    {
        $this->issued_by = $issuedBy;
    
        return $this;
    }

    /**
     * Get issued_by
     *
     * @return \Model\User 
     */
    public function getIssuedBy()
    {
        return $this->issued_by;
    }
}
