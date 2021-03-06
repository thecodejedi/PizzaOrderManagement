<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Customer
 * @ORM\Entity
 * @ORM\Table(name="Product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Valid
     * @Assert\NotNull
     */
    protected $name;
    
    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    protected $price;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $active;
    
    /**
     * @ORM\OneToMany(targetEntity="SingleOrder", mappedBy="product")
     */
    protected $orders;

    /**
     * @ORM\ManyToOne(targetEntity="ProductGroup", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="productGroup_id", referencedColumnName="id")
     */
    protected $group;
    
    /**
     * Constructor
     */	
    public function __construct($name = null, $price = 0,$group = null)
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
		$this->price = $price;
		$this->name = $name;
		$this->active = true;
                $this->group = $group;
    }
    
    public function getDisplayName(){
        return $this->getName().' - '.$this->getPrice().'€';
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
     *
     * @return Product
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
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add order
     *
     * @param \AppBundle\Entity\SingleOrder $order
     *
     * @return Product
     */
    public function addOrder(\AppBundle\Entity\SingleOrder $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \AppBundle\Entity\SingleOrder $order
     */
    public function removeOrder(\AppBundle\Entity\SingleOrder $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Product
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\ProductGroup $group
     *
     * @return Product
     */
    public function setGroup(\AppBundle\Entity\ProductGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\ProductGroup
     */
    public function getGroup()
    {
        return $this->group;
    }
}
