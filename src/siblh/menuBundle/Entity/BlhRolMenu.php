<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhRolMenu
 */
class BlhRolMenu
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \siblh\menuBundle\Entity\BlhMenu
     */
    private $idMenu;

    /**
     * @var \siblh\menuBundle\Entity\BlhRol
     */
    private $idRol;


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
     * Set idMenu
     *
     * @param \siblh\menuBundle\Entity\BlhMenu $idMenu
     * @return BlhRolMenu
     */
    public function setIdMenu(\siblh\menuBundle\Entity\BlhMenu $idMenu = null)
    {
        $this->idMenu = $idMenu;
    
        return $this;
    }

    /**
     * Get idMenu
     *
     * @return \siblh\menuBundle\Entity\BlhMenu 
     */
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    /**
     * Set idRol
     *
     * @param \siblh\menuBundle\Entity\BlhRol $idRol
     * @return BlhRolMenu
     */
    public function setIdRol(\siblh\menuBundle\Entity\BlhRol $idRol = null)
    {
        $this->idRol = $idRol;
    
        return $this;
    }

    /**
     * Get idRol
     *
     * @return \siblh\menuBundle\Entity\BlhRol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}
