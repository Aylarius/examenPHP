<?php

namespace MarchandBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * User
 */
class User extends BaseUser
{

    public function __toString()
    {
        return $this->username;
    }

    /**
     * @var integer
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
    }

    private $achats;

    /**
     * Set achats
     *
     * @param string $achats
     *
     * @return User
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
     * Add achat
     *
     * @param \MarchandBundle\Entity\Achat $achat
     *
     * @return User
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
