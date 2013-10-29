<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoRecolectado
 *
 * @ORM\Table(name="blh_frasco_recolectado")
 * @ORM\Entity
 */
class BlhFrascoRecolectado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_frasco_recolectado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_frasco_recolectado", type="string", length=15, nullable=false)
     */
    private $codigoFrascoRecolectado;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_recolectado", type="decimal", nullable=false)
     */
    private $volumenRecolectado;

    /**
     * @var string
     *
     * @ORM\Column(name="forma_extraccion", type="string", length=8, nullable=false)
     */
    private $formaExtraccion;

    /**
     * @var float
     *
     * @ORM\Column(name="onz_recolectado", type="decimal", nullable=true)
     */
    private $onzRecolectado;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion_frasco_recolectado", type="string", length=150, nullable=true)
     */
    private $observacionFrascoRecolectado;

    /**
     * @var \BlhEstado
     *
     * @ORM\ManyToOne(targetEntity="BlhEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     * })
     */
    private $idEstado;

    /**
     * @var \BlhDonacion
     *
     * @ORM\ManyToOne(targetEntity="BlhDonacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_donacion", referencedColumnName="id")
     * })
     */
    private $idDonacion;

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
     * @var \BlhLoteAnalisis
     *
     * @ORM\ManyToOne(targetEntity="BlhLoteAnalisis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_lote_analisis", referencedColumnName="id")
     * })
     */
    private $idLoteAnalisis;



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
     * @param \siblh\mantenimientoBundle\Entity\BlhEstado $idEstado
     * @return BlhFrascoRecolectado
     */
    public function setIdEstado(\siblh\mantenimientoBundle\Entity\BlhEstado $idEstado = null)
    {
        $this->idEstado = $idEstado;
    
        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhEstado 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idDonacion
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonacion $idDonacion
     * @return BlhFrascoRecolectado
     */
    public function setIdDonacion(\siblh\mantenimientoBundle\Entity\BlhDonacion $idDonacion = null)
    {
        $this->idDonacion = $idDonacion;
    
        return $this;
    }

    /**
     * Get idDonacion
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhDonacion 
     */
    public function getIdDonacion()
    {
        return $this->idDonacion;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhFrascoRecolectado
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

    /**
     * Set idLoteAnalisis
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhLoteAnalisis $idLoteAnalisis
     * @return BlhFrascoRecolectado
     */
    public function setIdLoteAnalisis(\siblh\mantenimientoBundle\Entity\BlhLoteAnalisis $idLoteAnalisis = null)
    {
        $this->idLoteAnalisis = $idLoteAnalisis;
    
        return $this;
    }

    /**
     * Get idLoteAnalisis
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhLoteAnalisis 
     */
    public function getIdLoteAnalisis()
    {
        return $this->idLoteAnalisis;
    }
    
     public function __toString()
    {
       return $this->codigoFrascoRecolectado;
    }
}