<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhHistorialClinico
 */
class BlhHistorialClinico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $amenorrea;

    /**
     * @var string
     */
    private $controlPrenatal;

    /**
     * @var string
     */
    private $lugarControl;

    /**
     * @var integer
     */
    private $numeroControl;

    /**
     * @var \DateTime
     */
    private $fechaUltimaRegla;

    /**
     * @var \DateTime
     */
    private $fechaParto;

    /**
     * @var string
     */
    private $lugarParto;

    /**
     * @var string
     */
    private $patologiaEmbarazo;

    /**
     * @var integer
     */
    private $periodoIntergenesico;

    /**
     * @var \DateTime
     */
    private $fechaPartoAnterior;

    /**
     * @var string
     */
    private $formulaObstetrica;

    /**
     * @var \siblh\menuBundle\Entity\BlhDonante
     */
    private $idDonante;


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
     * Set amenorrea
     *
     * @param integer $amenorrea
     * @return BlhHistorialClinico
     */
    public function setAmenorrea($amenorrea)
    {
        $this->amenorrea = $amenorrea;
    
        return $this;
    }

    /**
     * Get amenorrea
     *
     * @return integer 
     */
    public function getAmenorrea()
    {
        return $this->amenorrea;
    }

    /**
     * Set controlPrenatal
     *
     * @param string $controlPrenatal
     * @return BlhHistorialClinico
     */
    public function setControlPrenatal($controlPrenatal)
    {
        $this->controlPrenatal = $controlPrenatal;
    
        return $this;
    }

    /**
     * Get controlPrenatal
     *
     * @return string 
     */
    public function getControlPrenatal()
    {
        return $this->controlPrenatal;
    }

    /**
     * Set lugarControl
     *
     * @param string $lugarControl
     * @return BlhHistorialClinico
     */
    public function setLugarControl($lugarControl)
    {
        $this->lugarControl = $lugarControl;
    
        return $this;
    }

    /**
     * Get lugarControl
     *
     * @return string 
     */
    public function getLugarControl()
    {
        return $this->lugarControl;
    }

    /**
     * Set numeroControl
     *
     * @param integer $numeroControl
     * @return BlhHistorialClinico
     */
    public function setNumeroControl($numeroControl)
    {
        $this->numeroControl = $numeroControl;
    
        return $this;
    }

    /**
     * Get numeroControl
     *
     * @return integer 
     */
    public function getNumeroControl()
    {
        return $this->numeroControl;
    }

    /**
     * Set fechaUltimaRegla
     *
     * @param \DateTime $fechaUltimaRegla
     * @return BlhHistorialClinico
     */
    public function setFechaUltimaRegla($fechaUltimaRegla)
    {
        $this->fechaUltimaRegla = $fechaUltimaRegla;
    
        return $this;
    }

    /**
     * Get fechaUltimaRegla
     *
     * @return \DateTime 
     */
    public function getFechaUltimaRegla()
    {
        return $this->fechaUltimaRegla;
    }

    /**
     * Set fechaParto
     *
     * @param \DateTime $fechaParto
     * @return BlhHistorialClinico
     */
    public function setFechaParto($fechaParto)
    {
        $this->fechaParto = $fechaParto;
    
        return $this;
    }

    /**
     * Get fechaParto
     *
     * @return \DateTime 
     */
    public function getFechaParto()
    {
        return $this->fechaParto;
    }

    /**
     * Set lugarParto
     *
     * @param string $lugarParto
     * @return BlhHistorialClinico
     */
    public function setLugarParto($lugarParto)
    {
        $this->lugarParto = $lugarParto;
    
        return $this;
    }

    /**
     * Get lugarParto
     *
     * @return string 
     */
    public function getLugarParto()
    {
        return $this->lugarParto;
    }

    /**
     * Set patologiaEmbarazo
     *
     * @param string $patologiaEmbarazo
     * @return BlhHistorialClinico
     */
    public function setPatologiaEmbarazo($patologiaEmbarazo)
    {
        $this->patologiaEmbarazo = $patologiaEmbarazo;
    
        return $this;
    }

    /**
     * Get patologiaEmbarazo
     *
     * @return string 
     */
    public function getPatologiaEmbarazo()
    {
        return $this->patologiaEmbarazo;
    }

    /**
     * Set periodoIntergenesico
     *
     * @param integer $periodoIntergenesico
     * @return BlhHistorialClinico
     */
    public function setPeriodoIntergenesico($periodoIntergenesico)
    {
        $this->periodoIntergenesico = $periodoIntergenesico;
    
        return $this;
    }

    /**
     * Get periodoIntergenesico
     *
     * @return integer 
     */
    public function getPeriodoIntergenesico()
    {
        return $this->periodoIntergenesico;
    }

    /**
     * Set fechaPartoAnterior
     *
     * @param \DateTime $fechaPartoAnterior
     * @return BlhHistorialClinico
     */
    public function setFechaPartoAnterior($fechaPartoAnterior)
    {
        $this->fechaPartoAnterior = $fechaPartoAnterior;
    
        return $this;
    }

    /**
     * Get fechaPartoAnterior
     *
     * @return \DateTime 
     */
    public function getFechaPartoAnterior()
    {
        return $this->fechaPartoAnterior;
    }

    /**
     * Set formulaObstetrica
     *
     * @param string $formulaObstetrica
     * @return BlhHistorialClinico
     */
    public function setFormulaObstetrica($formulaObstetrica)
    {
        $this->formulaObstetrica = $formulaObstetrica;
    
        return $this;
    }

    /**
     * Get formulaObstetrica
     *
     * @return string 
     */
    public function getFormulaObstetrica()
    {
        return $this->formulaObstetrica;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhHistorialClinico
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
}
