<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhFrascoRecolectadoFrascoP
 *
 * @ORM\Table(name="blh_frasco_recolectado_frasco_p")
 * @ORM\Entity
 */
class BlhFrascoRecolectadoFrascoP
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_frasco_recolectado_frasco_p_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_agregado", type="decimal", nullable=false)
     */
    private $volumenAgregado;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

    /**
     * @var \BlhFrascoRecolectado
     *
     * @ORM\ManyToOne(targetEntity="BlhFrascoRecolectado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_frasco_recolectado", referencedColumnName="id")
     * })
     */
    private $idFrascoRecolectado;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set volumenAgregado
     *
     * @param float $volumenAgregado
     * @return BlhFrascoRecolectadoFrascoP
     */
    public function setVolumenAgregado($volumenAgregado)
    {
        $this->volumenAgregado = $volumenAgregado;
    
        return $this;
    }

    /**
     * Get volumenAgregado
     *
     * @return float 
     */
    public function getVolumenAgregado()
    {
        return $this->volumenAgregado;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhFrascoRecolectadoFrascoP
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
     * Set idFrascoRecolectado
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado
     * @return BlhFrascoRecolectadoFrascoP
     */
    public function setIdFrascoRecolectado(\siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado = null)
    {
        $this->idFrascoRecolectado = $idFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get idFrascoRecolectado
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado 
     */
    public function getIdFrascoRecolectado()
    {
        return $this->idFrascoRecolectado;
    }

    /**
     * Set idFrascoProcesado
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhFrascoRecolectadoFrascoP
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
}