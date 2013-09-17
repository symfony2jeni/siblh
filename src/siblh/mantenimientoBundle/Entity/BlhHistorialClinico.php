<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhHistorialClinico
 *
 * @ORM\Table(name="blh_historial_clinico")
 * @ORM\Entity
 */
class BlhHistorialClinico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_historial_clinico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="amenorrea", type="integer", nullable=true)
     */
    private $amenorrea;

    /**
     * @var string
     *
     * @ORM\Column(name="control_prenatal", type="string", length=2, nullable=false)
     */
    private $controlPrenatal;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_control", type="string", length=25, nullable=true)
     */
    private $lugarControl;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero_control", type="integer", nullable=true)
     */
    private $numeroControl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultima_regla", type="date", nullable=true)
     */
    private $fechaUltimaRegla;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_parto", type="date", nullable=false)
     */
    private $fechaParto;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_parto", type="string", length=30, nullable=false)
     */
    private $lugarParto;

    /**
     * @var string
     *
     * @ORM\Column(name="patologia_embarazo", type="string", length=20, nullable=false)
     */
    private $patologiaEmbarazo;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodo_intergenesico", type="integer", nullable=false)
     */
    private $periodoIntergenesico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_parto_anterior", type="date", nullable=false)
     */
    private $fechaPartoAnterior;

    /**
     * @var string
     *
     * @ORM\Column(name="formula_obstetrica", type="string", length=18, nullable=false)
     */
    private $formulaObstetrica;

    /**
     * @var \BlhDonante
     *
     * @ORM\ManyToOne(targetEntity="BlhDonante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_donante", referencedColumnName="id")
     * })
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
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhHistorialClinico
     */
    public function setIdDonante(\siblh\mantenimientoBundle\Entity\BlhDonante $idDonante = null)
    {
        $this->idDonante = $idDonante;
    
        return $this;
    }

    /**
     * Get idDonante
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhDonante 
     */
    public function getIdDonante()
    {
        return $this->idDonante;
    }
}