<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUserUserGroup
 */
class FosUserUserGroup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \siblh\menuBundle\Entity\FosUserGroup
     */
    private $user;

    /**
     * @var \siblh\menuBundle\Entity\FosUserUser
     */
    private $group;


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
     * Set user
     *
     * @param \siblh\menuBundle\Entity\FosUserGroup $user
     * @return FosUserUserGroup
     */
    public function setUser(\siblh\menuBundle\Entity\FosUserGroup $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \siblh\menuBundle\Entity\FosUserGroup 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set group
     *
     * @param \siblh\menuBundle\Entity\FosUserUser $group
     * @return FosUserUserGroup
     */
    public function setGroup(\siblh\menuBundle\Entity\FosUserUser $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \siblh\menuBundle\Entity\FosUserUser 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
