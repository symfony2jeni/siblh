<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoRecolectadoFrascoP
 */
class BlhFrascoRecolectadoFrascoP
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $volumenAgregado;

    /**
     * @var \siblh\menuBundle\Entity\BlhFrascoRecolectado
     */
    private $idFrascoRecolectado;

    /**
     * @var \siblh\menuBundle\Entity\BlhFrascoProcesado
     */
    private $idFrascoProcesado;


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
     * Set volumenAgregado
     *
     * @param float $volumenAgregado
     * @return BlhFrascoRecolectadoFrascoP
     */
    public function setVolumenAgregado($volumenAgregado)
    {
        $this->volumenAgregado = $volumenAgregado;
    
        return $this;
    }

    /**
     * Get volumenAgregado
     *
     * @return float 
     */
    public function getVolumenAgregado()
    {
        return $this->volumenAgregado;
    }

    /**
     * Set idFrascoRecolectado
     *
     * @param \siblh\menuBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado
     * @return BlhFrascoRecolectadoFrascoP
     */
    public function setIdFrascoRecolectado(\siblh\menuBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado = null)
    {
        $this->idFrascoRecolectado = $idFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get idFrascoRecolectado
     *
     * @return \siblh\menuBundle\Entity\BlhFrascoRecolectado 
     */
    public function getIdFrascoRecolectado()
    {
        return $this->idFrascoRecolectado;
    }

    /**
     * Set idFrascoProcesado
     *
     * @param \siblh\menuBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhFrascoRecolectadoFrascoP
     */
    public function setIdFrascoProcesado(\siblh\menuBundle\Entity\BlhFrascoProcesado $idFrascoProcesado = null)
    {
        $this->idFrascoProcesado = $idFrascoProcesado;
    
        return $this;
    }

    /**
     * Get idFrascoProcesado
     *
     * @return \siblh\menuBundle\Entity\BlhFrascoProcesado 
     */
    public function getIdFrascoProcesado()
    {
        return $this->idFrascoProcesado;
    }
}
