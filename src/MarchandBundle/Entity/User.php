<?php

namespace MarchandBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
    }
}

