<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhIngresoReceptor
 */
class BlhIngresoReceptor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $pesoReceptor;

    /**
     * @var integer
     */
    private $duracionCpap;

    /**
     * @var string
     */
    private $clasificacionLubchengo;

    /**
     * @var string
     */
    private $diagnosticoIngreso;

    /**
     * @var integer
     */
    private $duracionNpt;

    /**
     * @var integer
     */
    private $apgar;

    /**
     * @var float
     */
    private $edadGestFur;

    /**
     * @var integer
     */
    private $duracionVentilacion;

    /**
     * @var float
     */
    private $edadGestBallard;

    /**
     * @var float
     */
    private $pc;

    /**
     * @var float
     */
    private $tallaIngreso;

    /**
     * @var \siblh\menuBundle\Entity\BlhReceptor
     */
    private $idReceptor;


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
     * Set pesoReceptor
     *
     * @param float $pesoReceptor
     * @return BlhIngresoReceptor
     */
    public function setPesoReceptor($pesoReceptor)
    {
        $this->pesoReceptor = $pesoReceptor;
    
        return $this;
    }

    /**
     * Get pesoReceptor
     *
     * @return float 
     */
    public function getPesoReceptor()
    {
        return $this->pesoReceptor;
    }

    /**
     * Set duracionCpap
     *
     * @param integer $duracionCpap
     * @return BlhIngresoReceptor
     */
    public function setDuracionCpap($duracionCpap)
    {
        $this->duracionCpap = $duracionCpap;
    
        return $this;
    }

    /**
     * Get duracionCpap
     *
     * @return integer 
     */
    public function getDuracionCpap()
    {
        return $this->duracionCpap;
    }

    /**
     * Set clasificacionLubchengo
     *
     * @param string $clasificacionLubchengo
     * @return BlhIngresoReceptor
     */
    public function setClasificacionLubchengo($clasificacionLubchengo)
    {
        $this->clasificacionLubchengo = $clasificacionLubchengo;
    
        return $this;
    }

    /**
     * Get clasificacionLubchengo
     *
     * @return string 
     */
    public function getClasificacionLubchengo()
    {
        return $this->clasificacionLubchengo;
    }

    /**
     * Set diagnosticoIngreso
     *
     * @param string $diagnosticoIngreso
     * @return BlhIngresoReceptor
     */
    public function setDiagnosticoIngreso($diagnosticoIngreso)
    {
        $this->diagnosticoIngreso = $diagnosticoIngreso;
    
        return $this;
    }

    /**
     * Get diagnosticoIngreso
     *
     * @return string 
     */
    public function getDiagnosticoIngreso()
    {
        return $this->diagnosticoIngreso;
    }

    /**
     * Set duracionNpt
     *
     * @param integer $duracionNpt
     * @return BlhIngresoReceptor
     */
    public function setDuracionNpt($duracionNpt)
    {
        $this->duracionNpt = $duracionNpt;
    
        return $this;
    }

    /**
     * Get duracionNpt
     *
     * @return integer 
     */
    public function getDuracionNpt()
    {
        return $this->duracionNpt;
    }

    /**
     * Set apgar
     *
     * @param integer $apgar
     * @return BlhIngresoReceptor
     */
    public function setApgar($apgar)
    {
        $this->apgar = $apgar;
    
        return $this;
    }

    /**
     * Get apgar
     *
     * @return integer 
     */
    public function getApgar()
    {
        return $this->apgar;
    }

    /**
     * Set edadGestFur
     *
     * @param float $edadGestFur
     * @return BlhIngresoReceptor
     */
    public function setEdadGestFur($edadGestFur)
    {
        $this->edadGestFur = $edadGestFur;
    
        return $this;
    }

    /**
     * Get edadGestFur
     *
     * @return float 
     */
    public function getEdadGestFur()
    {
        return $this->edadGestFur;
    }

    /**
     * Set duracionVentilacion
     *
     * @param integer $duracionVentilacion
     * @return BlhIngresoReceptor
     */
    public function setDuracionVentilacion($duracionVentilacion)
    {
        $this->duracionVentilacion = $duracionVentilacion;
    
        return $this;
    }

    /**
     * Get duracionVentilacion
     *
     * @return integer 
     */
    public function getDuracionVentilacion()
    {
        return $this->duracionVentilacion;
    }

    /**
     * Set edadGestBallard
     *
     * @param float $edadGestBallard
     * @return BlhIngresoReceptor
     */
    public function setEdadGestBallard($edadGestBallard)
    {
        $this->edadGestBallard = $edadGestBallard;
    
        return $this;
    }

    /**
     * Get edadGestBallard
     *
     * @return float 
     */
    public function getEdadGestBallard()
    {
        return $this->edadGestBallard;
    }

    /**
     * Set pc
     *
     * @param float $pc
     * @return BlhIngresoReceptor
     */
    public function setPc($pc)
    {
        $this->pc = $pc;
    
        return $this;
    }

    /**
     * Get pc
     *
     * @return float 
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set tallaIngreso
     *
     * @param float $tallaIngreso
     * @return BlhIngresoReceptor
     */
    public function setTallaIngreso($tallaIngreso)
    {
        $this->tallaIngreso = $tallaIngreso;
    
        return $this;
    }

    /**
     * Get tallaIngreso
     *
     * @return float 
     */
    public function getTallaIngreso()
    {
        return $this->tallaIngreso;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\menuBundle\Entity\BlhReceptor $idReceptor
     * @return BlhIngresoReceptor
     */
    public function setIdReceptor(\siblh\menuBundle\Entity\BlhReceptor $idReceptor = null)
    {
        $this->idReceptor = $idReceptor;
    
        return $this;
    }

    /**
     * Get idReceptor
     *
     * @return \siblh\menuBundle\Entity\BlhReceptor 
     */
    public function getIdReceptor()
    {
        return $this->idReceptor;
    }
}
