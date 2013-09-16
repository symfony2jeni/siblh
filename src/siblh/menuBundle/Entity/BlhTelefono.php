<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTelefono
 */
class BlhTelefono
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numeroDeTelefono;

    /**
     * @var \siblh\menuBundle\Entity\BlhDonante
     */
    private $idDonante;


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
     * Set numeroDeTelefono
     *
     * @param string $numeroDeTelefono
     * @return BlhTelefono
     */
    public function setNumeroDeTelefono($numeroDeTelefono)
    {
        $this->numeroDeTelefono = $numeroDeTelefono;
    
        return $this;
    }

    /**
     * Get numeroDeTelefono
     *
     * @return string 
     */
    public function getNumeroDeTelefono()
    {
        return $this->numeroDeTelefono;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhTelefono
     */
    public function setIdDonante(\siblh\menuBundle\Entity\BlhDonante $idDonante = null)
    {
        $this->idDonante = $idDonante;
    
        return $this;
    }

    /**
     * Get idDonante
     *
     * @return \siblh\menuBundle\Entity\BlhDonante 
     */
    public function getIdDonante()
    {
        return $this->idDonante;
    }
}
