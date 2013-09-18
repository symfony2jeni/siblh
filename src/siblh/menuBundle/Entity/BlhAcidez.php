<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAcidez
 */
class BlhAcidez
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
     * @var integer
     */
    private $acidez1;

    /**
     * @var integer
     */
    private $acidez2;

    /**
     * @var integer
     */
    private $acidez3;

    /**
     * @var float
     */
    private $factor;

    /**
     * @var float
     */
    private $resultado;

    /**
     * @var float
     */
    private $mediaAcidez;

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
     * @return BlhAcidez
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
     * Set acidez1
     *
     * @param integer $acidez1
     * @return BlhAcidez
     */
    public function setAcidez1($acidez1)
    {
        $this->acidez1 = $acidez1;
    
        return $this;
    }

    /**
     * Get acidez1
     *
     * @return integer 
     */
    public function getAcidez1()
    {
        return $this->acidez1;
    }

    /**
     * Set acidez2
     *
     * @param integer $acidez2
     * @return BlhAcidez
     */
    public function setAcidez2($acidez2)
    {
        $this->acidez2 = $acidez2;
    
        return $this;
    }

    /**
     * Get acidez2
     *
     * @return integer 
     */
    public function getAcidez2()
    {
        return $this->acidez2;
    }

    /**
     * Set acidez3
     *
     * @param integer $acidez3
     * @return BlhAcidez
     */
    public function setAcidez3($acidez3)
    {
        $this->acidez3 = $acidez3;
    
        return $this;
    }

    /**
     * Get acidez3
     *
     * @return integer 
     */
    public function getAcidez3()
    {
        return $this->acidez3;
    }

    /**
     * Set factor
     *
     * @param float $factor
     * @return BlhAcidez
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;
    
        return $this;
    }

    /**
     * Get factor
     *
     * @return float 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set resultado
     *
     * @param float $resultado
     * @return BlhAcidez
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    
        return $this;
    }

    /**
     * Get resultado
     *
     * @return float 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set mediaAcidez
     *
     * @param float $mediaAcidez
     * @return BlhAcidez
     */
    public function setMediaAcidez($mediaAcidez)
    {
        $this->mediaAcidez = $mediaAcidez;
    
        return $this;
    }

    /**
     * Get mediaAcidez
     *
     * @return float 
     */
    public function getMediaAcidez()
    {
        return $this->mediaAcidez;
    }

    /**
     * Set idAnalisisFisicoQuimico
     *
     * @param \siblh\menuBundle\Entity\BlhAnalisisFisicoQuimico $idAnalisisFisicoQuimico
     * @return BlhAcidez
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
