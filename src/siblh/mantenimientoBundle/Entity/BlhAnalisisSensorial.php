<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisSensorial
 *
 * @ORM\Table(name="blh_analisis_sensorial")
 * @ORM\Entity
 */
class BlhAnalisisSensorial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_analisis_sensorial_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo__analisis_fisico_quimico", type="string", length=13, nullable=false)
     */
    private $codigoAnalisisFisicoQuimico;

    /**
     * @var string
     *
     * @ORM\Column(name="embalaje", type="string", length=9, nullable=true)
     */
    private $embalaje;

    /**
     * @var string
     *
     * @ORM\Column(name="suciedad", type="string", length=9, nullable=true)
     */
    private $suciedad;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=9, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="flavor", type="string", length=9, nullable=true)
     */
    private $flavor;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=30, nullable=true)
     */
    private $observacion;

    /**
     * @var \BlhAnalisisFisicoQuimico
     *
     * @ORM\ManyToOne(targetEntity="BlhAnalisisFisicoQuimico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_analisis_fisico_quimico", referencedColumnName="id")
     * })
     */
    private $idAnalisisFisicoQuimico;



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
     * Set codigoAnalisisFisicoQuimico
     *
     * @param string $codigoAnalisisFisicoQuimico
     * @return BlhAnalisisSensorial
     */
    public function setCodigoAnalisisFisicoQuimico($codigoAnalisisFisicoQuimico)
    {
        $this->codigoAnalisisFisicoQuimico = $codigoAnalisisFisicoQuimico;
    
        return $this;
    }

    /**
     * Get codigoAnalisisFisicoQuimico
     *
     * @return string 
     */
    public function getCodigoAnalisisFisicoQuimico()
    {
        return $this->codigoAnalisisFisicoQuimico;
    }

    /**
     * Set embalaje
     *
     * @param string $embalaje
     * @return BlhAnalisisSensorial
     */
    public function setEmbalaje($embalaje)
    {
        $this->embalaje = $embalaje;
    
        return $this;
    }

    /**
     * Get embalaje
     *
     * @return string 
     */
    public function getEmbalaje()
    {
        return $this->embalaje;
    }

    /**
     * Set suciedad
     *
     * @param string $suciedad
     * @return BlhAnalisisSensorial
     */
    public function setSuciedad($suciedad)
    {
        $this->suciedad = $suciedad;
    
        return $this;
    }

    /**
     * Get suciedad
     *
     * @return string 
     */
    public function getSuciedad()
    {
        return $this->suciedad;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return BlhAnalisisSensorial
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set flavor
     *
     * @param string $flavor
     * @return BlhAnalisisSensorial
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;
    
        return $this;
    }

    /**
     * Get flavor
     *
     * @return string 
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return BlhAnalisisSensorial
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
     * Set idAnalisisFisicoQuimico
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhAnalisisFisicoQuimico $idAnalisisFisicoQuimico
     * @return BlhAnalisisSensorial
     */
    public function setIdAnalisisFisicoQuimico(\siblh\mantenimientoBundle\Entity\BlhAnalisisFisicoQuimico $idAnalisisFisicoQuimico = null)
    {
        $this->idAnalisisFisicoQuimico = $idAnalisisFisicoQuimico;
    
        return $this;
    }

    /**
     * Get idAnalisisFisicoQuimico
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhAnalisisFisicoQuimico 
     */
    public function getIdAnalisisFisicoQuimico()
    {
        return $this->idAnalisisFisicoQuimico;
    }
}