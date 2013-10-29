<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhSolicitud
 *
 * @ORM\Table(name="blh_solicitud")
 * @ORM\Entity
 */
class BlhSolicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_solicitud", type="string", length=16, nullable=false)
     */
    private $codigoSolicitud;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_por_dia", type="decimal", nullable=false)
     */
    private $volumenPorDia;

    /**
     * @var string
     *
     * @ORM\Column(name="acidez_necesaria", type="string", length=9, nullable=false)
     */
    private $acidezNecesaria;

    /**
     * @var string
     *
     * @ORM\Column(name="calorias_necesarias", type="string", length=15, nullable=false)
     */
    private $caloriasNecesarias;

    /**
     * @var float
     *
     * @ORM\Column(name="peso_dia", type="decimal", nullable=false)
     */
    private $pesoDia;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_por_toma", type="decimal", nullable=false)
     */
    private $volumenPorToma;

    /**
     * @var integer
     *
     * @ORM\Column(name="toma_por_dia", type="integer", nullable=false)
     */
    private $tomaPorDia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="date", nullable=false)
     */
    private $fechaSolicitud;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuna", type="integer", nullable=false)
     */
    private $cuna;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=10, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=60, nullable=true)
     */
    private $responsable;

    /**
     * @var \BlhGrupoSolicitud
     *
     * @ORM\ManyToOne(targetEntity="BlhGrupoSolicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grupo_solicitud", referencedColumnName="id")
     * })
     */
    private $idGrupoSolicitud;

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
     * Set codigoSolicitud
     *
     * @param string $codigoSolicitud
     * @return BlhSolicitud
     */
    public function setCodigoSolicitud($codigoSolicitud)
    {
        $this->codigoSolicitud = $codigoSolicitud;
    
        return $this;
    }

    /**
     * Get codigoSolicitud
     *
     * @return string 
     */
    public function getCodigoSolicitud()
    {
        return $this->codigoSolicitud;
    }

    /**
     * Set volumenPorDia
     *
     * @param float $volumenPorDia
     * @return BlhSolicitud
     */
    public function setVolumenPorDia($volumenPorDia)
    {
        $this->volumenPorDia = $volumenPorDia;
    
        return $this;
    }

    /**
     * Get volumenPorDia
     *
     * @return float 
     */
    public function getVolumenPorDia()
    {
        return $this->volumenPorDia;
    }

    /**
     * Set acidezNecesaria
     *
     * @param string $acidezNecesaria
     * @return BlhSolicitud
     */
    public function setAcidezNecesaria($acidezNecesaria)
    {
        $this->acidezNecesaria = $acidezNecesaria;
    
        return $this;
    }

    /**
     * Get acidezNecesaria
     *
     * @return string 
     */
    public function getAcidezNecesaria()
    {
        return $this->acidezNecesaria;
    }

    /**
     * Set caloriasNecesarias
     *
     * @param string $caloriasNecesarias
     * @return BlhSolicitud
     */
    public function setCaloriasNecesarias($caloriasNecesarias)
    {
        $this->caloriasNecesarias = $caloriasNecesarias;
    
        return $this;
    }

    /**
     * Get caloriasNecesarias
     *
     * @return string 
     */
    public function getCaloriasNecesarias()
    {
        return $this->caloriasNecesarias;
    }

    /**
     * Set pesoDia
     *
     * @param float $pesoDia
     * @return BlhSolicitud
     */
    public function setPesoDia($pesoDia)
    {
        $this->pesoDia = $pesoDia;
    
        return $this;
    }

    /**
     * Get pesoDia
     *
     * @return float 
     */
    public function getPesoDia()
    {
        return $this->pesoDia;
    }

    /**
     * Set volumenPorToma
     *
     * @param float $volumenPorToma
     * @return BlhSolicitud
     */
    public function setVolumenPorToma($volumenPorToma)
    {
        $this->volumenPorToma = $volumenPorToma;
    
        return $this;
    }

    /**
     * Get volumenPorToma
     *
     * @return float 
     */
    public function getVolumenPorToma()
    {
        return $this->volumenPorToma;
    }

    /**
     * Set tomaPorDia
     *
     * @param integer $tomaPorDia
     * @return BlhSolicitud
     */
    public function setTomaPorDia($tomaPorDia)
    {
        $this->tomaPorDia = $tomaPorDia;
    
        return $this;
    }

    /**
     * Get tomaPorDia
     *
     * @return integer 
     */
    public function getTomaPorDia()
    {
        return $this->tomaPorDia;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return BlhSolicitud
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;
    
        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set cuna
     *
     * @param integer $cuna
     * @return BlhSolicitud
     */
    public function setCuna($cuna)
    {
        $this->cuna = $cuna;
    
        return $this;
    }

    /**
     * Get cuna
     *
     * @return integer 
     */
    public function getCuna()
    {
        return $this->cuna;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return BlhSolicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return BlhSolicitud
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    
        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set idGrupoSolicitud
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhGrupoSolicitud $idGrupoSolicitud
     * @return BlhSolicitud
     */
    public function setIdGrupoSolicitud(\siblh\mantenimientoBundle\Entity\BlhGrupoSolicitud $idGrupoSolicitud = null)
    {
        $this->idGrupoSolicitud = $idGrupoSolicitud;
    
        return $this;
    }

    /**
     * Get idGrupoSolicitud
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhGrupoSolicitud 
     */
    public function getIdGrupoSolicitud()
    {
        return $this->idGrupoSolicitud;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor
     * @return BlhSolicitud
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