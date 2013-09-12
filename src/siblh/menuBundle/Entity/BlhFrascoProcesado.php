<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoProcesado
 */
class BlhFrascoProcesado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoFrascoProcesado;

    /**
     * @var float
     */
    private $volumenFrascoPasteurizado;

    /**
     * @var float
     */
    private $acidezTotal;

    /**
     * @var float
     */
    private $kcaloriasTotales;

    /**
     * @var string
     */
    private $observacionFrascoProcesado;

    /**
     * @var \siblh\menuBundle\Entity\BlhEstado
     */
    private $idEstado;

    /**
     * @var \siblh\menuBundle\Entity\BlhPasteurizacion
     */
    private $idPasteurizacion;


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
     * Set codigoFrascoProcesado
     *
     * @param string $codigoFrascoProcesado
     * @return BlhFrascoProcesado
     */
    public function setCodigoFrascoProcesado($codigoFrascoProcesado)
    {
        $this->codigoFrascoProcesado = $codigoFrascoProcesado;
    
        return $this;
    }

    /**
     * Get codigoFrascoProcesado
     *
     * @return string 
     */
    public function getCodigoFrascoProcesado()
    {
        return $this->codigoFrascoProcesado;
    }

    /**
     * Set volumenFrascoPasteurizado
     *
     * @param float $volumenFrascoPasteurizado
     * @return BlhFrascoProcesado
     */
    public function setVolumenFrascoPasteurizado($volumenFrascoPasteurizado)
    {
        $this->volumenFrascoPasteurizado = $volumenFrascoPasteurizado;
    
        return $this;
    }

    /**
     * Get volumenFrascoPasteurizado
     *
     * @return float 
     */
    public function getVolumenFrascoPasteurizado()
    {
        return $this->volumenFrascoPasteurizado;
    }

    /**
     * Set acidezTotal
     *
     * @param float $acidezTotal
     * @return BlhFrascoProcesado
     */
    public function setAcidezTotal($acidezTotal)
    {
        $this->acidezTotal = $acidezTotal;
    
        return $this;
    }

    /**
     * Get acidezTotal
     *
     * @return float 
     */
    public function getAcidezTotal()
    {
        return $this->acidezTotal;
    }

    /**
     * Set kcaloriasTotales
     *
     * @param float $kcaloriasTotales
     * @return BlhFrascoProcesado
     */
    public function setKcaloriasTotales($kcaloriasTotales)
    {
        $this->kcaloriasTotales = $kcaloriasTotales;
    
        return $this;
    }

    /**
     * Get kcaloriasTotales
     *
     * @return float 
     */
    public function getKcaloriasTotales()
    {
        return $this->kcaloriasTotales;
    }

    /**
     * Set observacionFrascoProcesado
     *
     * @param string $observacionFrascoProcesado
     * @return BlhFrascoProcesado
     */
    public function setObservacionFrascoProcesado($observacionFrascoProcesado)
    {
        $this->observacionFrascoProcesado = $observacionFrascoProcesado;
    
        return $this;
    }

    /**
     * Get observacionFrascoProcesado
     *
     * @return string 
     */
    public function getObservacionFrascoProcesado()
    {
        return $this->observacionFrascoProcesado;
    }

    /**
     * Set idEstado
     *
     * @param \siblh\menuBundle\Entity\BlhEstado $idEstado
     * @return BlhFrascoProcesado
     */
    public function setIdEstado(\siblh\menuBundle\Entity\BlhEstado $idEstado = null)
    {
        $this->idEstado = $idEstado;
    
        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \siblh\menuBundle\Entity\BlhEstado 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idPasteurizacion
     *
     * @param \siblh\menuBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhFrascoProcesado
     */
    public function setIdPasteurizacion(\siblh\menuBundle\Entity\BlhPasteurizacion $idPasteurizacion = null)
    {
        $this->idPasteurizacion = $idPasteurizacion;
    
        return $this;
    }

    /**
     * Get idPasteurizacion
     *
     * @return \siblh\menuBundle\Entity\BlhPasteurizacion 
     */
    public function getIdPasteurizacion()
    {
        return $this->idPasteurizacion;
    }
}
