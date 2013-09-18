<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisSensorial
 */
class BlhAnalisisSensorial
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoAnalisisFisicoQuimico;

    /**
     * @var string
     */
    private $embalaje;

    /**
     * @var string
     */
    private $suciedad;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $flavor;

    /**
     * @var string
     */
    private $observacion;

    /**
     * @var \siblh\menuBundle\Entity\BlhAnalisisFisicoQuimico
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
     * @param \siblh\menuBundle\Entity\BlhAnalisisFisicoQuimico $idAnalisisFisicoQuimico
     * @return BlhAnalisisSensorial
     */
    public function setIdAnalisisFisicoQuimico(\siblh\menuBundle\Entity\BlhAnalisisFisicoQuimico $idAnalisisFisicoQuimico = null)
    {
        $this->idAnalisisFisicoQuimico = $idAnalisisFisicoQuimico;
    
        return $this;
    }

    /**
     * Get idAnalisisFisicoQuimico
     *
     * @return \siblh\menuBundle\Entity\BlhAnalisisFisicoQuimico 
     */
    public function getIdAnalisisFisicoQuimico()
    {
        return $this->idAnalisisFisicoQuimico;
    }
}
