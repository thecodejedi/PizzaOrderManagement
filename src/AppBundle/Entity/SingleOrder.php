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
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="TotalOrder", inversedBy="orders", cascade={"persist"})
     * @ORM\JoinColumn(name="totalOrder_id", referencedColumnName="id")
     */
    protected $order;

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
}
