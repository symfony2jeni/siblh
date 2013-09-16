<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisFisicoQuimico
 */
class BlhAnalisisFisicoQuimico
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
     * @var \DateTime
     */
    private $fechaAnalisisFisicoQuimico;

    /**
     * @var string
     */
    private $responsableAnalisis;

    /**
     * @var \siblh\menuBundle\Entity\BlhFrascoRecolectado
     */
    private $idFrascoRecolectado;


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
     * @return BlhAnalisisFisicoQuimico
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
     * Set fechaAnalisisFisicoQuimico
     *
     * @param \DateTime $fechaAnalisisFisicoQuimico
     * @return BlhAnalisisFisicoQuimico
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

    /**
     * Set responsableAnalisis
     *
     * @param string $responsableAnalisis
     * @return BlhAnalisisFisicoQuimico
     */
    public function setResponsableAnalisis($responsableAnalisis)
    {
        $this->responsableAnalisis = $responsableAnalisis;
    
        return $this;
    }

    /**
     * Get responsableAnalisis
     *
     * @return string 
     */
    public function getResponsableAnalisis()
    {
        return $this->responsableAnalisis;
    }

    /**
     * Set idFrascoRecolectado
     *
     * @param \siblh\menuBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado
     * @return BlhAnalisisFisicoQuimico
     */
    public function setIdFrascoRecolectado(\siblh\menuBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado = null)
    {
        $this->idFrascoRecolectado = $idFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get idFrascoRecolectado
     *
     * @return \siblh\menuBundle\Entity\BlhFrascoRecolectado 
     */
    public function getIdFrascoRecolectado()
    {
        return $this->idFrascoRecolectado;
    }
}
