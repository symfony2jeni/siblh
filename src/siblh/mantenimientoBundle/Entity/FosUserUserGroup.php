<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosUserUserGroup
 *
 * @ORM\Table(name="fos_user_user_group")
 * @ORM\Entity
 */
class FosUserUserGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="fos_user_user_group_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \FosUserGroup
     *
     * @ORM\ManyToOne(targetEntity="FosUserGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \FosUserUser
     *
     * @ORM\ManyToOne(targetEntity="FosUserUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
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
     * @param \siblh\mantenimientoBundle\Entity\FosUserGroup $user
     * @return FosUserUserGroup
     */
    public function setUser(\siblh\mantenimientoBundle\Entity\FosUserGroup $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \siblh\mantenimientoBundle\Entity\FosUserGroup 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set group
     *
     * @param \siblh\mantenimientoBundle\Entity\FosUserUser $group
     * @return FosUserUserGroup
     */
    public function setGroup(\siblh\mantenimientoBundle\Entity\FosUserUser $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \siblh\mantenimientoBundle\Entity\FosUserUser 
     */
    public function getGroup()
    {
        return $this->group;
    }
}