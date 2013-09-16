<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhReceptor
 */
class BlhReceptor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoReceptor;

    /**
     * @var \DateTime
     */
    private $fechaRegistroBlh;

    /**
     * @var string
     */
    private $procedencia;

    /**
     * @var string
     */
    private $estadoReceptor;

    /**
     * @var integer
     */
    private $edadDias;

    /**
     * @var \siblh\menuBundle\Entity\BlhBancoDeLeche
     */
    private $idBancoDeLeche;

    /**
     * @var \siblh\menuBundle\Entity\MntPaciente
     */
    private $idPaciente;


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
     * Set codigoReceptor
     *
     * @param string $codigoReceptor
     * @return BlhReceptor
     */
    public function setCodigoReceptor($codigoReceptor)
    {
        $this->codigoReceptor = $codigoReceptor;
    
        return $this;
    }

    /**
     * Get codigoReceptor
     *
     * @return string 
     */
    public function getCodigoReceptor()
    {
        return $this->codigoReceptor;
    }

    /**
     * Set fechaRegistroBlh
     *
     * @param \DateTime $fechaRegistroBlh
     * @return BlhReceptor
     */
    public function setFechaRegistroBlh($fechaRegistroBlh)
    {
        $this->fechaRegistroBlh = $fechaRegistroBlh;
    
        return $this;
    }

    /**
     * Get fechaRegistroBlh
     *
     * @return \DateTime 
     */
    public function getFechaRegistroBlh()
    {
        return $this->fechaRegistroBlh;
    }

    /**
     * Set procedencia
     *
     * @param string $procedencia
     * @return BlhReceptor
     */
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;
    
        return $this;
    }

    /**
     * Get procedencia
     *
     * @return string 
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set estadoReceptor
     *
     * @param string $estadoReceptor
     * @return BlhReceptor
     */
    public function setEstadoReceptor($estadoReceptor)
    {
        $this->estadoReceptor = $estadoReceptor;
    
        return $this;
    }

    /**
     * Get estadoReceptor
     *
     * @return string 
     */
    public function getEstadoReceptor()
    {
        return $this->estadoReceptor;
    }

    /**
     * Set edadDias
     *
     * @param integer $edadDias
     * @return BlhReceptor
     */
    public function setEdadDias($edadDias)
    {
        $this->edadDias = $edadDias;
    
        return $this;
    }

    /**
     * Get edadDias
     *
     * @return integer 
     */
    public function getEdadDias()
    {
        return $this->edadDias;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhReceptor
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
     * Set idPaciente
     *
     * @param \siblh\menuBundle\Entity\MntPaciente $idPaciente
     * @return BlhReceptor
     */
    public function setIdPaciente(\siblh\menuBundle\Entity\MntPaciente $idPaciente = null)
    {
        $this->idPaciente = $idPaciente;
    
        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return \siblh\menuBundle\Entity\MntPaciente 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
}
