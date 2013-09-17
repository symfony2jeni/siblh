<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhIngresoReceptor
 *
 * @ORM\Table(name="blh_ingreso_receptor")
 * @ORM\Entity
 */
class BlhIngresoReceptor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_ingreso_receptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="peso_receptor", type="decimal", nullable=false)
     */
    private $pesoReceptor;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion_cpap", type="integer", nullable=true)
     */
    private $duracionCpap;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion_lubchengo", type="string", length=3, nullable=false)
     */
    private $clasificacionLubchengo;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico_ingreso", type="string", length=50, nullable=true)
     */
    private $diagnosticoIngreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion_npt", type="integer", nullable=true)
     */
    private $duracionNpt;

    /**
     * @var integer
     *
     * @ORM\Column(name="apgar", type="integer", nullable=true)
     */
    private $apgar;

    /**
     * @var float
     *
     * @ORM\Column(name="edad_gest_fur", type="decimal", nullable=false)
     */
    private $edadGestFur;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion_ventilacion", type="integer", nullable=true)
     */
    private $duracionVentilacion;

    /**
     * @var float
     *
     * @ORM\Column(name="edad_gest_ballard", type="decimal", nullable=false)
     */
    private $edadGestBallard;

    /**
     * @var float
     *
     * @ORM\Column(name="pc", type="decimal", nullable=false)
     */
    private $pc;

    /**
     * @var float
     *
     * @ORM\Column(name="talla_ingreso", type="decimal", nullable=true)
     */
    private $tallaIngreso;

    /**
     * @var \BlhReceptor
     *
     * @ORM\ManyToOne(targetEntity="BlhReceptor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_receptor", referencedColumnName="id")
     * })
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
     * @param \siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor
     * @return BlhIngresoReceptor
     */
    public function setIdReceptor(\siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor = null)
    {
        $this->idReceptor = $idReceptor;
    
        return $this;
    }

    /**
     * Get idReceptor
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhReceptor 
     */
    public function getIdReceptor()
    {
        return $this->idReceptor;
    }
}