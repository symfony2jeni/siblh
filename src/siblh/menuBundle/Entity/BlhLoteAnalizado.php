<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhLoteAnalizado
 */
class BlhLoteAnalizado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoLoteAnalizado;

    /**
     * @var \DateTime
     */
    private $fechaAnalisisFisicoQuimico;


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
     * Set codigoLoteAnalizado
     *
     * @param string $codigoLoteAnalizado
     * @return BlhLoteAnalizado
     */
    public function setCodigoLoteAnalizado($codigoLoteAnalizado)
    {
        $this->codigoLoteAnalizado = $codigoLoteAnalizado;
    
        return $this;
    }

    /**
     * Get codigoLoteAnalizado
     *
     * @return string 
     */
    public function getCodigoLoteAnalizado()
    {
        return $this->codigoLoteAnalizado;
    }

    /**
     * Set fechaAnalisisFisicoQuimico
     *
     * @param \DateTime $fechaAnalisisFisicoQuimico
     * @return BlhLoteAnalizado
     */
    public function setFechaAnalisisFisicoQuimico($fechaAnalisisFisicoQuimico)
    {
        $this->fechaAnalisisFisicoQuimico = $fechaAnalisisFisicoQuimico;
    
        return $this;
    }

    /**
     * Get fechaAnalisisFisicoQuimico
     *
     * @return \DateTime 
     */
    public function getFechaAnalisisFisicoQuimico()
    {
        return $this->fechaAnalisisFisicoQuimico;
    }
}
