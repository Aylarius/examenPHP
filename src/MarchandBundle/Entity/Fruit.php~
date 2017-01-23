<?php

namespace MarchandBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fruit
 */
class Fruit
{

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var int
     */
    private $prix;

    /**
     * @var int
     */
    private $quantite;


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
     * Set nom
     *
     * @param string $nom
     * @return Fruit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * Set prix
     *
     * @param integer $prix
     * @return Fruit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Fruit
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
     * @var string
     */
    private $achats;


    /**
     * Set achats
     *
     * @param string $achats
     *
     * @return Fruit
     */
    public function setAchats($achats)
    {
        $this->achats = $achats;

        return $this;
    }

    /**
     * Get achats
     *
     * @return string
     */
    public function getAchats()
    {
        return $this->achats;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->achats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add achat
     *
     * @param \MarchandBundle\Entity\Achat $achat
     *
     * @return Fruit
     */
    public function addAchat(\MarchandBundle\Entity\Achat $achat)
    {
        $this->achats[] = $achat;

        return $this;
    }

    /**
     * Remove achat
     *
     * @param \MarchandBundle\Entity\Achat $achat
     */
    public function removeAchat(\MarchandBundle\Entity\Achat $achat)
    {
        $this->achats->removeElement($achat);
    }


}
