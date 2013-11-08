<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Badge
 *
 * @ORM\Table(name="badge")
 * @ORM\Entity
 */
class Badge
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
     * @ORM\Column(name="desc", type="text")
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255, nullable=true)
     */
    private $image_url;

    /**
     * @var string
     *
     * @ORM\Column(name="criteria", type="text")
     */
    private $criteria;

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
     * @return Badge
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
     * Set desc
     *
     * @param string $desc
     * @return Badge
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    
        return $this;
    }

    /**
     * Get desc
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set image_url
     *
     * @param string $imageUrl
     * @return Badge
     */
    public function setImageUrl($imageUrl)
    {
        $this->image_url = $imageUrl;
    
        return $this;
    }

    /**
     * Get image_url
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Set criteria
     *
     * @param string $criteria
     * @return Badge
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;
    
        return $this;
    }

    /**
     * Get criteria
     *
     * @return string 
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Add badge_assertion
     *
     * @param \Model\BadgeAssertion $badgeAssertion
     * @return Badge
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
