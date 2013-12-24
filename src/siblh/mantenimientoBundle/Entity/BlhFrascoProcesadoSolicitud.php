<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoProcesadoSolicitud
 *
 * @ORM\Table(name="blh_frasco_procesado_solicitud")
 * @ORM\Entity
 */
class BlhFrascoProcesadoSolicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_frasco_procesado_solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_despachado", type="decimal", nullable=false)
     */
    private $volumenDespachado;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

    /**
     * @var \BlhFrascoProcesado
     *
     * @ORM\ManyToOne(targetEntity="BlhFrascoProcesado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_frasco_procesado", referencedColumnName="id")
     * })
     */
    private $idFrascoProcesado;

    /**
     * @var \BlhSolicitud
     *
     * @ORM\ManyToOne(targetEntity="BlhSolicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id")
     * })
     */
    private $idSolicitud;



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
     * Set volumenDespachado
     *
     * @param float $volumenDespachado
     * @return BlhFrascoProcesadoSolicitud
     */
    public function setVolumenDespachado($volumenDespachado)
    {
        $this->volumenDespachado = $volumenDespachado;
    
        return $this;
    }

    /**
     * Get volumenDespachado
     *
     * @return float 
     */
    public function getVolumenDespachado()
    {
        return $this->volumenDespachado;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhFrascoProcesadoSolicitud
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
     * Set idFrascoProcesado
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhFrascoProcesadoSolicitud
     */
    public function setIdFrascoProcesado(\siblh\mantenimientoBundle\Entity\BlhFrascoProcesado $idFrascoProcesado = null)
    {
        $this->idFrascoProcesado = $idFrascoProcesado;
    
        return $this;
    }

    /**
     * Get idFrascoProcesado
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhFrascoProcesado 
     */
    public function getIdFrascoProcesado()
    {
        return $this->idFrascoProcesado;
    }

    /**
     * Set idSolicitud
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhSolicitud $idSolicitud
     * @return BlhFrascoProcesadoSolicitud
     */
    public function setIdSolicitud(\siblh\mantenimientoBundle\Entity\BlhSolicitud $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhSolicitud 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }
}