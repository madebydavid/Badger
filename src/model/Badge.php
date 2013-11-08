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
     * @ORM\ManyToMany(targetEntity="Model\Recipient")
     * @ORM\JoinTable(name="badge_assertion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="badge_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="recipient_id", referencedColumnName="id")
     *   }
     * )
     */
    private $recipients;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recipients = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add recipients
     *
     * @param \Model\Recipient $recipients
     * @return Badge
     */
    public function addRecipient(\Model\Recipient $recipients)
    {
        $this->recipients[] = $recipients;
    
        return $this;
    }

    /**
     * Remove recipients
     *
     * @param \Model\Recipient $recipients
     */
    public function removeRecipient(\Model\Recipient $recipients)
    {
        $this->recipients->removeElement($recipients);
    }

    /**
     * Get recipients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecipients()
    {
        return $this->recipients;
    }
}
