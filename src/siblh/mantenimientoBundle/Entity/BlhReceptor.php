<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhReceptor
 *
 * @ORM\Table(name="blh_receptor")
 * @ORM\Entity
 */
class BlhReceptor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_receptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_receptor", type="string", length=14, nullable=true)
     */
    private $codigoReceptor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro_blh", type="date", nullable=true)
     */
    private $fechaRegistroBlh;

    /**
     * @var string
     *
     * @ORM\Column(name="procedencia", type="string", length=20, nullable=true)
     */
    private $procedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_receptor", type="string", length=8, nullable=true)
     */
    private $estadoReceptor;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad_dias", type="integer", nullable=false)
     */
    private $edadDias;

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
     * @var float
     *
     * @ORM\Column(name="apgar_primer_minuto", type="decimal", nullable=true)
     */
    private $apgarPrimerMinuto;

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
     * @var float
     *
     * @ORM\Column(name="apgar_quinto_minuto", type="decimal", nullable=true)
     */
    private $apgarQuintoMinuto;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

    /**
     * @var \BlhBancoDeLeche
     *
     * @ORM\ManyToOne(targetEntity="BlhBancoDeLeche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_banco_de_leche", referencedColumnName="id")
     * })
     */
    private $idBancoDeLeche;

    /**
     * @var \MntPaciente
     *
     * @ORM\ManyToOne(targetEntity="MntPaciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_paciente", referencedColumnName="id")
     * })
     */
    private $idPaciente;



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
     * Set codigoReceptor
     *
     * @param string $codigoReceptor
     * @return BlhReceptor
     */
    public function setCodigoReceptor($codigoReceptor)
    {
        $this->codigoReceptor = $codigoReceptor;
    
        return $this;
    }

    /**
     * Get codigoReceptor
     *
     * @return string 
     */
    public function getCodigoReceptor()
    {
        return $this->codigoReceptor;
    }

    /**
     * Set fechaRegistroBlh
     *
     * @param \DateTime $fechaRegistroBlh
     * @return BlhReceptor
     */
    public function setFechaRegistroBlh($fechaRegistroBlh)
    {
        $this->fechaRegistroBlh = $fechaRegistroBlh;
    
        return $this;
    }

    /**
     * Get fechaRegistroBlh
     *
     * @return \DateTime 
     */
    public function getFechaRegistroBlh()
    {
        return $this->fechaRegistroBlh;
    }

    /**
     * Set procedencia
     *
     * @param string $procedencia
     * @return BlhReceptor
     */
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;
    
        return $this;
    }

    /**
     * Get procedencia
     *
     * @return string 
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set estadoReceptor
     *
     * @param string $estadoReceptor
     * @return BlhReceptor
     */
    public function setEstadoReceptor($estadoReceptor)
    {
        $this->estadoReceptor = $estadoReceptor;
    
        return $this;
    }

    /**
     * Get estadoReceptor
     *
     * @return string 
     */
    public function getEstadoReceptor()
    {
        return $this->estadoReceptor;
    }

    /**
     * Set edadDias
     *
     * @param integer $edadDias
     * @return BlhReceptor
     */
    public function setEdadDias($edadDias)
    {
        $this->edadDias = $edadDias;
    
        return $this;
    }

    /**
     * Get edadDias
     *
     * @return integer 
     */
    public function getEdadDias()
    {
        return $this->edadDias;
    }

    /**
     * Set pesoReceptor
     *
     * @param float $pesoReceptor
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * Set apgarPrimerMinuto
     *
     * @param float $apgarPrimerMinuto
     * @return BlhReceptor
     */
    public function setApgarPrimerMinuto($apgarPrimerMinuto)
    {
        $this->apgarPrimerMinuto = $apgarPrimerMinuto;
    
        return $this;
    }

    /**
     * Get apgarPrimerMinuto
     *
     * @return float 
     */
    public function getApgarPrimerMinuto()
    {
        return $this->apgarPrimerMinuto;
    }

    /**
     * Set edadGestFur
     *
     * @param float $edadGestFur
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * @return BlhReceptor
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
     * Set apgarQuintoMinuto
     *
     * @param float $apgarQuintoMinuto
     * @return BlhReceptor
     */
    public function setApgarQuintoMinuto($apgarQuintoMinuto)
    {
        $this->apgarQuintoMinuto = $apgarQuintoMinuto;
    
        return $this;
    }

    /**
     * Get apgarQuintoMinuto
     *
     * @return float 
     */
    public function getApgarQuintoMinuto()
    {
        return $this->apgarQuintoMinuto;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhReceptor
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhReceptor
     */
    public function setIdBancoDeLeche(\siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche = null)
    {
        $this->idBancoDeLeche = $idBancoDeLeche;
    
        return $this;
    }

    /**
     * Get idBancoDeLeche
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche 
     */
    public function getIdBancoDeLeche()
    {
        return $this->idBancoDeLeche;
    }

    /**
     * Set idPaciente
     *
     * @param \siblh\mantenimientoBundle\Entity\MntPaciente $idPaciente
     * @return BlhReceptor
     */
    public function setIdPaciente(\siblh\mantenimientoBundle\Entity\MntPaciente $idPaciente = null)
    {
        $this->idPaciente = $idPaciente;
    
        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return \siblh\mantenimientoBundle\Entity\MntPaciente 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
    
    public function __toString()
    {
       return $this->codigoReceptor;
    }    
}