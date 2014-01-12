<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhSeguimientoReceptor
 *
 * @ORM\Table(name="blh_seguimiento_receptor")
 * @ORM\Entity
 */
class BlhSeguimientoReceptor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_seguimiento_receptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="talla_receptor", type="decimal", nullable=false)
     */
    private $tallaReceptor;

    /**
     * @var float
     *
     * @ORM\Column(name="peso_seguimiento", type="decimal", nullable=false)
     */
    private $pesoSeguimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="pc_seguimiento", type="decimal", nullable=false)
     */
    private $pcSeguimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="ganancia_dia_peso", type="decimal", nullable=false)
     */
    private $gananciaDiaPeso;

    /**
     * @var integer
     *
     * @ORM\Column(name="semana", type="integer", nullable=false)
     */
    private $semana;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_seguimiento", type="date", nullable=false)
     */
    private $fechaSeguimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="ganancia_dia_talla", type="decimal", nullable=false)
     */
    private $gananciaDiaTalla;

    /**
     * @var string
     *
     * @ORM\Column(name="complicaciones", type="string", length=50, nullable=false)
     */
    private $complicaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=150, nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodo_evaluacion", type="integer", nullable=true)
     */
    private $periodoEvaluacion;

    /**
     * @var float
     *
     * @ORM\Column(name="ganancia_dia_pc", type="decimal", nullable=true)
     */
    private $gananciaDiaPc;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

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
     * Set tallaReceptor
     *
     * @param float $tallaReceptor
     * @return BlhSeguimientoReceptor
     */
    public function setTallaReceptor($tallaReceptor)
    {
        $this->tallaReceptor = $tallaReceptor;
    
        return $this;
    }

    /**
     * Get tallaReceptor
     *
     * @return float 
     */
    public function getTallaReceptor()
    {
        return $this->tallaReceptor;
    }

    /**
     * Set pesoSeguimiento
     *
     * @param float $pesoSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setPesoSeguimiento($pesoSeguimiento)
    {
        $this->pesoSeguimiento = $pesoSeguimiento;
    
        return $this;
    }

    /**
     * Get pesoSeguimiento
     *
     * @return float 
     */
    public function getPesoSeguimiento()
    {
        return $this->pesoSeguimiento;
    }

    /**
     * Set pcSeguimiento
     *
     * @param float $pcSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setPcSeguimiento($pcSeguimiento)
    {
        $this->pcSeguimiento = $pcSeguimiento;
    
        return $this;
    }

    /**
     * Get pcSeguimiento
     *
     * @return float 
     */
    public function getPcSeguimiento()
    {
        return $this->pcSeguimiento;
    }

    /**
     * Set gananciaDiaPeso
     *
     * @param float $gananciaDiaPeso
     * @return BlhSeguimientoReceptor
     */
    public function setGananciaDiaPeso($gananciaDiaPeso)
    {
        $this->gananciaDiaPeso = $gananciaDiaPeso;
    
        return $this;
    }

    /**
     * Get gananciaDiaPeso
     *
     * @return float 
     */
    public function getGananciaDiaPeso()
    {
        return $this->gananciaDiaPeso;
    }

    /**
     * Set semana
     *
     * @param integer $semana
     * @return BlhSeguimientoReceptor
     */
    public function setSemana($semana)
    {
        $this->semana = $semana;
    
        return $this;
    }

    /**
     * Get semana
     *
     * @return integer 
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * Set fechaSeguimiento
     *
     * @param \DateTime $fechaSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setFechaSeguimiento($fechaSeguimiento)
    {
        $this->fechaSeguimiento = $fechaSeguimiento;
    
        return $this;
    }

    /**
     * Get fechaSeguimiento
     *
     * @return \DateTime 
     */
    public function getFechaSeguimiento()
    {
        return $this->fechaSeguimiento;
    }

    /**
     * Set gananciaDiaTalla
     *
     * @param float $gananciaDiaTalla
     * @return BlhSeguimientoReceptor
     */
    public function setGananciaDiaTalla($gananciaDiaTalla)
    {
        $this->gananciaDiaTalla = $gananciaDiaTalla;
    
        return $this;
    }

    /**
     * Get gananciaDiaTalla
     *
     * @return float 
     */
    public function getGananciaDiaTalla()
    {
        return $this->gananciaDiaTalla;
    }

    /**
     * Set complicaciones
     *
     * @param string $complicaciones
     * @return BlhSeguimientoReceptor
     */
    public function setComplicaciones($complicaciones)
    {
        $this->complicaciones = $complicaciones;
    
        return $this;
    }

    /**
     * Get complicaciones
     *
     * @return string 
     */
    public function getComplicaciones()
    {
        return $this->complicaciones;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return BlhSeguimientoReceptor
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set periodoEvaluacion
     *
     * @param integer $periodoEvaluacion
     * @return BlhSeguimientoReceptor
     */
    public function setPeriodoEvaluacion($periodoEvaluacion)
    {
        $this->periodoEvaluacion = $periodoEvaluacion;
    
        return $this;
    }

    /**
     * Get periodoEvaluacion
     *
     * @return integer 
     */
    public function getPeriodoEvaluacion()
    {
        return $this->periodoEvaluacion;
    }

    /**
     * Set gananciaDiaPc
     *
     * @param float $gananciaDiaPc
     * @return BlhSeguimientoReceptor
     */
    public function setGananciaDiaPc($gananciaDiaPc)
    {
        $this->gananciaDiaPc = $gananciaDiaPc;
    
        return $this;
    }

    /**
     * Get gananciaDiaPc
     *
     * @return float 
     */
    public function getGananciaDiaPc()
    {
        return $this->gananciaDiaPc;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhSeguimientoReceptor
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
     * Set idReceptor
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor
     * @return BlhSeguimientoReceptor
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