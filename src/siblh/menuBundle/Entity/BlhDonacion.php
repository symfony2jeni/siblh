<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhDonacion
 */
class BlhDonacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaDonacion;

    /**
     * @var string
     */
    private $responsableDonacion;

    /**
     * @var \siblh\menuBundle\Entity\BlhBancoDeLeche
     */
    private $idBancoDeLeche;

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
     * Set fechaDonacion
     *
     * @param \DateTime $fechaDonacion
     * @return BlhDonacion
     */
    public function setFechaDonacion($fechaDonacion)
    {
        $this->fechaDonacion = $fechaDonacion;
    
        return $this;
    }

    /**
     * Get fechaDonacion
     *
     * @return \DateTime 
     */
    public function getFechaDonacion()
    {
        return $this->fechaDonacion;
    }

    /**
     * Set responsableDonacion
     *
     * @param string $responsableDonacion
     * @return BlhDonacion
     */
    public function setResponsableDonacion($responsableDonacion)
    {
        $this->responsableDonacion = $responsableDonacion;
    
        return $this;
    }

    /**
     * Get responsableDonacion
     *
     * @return string 
     */
    public function getResponsableDonacion()
    {
        return $this->responsableDonacion;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhDonacion
     */
    public function setIdBancoDeLeche(\siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche = null)
    {
        $this->idBancoDeLeche = $idBancoDeLeche;
    
        return $this;
    }

    /**
     * Get idBancoDeLeche
     *
     * @return \siblh\menuBundle\Entity\BlhBancoDeLeche 
     */
    public function getIdBancoDeLeche()
    {
        return $this->idBancoDeLeche;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhDonacion
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
