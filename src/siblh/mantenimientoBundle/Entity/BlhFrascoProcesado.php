<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoProcesado
 *
 * @ORM\Table(name="blh_frasco_procesado")
 * @ORM\Entity
 */
class BlhFrascoProcesado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_frasco_procesado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_frasco_procesado", type="string", length=15, nullable=false)
     */
    private $codigoFrascoProcesado;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_frasco_pasteurizado", type="decimal", nullable=false)
     */
    private $volumenFrascoPasteurizado;

    /**
     * @var float
     *
     * @ORM\Column(name="acidez_total", type="decimal", nullable=false)
     */
    private $acidezTotal;

    /**
     * @var float
     *
     * @ORM\Column(name="kcalorias_totales", type="decimal", nullable=false)
     */
    private $kcaloriasTotales;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion_frasco_procesado", type="string", length=30, nullable=true)
     */
    private $observacionFrascoProcesado;

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
     * @var \BlhPasteurizacion
     *
     * @ORM\ManyToOne(targetEntity="BlhPasteurizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pasteurizacion", referencedColumnName="id")
     * })
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
     * @param \siblh\mantenimientoBundle\Entity\BlhEstado $idEstado
     * @return BlhFrascoProcesado
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
     * Set idPasteurizacion
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhFrascoProcesado
     */
    public function setIdPasteurizacion(\siblh\mantenimientoBundle\Entity\BlhPasteurizacion $idPasteurizacion = null)
    {
        $this->idPasteurizacion = $idPasteurizacion;
    
        return $this;
    }

    /**
     * Get idPasteurizacion
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhPasteurizacion 
     */
    public function getIdPasteurizacion()
    {
        return $this->idPasteurizacion;
    }
<<<<<<< HEAD
    
        

      public function __toString() {
   return $this->codigoFrascoProcesado;
}
=======
>>>>>>> desarrollo
}