<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhBancoDeLeche
 */
class BlhBancoDeLeche
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoBancoDeLeche;

    /**
     * @var string
     */
    private $estadoBanco;

    /**
     * @var \siblh\menuBundle\Entity\CtlEstablecimiento
     */
    private $idEstablecimiento;


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
     * Set codigoBancoDeLeche
     *
     * @param string $codigoBancoDeLeche
     * @return BlhBancoDeLeche
     */
    public function setCodigoBancoDeLeche($codigoBancoDeLeche)
    {
        $this->codigoBancoDeLeche = $codigoBancoDeLeche;
    
        return $this;
    }

    /**
     * Get codigoBancoDeLeche
     *
     * @return string 
     */
    public function getCodigoBancoDeLeche()
    {
        return $this->codigoBancoDeLeche;
    }

    /**
     * Set estadoBanco
     *
     * @param string $estadoBanco
     * @return BlhBancoDeLeche
     */
    public function setEstadoBanco($estadoBanco)
    {
        $this->estadoBanco = $estadoBanco;
    
        return $this;
    }

    /**
     * Get estadoBanco
     *
     * @return string 
     */
    public function getEstadoBanco()
    {
        return $this->estadoBanco;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \siblh\menuBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return BlhBancoDeLeche
     */
    public function setIdEstablecimiento(\siblh\menuBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;
    
        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \siblh\menuBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }
}
