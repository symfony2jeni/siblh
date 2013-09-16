<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhSolicitud
 */
class BlhSolicitud
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoSolicitud;

    /**
     * @var float
     */
    private $volumenPorDia;

    /**
     * @var string
     */
    private $acidezNecesaria;

    /**
     * @var string
     */
    private $caloriasNecesarias;

    /**
     * @var float
     */
    private $pesoDia;

    /**
     * @var float
     */
    private $volumenPorToma;

    /**
     * @var integer
     */
    private $tomaPorDia;

    /**
     * @var \DateTime
     */
    private $fechaSolicitud;

    /**
     * @var integer
     */
    private $cuna;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $responsable;

    /**
     * @var \siblh\menuBundle\Entity\BlhGrupoSolicitud
     */
    private $idGrupoSolicitud;

    /**
     * @var \siblh\menuBundle\Entity\BlhReceptor
     */
    private $idReceptor;


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
     * Set codigoSolicitud
     *
     * @param string $codigoSolicitud
     * @return BlhSolicitud
     */
    public function setCodigoSolicitud($codigoSolicitud)
    {
        $this->codigoSolicitud = $codigoSolicitud;
    
        return $this;
    }

    /**
     * Get codigoSolicitud
     *
     * @return string 
     */
    public function getCodigoSolicitud()
    {
        return $this->codigoSolicitud;
    }

    /**
     * Set volumenPorDia
     *
     * @param float $volumenPorDia
     * @return BlhSolicitud
     */
    public function setVolumenPorDia($volumenPorDia)
    {
        $this->volumenPorDia = $volumenPorDia;
    
        return $this;
    }

    /**
     * Get volumenPorDia
     *
     * @return float 
     */
    public function getVolumenPorDia()
    {
        return $this->volumenPorDia;
    }

    /**
     * Set acidezNecesaria
     *
     * @param string $acidezNecesaria
     * @return BlhSolicitud
     */
    public function setAcidezNecesaria($acidezNecesaria)
    {
        $this->acidezNecesaria = $acidezNecesaria;
    
        return $this;
    }

    /**
     * Get acidezNecesaria
     *
     * @return string 
     */
    public function getAcidezNecesaria()
    {
        return $this->acidezNecesaria;
    }

    /**
     * Set caloriasNecesarias
     *
     * @param string $caloriasNecesarias
     * @return BlhSolicitud
     */
    public function setCaloriasNecesarias($caloriasNecesarias)
    {
        $this->caloriasNecesarias = $caloriasNecesarias;
    
        return $this;
    }

    /**
     * Get caloriasNecesarias
     *
     * @return string 
     */
    public function getCaloriasNecesarias()
    {
        return $this->caloriasNecesarias;
    }

    /**
     * Set pesoDia
     *
     * @param float $pesoDia
     * @return BlhSolicitud
     */
    public function setPesoDia($pesoDia)
    {
        $this->pesoDia = $pesoDia;
    
        return $this;
    }

    /**
     * Get pesoDia
     *
     * @return float 
     */
    public function getPesoDia()
    {
        return $this->pesoDia;
    }

    /**
     * Set volumenPorToma
     *
     * @param float $volumenPorToma
     * @return BlhSolicitud
     */
    public function setVolumenPorToma($volumenPorToma)
    {
        $this->volumenPorToma = $volumenPorToma;
    
        return $this;
    }

    /**
     * Get volumenPorToma
     *
     * @return float 
     */
    public function getVolumenPorToma()
    {
        return $this->volumenPorToma;
    }

    /**
     * Set tomaPorDia
     *
     * @param integer $tomaPorDia
     * @return BlhSolicitud
     */
    public function setTomaPorDia($tomaPorDia)
    {
        $this->tomaPorDia = $tomaPorDia;
    
        return $this;
    }

    /**
     * Get tomaPorDia
     *
     * @return integer 
     */
    public function getTomaPorDia()
    {
        return $this->tomaPorDia;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return BlhSolicitud
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;
    
        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set cuna
     *
     * @param integer $cuna
     * @return BlhSolicitud
     */
    public function setCuna($cuna)
    {
        $this->cuna = $cuna;
    
        return $this;
    }

    /**
     * Get cuna
     *
     * @return integer 
     */
    public function getCuna()
    {
        return $this->cuna;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return BlhSolicitud
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     * @return BlhSolicitud
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    
        return $this;
    }

    /**
     * Get responsable
     *
     * @return string 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set idGrupoSolicitud
     *
     * @param \siblh\menuBundle\Entity\BlhGrupoSolicitud $idGrupoSolicitud
     * @return BlhSolicitud
     */
    public function setIdGrupoSolicitud(\siblh\menuBundle\Entity\BlhGrupoSolicitud $idGrupoSolicitud = null)
    {
        $this->idGrupoSolicitud = $idGrupoSolicitud;
    
        return $this;
    }

    /**
     * Get idGrupoSolicitud
     *
     * @return \siblh\menuBundle\Entity\BlhGrupoSolicitud 
     */
    public function getIdGrupoSolicitud()
    {
        return $this->idGrupoSolicitud;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\menuBundle\Entity\BlhReceptor $idReceptor
     * @return BlhSolicitud
     */
    public function setIdReceptor(\siblh\menuBundle\Entity\BlhReceptor $idReceptor = null)
    {
        $this->idReceptor = $idReceptor;
    
        return $this;
    }

    /**
     * Get idReceptor
     *
     * @return \siblh\menuBundle\Entity\BlhReceptor 
     */
    public function getIdReceptor()
    {
        return $this->idReceptor;
    }
}
