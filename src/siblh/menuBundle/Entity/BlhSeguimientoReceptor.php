<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhSeguimientoReceptor
 */
class BlhSeguimientoReceptor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $tallaReceptor;

    /**
     * @var float
     */
    private $pesoSeguimiento;

    /**
     * @var float
     */
    private $pcSeguimiento;

    /**
     * @var float
     */
    private $gananciaDiaPeso;

    /**
     * @var integer
     */
    private $semana;

    /**
     * @var \DateTime
     */
    private $fechaSeguimiento;

    /**
     * @var float
     */
    private $gananciaDiaTalla;

    /**
     * @var string
     */
    private $complicaciones;

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
     * Set tallaReceptor
     *
     * @param float $tallaReceptor
     * @return BlhSeguimientoReceptor
     */
    public function setTallaReceptor($tallaReceptor)
    {
        $this->tallaReceptor = $tallaReceptor;
    
        return $this;
    }

    /**
     * Get tallaReceptor
     *
     * @return float 
     */
    public function getTallaReceptor()
    {
        return $this->tallaReceptor;
    }

    /**
     * Set pesoSeguimiento
     *
     * @param float $pesoSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setPesoSeguimiento($pesoSeguimiento)
    {
        $this->pesoSeguimiento = $pesoSeguimiento;
    
        return $this;
    }

    /**
     * Get pesoSeguimiento
     *
     * @return float 
     */
    public function getPesoSeguimiento()
    {
        return $this->pesoSeguimiento;
    }

    /**
     * Set pcSeguimiento
     *
     * @param float $pcSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setPcSeguimiento($pcSeguimiento)
    {
        $this->pcSeguimiento = $pcSeguimiento;
    
        return $this;
    }

    /**
     * Get pcSeguimiento
     *
     * @return float 
     */
    public function getPcSeguimiento()
    {
        return $this->pcSeguimiento;
    }

    /**
     * Set gananciaDiaPeso
     *
     * @param float $gananciaDiaPeso
     * @return BlhSeguimientoReceptor
     */
    public function setGananciaDiaPeso($gananciaDiaPeso)
    {
        $this->gananciaDiaPeso = $gananciaDiaPeso;
    
        return $this;
    }

    /**
     * Get gananciaDiaPeso
     *
     * @return float 
     */
    public function getGananciaDiaPeso()
    {
        return $this->gananciaDiaPeso;
    }

    /**
     * Set semana
     *
     * @param integer $semana
     * @return BlhSeguimientoReceptor
     */
    public function setSemana($semana)
    {
        $this->semana = $semana;
    
        return $this;
    }

    /**
     * Get semana
     *
     * @return integer 
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * Set fechaSeguimiento
     *
     * @param \DateTime $fechaSeguimiento
     * @return BlhSeguimientoReceptor
     */
    public function setFechaSeguimiento($fechaSeguimiento)
    {
        $this->fechaSeguimiento = $fechaSeguimiento;
    
        return $this;
    }

    /**
     * Get fechaSeguimiento
     *
     * @return \DateTime 
     */
    public function getFechaSeguimiento()
    {
        return $this->fechaSeguimiento;
    }

    /**
     * Set gananciaDiaTalla
     *
     * @param float $gananciaDiaTalla
     * @return BlhSeguimientoReceptor
     */
    public function setGananciaDiaTalla($gananciaDiaTalla)
    {
        $this->gananciaDiaTalla = $gananciaDiaTalla;
    
        return $this;
    }

    /**
     * Get gananciaDiaTalla
     *
     * @return float 
     */
    public function getGananciaDiaTalla()
    {
        return $this->gananciaDiaTalla;
    }

    /**
     * Set complicaciones
     *
     * @param string $complicaciones
     * @return BlhSeguimientoReceptor
     */
    public function setComplicaciones($complicaciones)
    {
        $this->complicaciones = $complicaciones;
    
        return $this;
    }

    /**
     * Get complicaciones
     *
     * @return string 
     */
    public function getComplicaciones()
    {
        return $this->complicaciones;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\menuBundle\Entity\BlhReceptor $idReceptor
     * @return BlhSeguimientoReceptor
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
