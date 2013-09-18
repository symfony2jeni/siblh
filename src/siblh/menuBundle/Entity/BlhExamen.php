<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhExamen
 */
class BlhExamen
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombreExamen;


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
     * Set nombreExamen
     *
     * @param string $nombreExamen
     * @return BlhExamen
     */
    public function setNombreExamen($nombreExamen)
    {
        $this->nombreExamen = $nombreExamen;
    
        return $this;
    }

    /**
     * Get nombreExamen
     *
     * @return string 
     */
    public function getNombreExamen()
    {
        return $this->nombreExamen;
    }
}
