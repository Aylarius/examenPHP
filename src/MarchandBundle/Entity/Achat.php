<?php

namespace MarchandBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achat
 */
class Achat
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $client;

    /**
     * @var string
     */
    private $fruit;

    /**
     * @var int
     */
    private $quantite;

    /**
     * @var string
     */
    private $total;


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
     * Set client
     *
     * @param string $client
     * @return Achat
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set fruit
     *
     * @param string $fruit
     * @return Achat
     */
    public function setFruit($fruit)
    {
        $this->fruit = $fruit;

        return $this;
    }

    /**
     * Get fruit
     *
     * @return string 
     */
    public function getFruit()
    {
        return $this->fruit;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Achat
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return Achat
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add client
     *
     * @param \FlyBundle\Entity\User $client
     *
     * @return Achat
     */
    public function addClient(\FlyBundle\Entity\User $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \FlyBundle\Entity\User $client
     */
    public function removeClient(\FlyBundle\Entity\User $client)
    {
        $this->client->removeElement($client);
    }
}
