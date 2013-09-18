<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoRecolectado
 */
class BlhFrascoRecolectado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoFrascoRecolectado;

    /**
     * @var float
     */
    private $volumenRecolectado;

    /**
     * @var string
     */
    private $formaExtraccion;

    /**
     * @var float
     */
    private $onzRecolectado;

    /**
     * @var string
     */
    private $observacionFrascoRecolectado;

    /**
     * @var \siblh\menuBundle\Entity\BlhEstado
     */
    private $idEstado;

    /**
     * @var \siblh\menuBundle\Entity\BlhDonacion
     */
    private $idDonacion;

    /**
     * @var \siblh\menuBundle\Entity\BlhDonante
     */
    private $idDonante;

    /**
     * @var \siblh\menuBundle\Entity\BlhLoteAnalizado
     */
    private $idLoteAnalizado;


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
     * Set codigoFrascoRecolectado
     *
     * @param string $codigoFrascoRecolectado
     * @return BlhFrascoRecolectado
     */
    public function setCodigoFrascoRecolectado($codigoFrascoRecolectado)
    {
        $this->codigoFrascoRecolectado = $codigoFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get codigoFrascoRecolectado
     *
     * @return string 
     */
    public function getCodigoFrascoRecolectado()
    {
        return $this->codigoFrascoRecolectado;
    }

    /**
     * Set volumenRecolectado
     *
     * @param float $volumenRecolectado
     * @return BlhFrascoRecolectado
     */
    public function setVolumenRecolectado($volumenRecolectado)
    {
        $this->volumenRecolectado = $volumenRecolectado;
    
        return $this;
    }

    /**
     * Get volumenRecolectado
     *
     * @return float 
     */
    public function getVolumenRecolectado()
    {
        return $this->volumenRecolectado;
    }

    /**
     * Set formaExtraccion
     *
     * @param string $formaExtraccion
     * @return BlhFrascoRecolectado
     */
    public function setFormaExtraccion($formaExtraccion)
    {
        $this->formaExtraccion = $formaExtraccion;
    
        return $this;
    }

    /**
     * Get formaExtraccion
     *
     * @return string 
     */
    public function getFormaExtraccion()
    {
        return $this->formaExtraccion;
    }

    /**
     * Set onzRecolectado
     *
     * @param float $onzRecolectado
     * @return BlhFrascoRecolectado
     */
    public function setOnzRecolectado($onzRecolectado)
    {
        $this->onzRecolectado = $onzRecolectado;
    
        return $this;
    }

    /**
     * Get onzRecolectado
     *
     * @return float 
     */
    public function getOnzRecolectado()
    {
        return $this->onzRecolectado;
    }

    /**
     * Set observacionFrascoRecolectado
     *
     * @param string $observacionFrascoRecolectado
     * @return BlhFrascoRecolectado
     */
    public function setObservacionFrascoRecolectado($observacionFrascoRecolectado)
    {
        $this->observacionFrascoRecolectado = $observacionFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get observacionFrascoRecolectado
     *
     * @return string 
     */
    public function getObservacionFrascoRecolectado()
    {
        return $this->observacionFrascoRecolectado;
    }

    /**
     * Set idEstado
     *
     * @param \siblh\menuBundle\Entity\BlhEstado $idEstado
     * @return BlhFrascoRecolectado
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
     * Set idDonacion
     *
     * @param \siblh\menuBundle\Entity\BlhDonacion $idDonacion
     * @return BlhFrascoRecolectado
     */
    public function setIdDonacion(\siblh\menuBundle\Entity\BlhDonacion $idDonacion = null)
    {
        $this->idDonacion = $idDonacion;
    
        return $this;
    }

    /**
     * Get idDonacion
     *
     * @return \siblh\menuBundle\Entity\BlhDonacion 
     */
    public function getIdDonacion()
    {
        return $this->idDonacion;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhFrascoRecolectado
     */
    public function setIdDonante(\siblh\menuBundle\Entity\BlhDonante $idDonante = null)
    {
        $this->idDonante = $idDonante;
    
        return $this;
    }

    /**
     * Get idDonante
     *
     * @return \siblh\menuBundle\Entity\BlhDonante 
     */
    public function getIdDonante()
    {
        return $this->idDonante;
    }

    /**
     * Set idLoteAnalizado
     *
     * @param \siblh\menuBundle\Entity\BlhLoteAnalizado $idLoteAnalizado
     * @return BlhFrascoRecolectado
     */
    public function setIdLoteAnalizado(\siblh\menuBundle\Entity\BlhLoteAnalizado $idLoteAnalizado = null)
    {
        $this->idLoteAnalizado = $idLoteAnalizado;
    
        return $this;
    }

    /**
     * Get idLoteAnalizado
     *
     * @return \siblh\menuBundle\Entity\BlhLoteAnalizado 
     */
    public function getIdLoteAnalizado()
    {
        return $this->idLoteAnalizado;
    }
}
