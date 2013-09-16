<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoProcesadoSolicitud
 */
class BlhFrascoProcesadoSolicitud
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $volumenDespachado;

    /**
     * @var \siblh\menuBundle\Entity\BlhFrascoProcesado
     */
    private $idFrascoProcesado;

    /**
     * @var \siblh\menuBundle\Entity\BlhSolicitud
     */
    private $idSolicitud;


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
     * Set volumenDespachado
     *
     * @param float $volumenDespachado
     * @return BlhFrascoProcesadoSolicitud
     */
    public function setVolumenDespachado($volumenDespachado)
    {
        $this->volumenDespachado = $volumenDespachado;
    
        return $this;
    }

    /**
     * Get volumenDespachado
     *
     * @return float 
     */
    public function getVolumenDespachado()
    {
        return $this->volumenDespachado;
    }

    /**
     * Set idFrascoProcesado
     *
     * @param \siblh\menuBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhFrascoProcesadoSolicitud
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

    /**
     * Set idSolicitud
     *
     * @param \siblh\menuBundle\Entity\BlhSolicitud $idSolicitud
     * @return BlhFrascoProcesadoSolicitud
     */
    public function setIdSolicitud(\siblh\menuBundle\Entity\BlhSolicitud $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \siblh\menuBundle\Entity\BlhSolicitud 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }
}
