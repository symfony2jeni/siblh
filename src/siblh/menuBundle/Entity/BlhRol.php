<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhRol
 */
class BlhRol
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreRol;

    /**
     * @var string
     */
    private $descripcionRol;


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
     * Set nombreRol
     *
     * @param string $nombreRol
     * @return BlhRol
     */
    public function setNombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;
    
        return $this;
    }

    /**
     * Get nombreRol
     *
     * @return string 
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set descripcionRol
     *
     * @param string $descripcionRol
     * @return BlhRol
     */
    public function setDescripcionRol($descripcionRol)
    {
        $this->descripcionRol = $descripcionRol;
    
        return $this;
    }

    /**
     * Get descripcionRol
     *
     * @return string 
     */
    public function getDescripcionRol()
    {
        return $this->descripcionRol;
    }
}
