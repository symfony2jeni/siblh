<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisMicrobiologico
 *
 * @ORM\Table(name="blh_analisis_microbiologico")
 * @ORM\Entity
 */
class BlhAnalisisMicrobiologico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_analisis_microbiologico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_analisis_microbiologico", type="string", length=13, nullable=false)
     */
    private $codigoAnalisisMicrobiologico;

    /**
     * @var string
     *
     * @ORM\Column(name="coliformes_totales", type="string", length=8, nullable=true)
     */
    private $coliformesTotales;

    /**
     * @var string
     *
     * @ORM\Column(name="control", type="string", length=8, nullable=true)
     */
    private $control;

    /**
     * @var string
     *
     * @ORM\Column(name="situacion", type="string", length=9, nullable=true)
     */
    private $situacion;

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
     * Set codigoAnalisisMicrobiologico
     *
     * @param string $codigoAnalisisMicrobiologico
     * @return BlhAnalisisMicrobiologico
     */
    public function setCodigoAnalisisMicrobiologico($codigoAnalisisMicrobiologico)
    {
        $this->codigoAnalisisMicrobiologico = $codigoAnalisisMicrobiologico;
    
        return $this;
    }

    /**
     * Get codigoAnalisisMicrobiologico
     *
     * @return string 
     */
    public function getCodigoAnalisisMicrobiologico()
    {
        return $this->codigoAnalisisMicrobiologico;
    }

    /**
     * Set coliformesTotales
     *
     * @param string $coliformesTotales
     * @return BlhAnalisisMicrobiologico
     */
    public function setColiformesTotales($coliformesTotales)
    {
        $this->coliformesTotales = $coliformesTotales;
    
        return $this;
    }

    /**
     * Get coliformesTotales
     *
     * @return string 
     */
    public function getColiformesTotales()
    {
        return $this->coliformesTotales;
    }

    /**
     * Set control
     *
     * @param string $control
     * @return BlhAnalisisMicrobiologico
     */
    public function setControl($control)
    {
        $this->control = $control;
    
        return $this;
    }

    /**
     * Get control
     *
     * @return string 
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set situacion
     *
     * @param string $situacion
     * @return BlhAnalisisMicrobiologico
     */
    public function setSituacion($situacion)
    {
        $this->situacion = $situacion;
    
        return $this;
    }

    /**
     * Get situacion
     *
     * @return string 
     */
    public function getSituacion()
    {
        return $this->situacion;
    }

    /**
     * Set idFrascoProcesado
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhFrascoProcesado $idFrascoProcesado
     * @return BlhAnalisisMicrobiologico
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