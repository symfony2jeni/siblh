<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisMicrobiologico
 */
class BlhAnalisisMicrobiologico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoAnalisisMicrobiologico;

    /**
     * @var string
     */
    private $coliformesTotales;

    /**
     * @var string
     */
    private $control;

    /**
     * @var string
     */
    private $situacion;

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
     * Set codigoAnalisisMicrobiologico
     *
     * @param string $codigoAnalisisMicrobiologico
     * @return BlhAnalisisMicrobiologico
     */
    public function setCodigoAnalisisMicrobiologico($codigoAnalisisMicrobiologico)
    {
        $this->codigoAnalisisMicrobiologico = $codigoAnalisisMicrobiologico;
    
        return $this;
    }

    /**
     * Get codigoAnalisisMicrobiologico
     *
     * @return string 
     */
    public function getCodigoAnalisisMicrobiologico()
    {
        return $this->codigoAnalisisMicrobiologico;
    }

    /**
     * Set coliformesTotales
     *
     * @param string $coliformesTotales
     * @return BlhAnalisisMicrobiologico
     */
    public function setColiformesTotales($coliformesTotales)
    {
        $this->coliformesTotales = $coliformesTotales;
    
        return $this;
    }

    /**
     * Get coliformesTotales
     *
     * @return string 
     */
    public function getColiformesTotales()
    {
        return $this->coliformesTotales;
    }

    /**
     * Set control
     *
     * @param string $control
     * @return BlhAnalisisMicrobiologico
     */
    public function setControl($control)
    {
        $this->control = $control;
    
        return $this;
    }

    /**
     * Get control
     *
     * @return string 
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set situacion
     *
     * @param string $situacion
     * @return BlhAnalisisMicrobiologico
     */
    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
    
        return $this;
    }

    /**
     * Get situacion
     *
     * @return string 
     */
    public function getSituacion()
    {
        return $this->situacion;
    }

    /**
     * Set idFrascoProcesado
     *
     * @param \siblh\menuBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhAnalisisMicrobiologico
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
