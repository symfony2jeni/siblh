<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlDepartamento
 */
class CtlDepartamento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $codigoCnr;

    /**
     * @var string
     */
    private $abreviatura;


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
     * Set nombre
     *
     * @param string $nombre
     * @return CtlDepartamento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigoCnr
     *
     * @param string $codigoCnr
     * @return CtlDepartamento
     */
    public function setCodigoCnr($codigoCnr)
    {
        $this->codigoCnr = $codigoCnr;
    
        return $this;
    }

    /**
     * Get codigoCnr
     *
     * @return string 
     */
    public function getCodigoCnr()
    {
        return $this->codigoCnr;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return CtlDepartamento
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
}
