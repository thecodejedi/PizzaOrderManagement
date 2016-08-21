<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Customer
 * @ORM\Entity
 * @ORM\Table(name="SingleOrder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SingleOrderRepository")
 */
class SingleOrder {
    
    function __construct() {
       $payed = false;
    }
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text", nullable = true)
     */
    protected $text;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Valid
     * @Assert\NotNull
     */
    protected $name;
    
    /**
     * @ORM\Column(type="boolean", nullable=false)
     * @Assert\Valid
     * @Assert\NotNull
     */
    protected $payed;
    
    /**
     * @ORM\ManyToOne(targetEntity="TotalOrder", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(name="totalOrder_id", referencedColumnName="id")
     */
    protected $order;
    
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(name="singleOrder_id", referencedColumnName="id")
     */
    protected $product;

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
     * Set text
     *
     * @param string $text
     *
     * @return Slot
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set order
     *
     * @param \AppBundle\Entity\TotalOrder $order
     *
     * @return SingleOrder
     */
    public function setOrder(\AppBundle\Entity\TotalOrder $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \AppBundle\Entity\TotalOrder
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SingleOrder
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
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return SingleOrder
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set payed
     *
     * @param boolean $payed
     *
     * @return SingleOrder
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * Get payed
     *
     * @return boolean
     */
    public function getPayed()
    {
        return $this->payed;
    }
}
