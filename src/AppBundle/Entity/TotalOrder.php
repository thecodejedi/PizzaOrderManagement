<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Customer
 * @ORM\Entity
 * @ORM\Table(name="TotalOrder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TotalOrderRepository")
 */
class TotalOrder {

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
     *
     * @ORM\Column(name="the_date", type="date")
     * @var \DateTime
     */
    protected $date;

    /**
     * @ORM\Column(type="boolean", nullable = false)
     * @Assert\Valid
     * @Assert\NotBlank(message = "Activity has to be set.")
     */
    protected $active;

    /**
     * @ORM\OneToMany(targetEntity="SingleOrder", mappedBy="order")
     */
    protected $orders;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Slot
     */
    public function setText($text) {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add order
     *
     * @param \AppBundle\Entity\SingleOrder $order
     *
     * @return TotalOrder
     */
    public function addOrder(\AppBundle\Entity\SingleOrder $order) {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \AppBundle\Entity\SingleOrder $order
     */
    public function removeOrder(\AppBundle\Entity\SingleOrder $order) {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders() {
        return $this->orders;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return TotalOrder
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive() {
        return $this->active;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return TotalOrder
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
