<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhOpcionMenu
 */
class BlhOpcionMenu
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    public $nombreOpcion;

    /**
     * @var \siblh\menuBundle\Entity\BlhMenu
     */
    private $idMenu;


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
     * Set nombreOpcion
     *
     * @param string $nombreOpcion
     * @return BlhOpcionMenu
     */
    public function setNombreOpcion($nombreOpcion)
    {
        $this->nombreOpcion = $nombreOpcion;
    
        return $this;
    }

    /**
     * Get nombreOpcion
     *
     * @return string 
     */
    public function getNombreOpcion()
    {
        return $this->nombreOpcion;
    }

    /**
     * Set idMenu
     *
     * @param \siblh\menuBundle\Entity\BlhMenu $idMenu
     * @return BlhOpcionMenu
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
}
