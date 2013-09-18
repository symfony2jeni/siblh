<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhInformacionPublica
 */
class BlhInformacionPublica
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $documento;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $nombreDocumento;

    /**
     * @var \DateTime
     */
    private $fechaPublicacion;

    /**
     * @var \siblh\menuBundle\Entity\BlhBancoDeLeche
     */
    private $idBancoDeLeche;


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
     * Set documento
     *
     * @param string $documento
     * @return BlhInformacionPublica
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    
        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return BlhInformacionPublica
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombreDocumento
     *
     * @param string $nombreDocumento
     * @return BlhInformacionPublica
     */
    public function setNombreDocumento($nombreDocumento)
    {
        $this->nombreDocumento = $nombreDocumento;
    
        return $this;
    }

    /**
     * Get nombreDocumento
     *
     * @return string 
     */
    public function getNombreDocumento()
    {
        return $this->nombreDocumento;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return BlhInformacionPublica
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    
        return $this;
    }

    /**
     * Get fechaPublicacion
     *
     * @return \DateTime 
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhInformacionPublica
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
}
