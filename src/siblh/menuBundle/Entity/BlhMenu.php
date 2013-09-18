<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhMenu
 */
class BlhMenu
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $nombreMenu;

    /**
     * @var string
     */
    private $descripcionMenu;


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
     * Set nombreMenu
     *
     * @param string $nombreMenu
     * @return BlhMenu
     */
    public function setNombreMenu($nombreMenu)
    {
        $this->nombreMenu = $nombreMenu;
    
        return $this;
    }

    /**
     * Get nombreMenu
     *
     * @return string 
     */
    public function getNombreMenu()
    {
        return $this->nombreMenu;
    }

    /**
     * Set descripcionMenu
     *
     * @param string $descripcionMenu
     * @return BlhMenu
     */
    public function setDescripcionMenu($descripcionMenu)
    {
        $this->descripcionMenu = $descripcionMenu;
    
        return $this;
    }

    /**
     * Get descripcionMenu
     *
     * @return string 
     */
    public function getDescripcionMenu()
    {
        return $this->descripcionMenu;
    }
}
