<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhCurva
 */
class BlhCurva
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $tiempo1;

    /**
     * @var float
     */
    private $tiempo2;

    /**
     * @var float
     */
    private $tiempo3;

    /**
     * @var float
     */
    private $valorCurva;

    /**
     * @var \DateTime
     */
    private $fechaCurva;

    /**
     * @var integer
     */
    private $cantidadFrascos;

    /**
     * @var float
     */
    private $volumenPorFrasco;

    /**
     * @var \DateTime
     */
    private $horaInicioCurva;


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
     * Set tiempo1
     *
     * @param float $tiempo1
     * @return BlhCurva
     */
    public function setTiempo1($tiempo1)
    {
        $this->tiempo1 = $tiempo1;
    
        return $this;
    }

    /**
     * Get tiempo1
     *
     * @return float 
     */
    public function getTiempo1()
    {
        return $this->tiempo1;
    }

    /**
     * Set tiempo2
     *
     * @param float $tiempo2
     * @return BlhCurva
     */
    public function setTiempo2($tiempo2)
    {
        $this->tiempo2 = $tiempo2;
    
        return $this;
    }

    /**
     * Get tiempo2
     *
     * @return float 
     */
    public function getTiempo2()
    {
        return $this->tiempo2;
    }

    /**
     * Set tiempo3
     *
     * @param float $tiempo3
     * @return BlhCurva
     */
    public function setTiempo3($tiempo3)
    {
        $this->tiempo3 = $tiempo3;
    
        return $this;
    }

    /**
     * Get tiempo3
     *
     * @return float 
     */
    public function getTiempo3()
    {
        return $this->tiempo3;
    }

    /**
     * Set valorCurva
     *
     * @param float $valorCurva
     * @return BlhCurva
     */
    public function setValorCurva($valorCurva)
    {
        $this->valorCurva = $valorCurva;
    
        return $this;
    }

    /**
     * Get valorCurva
     *
     * @return float 
     */
    public function getValorCurva()
    {
        return $this->valorCurva;
    }

    /**
     * Set fechaCurva
     *
     * @param \DateTime $fechaCurva
     * @return BlhCurva
     */
    public function setFechaCurva($fechaCurva)
    {
        $this->fechaCurva = $fechaCurva;
    
        return $this;
    }

    /**
     * Get fechaCurva
     *
     * @return \DateTime 
     */
    public function getFechaCurva()
    {
        return $this->fechaCurva;
    }

    /**
     * Set cantidadFrascos
     *
     * @param integer $cantidadFrascos
     * @return BlhCurva
     */
    public function setCantidadFrascos($cantidadFrascos)
    {
        $this->cantidadFrascos = $cantidadFrascos;
    
        return $this;
    }

    /**
     * Get cantidadFrascos
     *
     * @return integer 
     */
    public function getCantidadFrascos()
    {
        return $this->cantidadFrascos;
    }

    /**
     * Set volumenPorFrasco
     *
     * @param float $volumenPorFrasco
     * @return BlhCurva
     */
    public function setVolumenPorFrasco($volumenPorFrasco)
    {
        $this->volumenPorFrasco = $volumenPorFrasco;
    
        return $this;
    }

    /**
     * Get volumenPorFrasco
     *
     * @return float 
     */
    public function getVolumenPorFrasco()
    {
        return $this->volumenPorFrasco;
    }

    /**
     * Set horaInicioCurva
     *
     * @param \DateTime $horaInicioCurva
     * @return BlhCurva
     */
    public function setHoraInicioCurva($horaInicioCurva)
    {
        $this->horaInicioCurva = $horaInicioCurva;
    
        return $this;
    }

    /**
     * Get horaInicioCurva
     *
     * @return \DateTime 
     */
    public function getHoraInicioCurva()
    {
        return $this->horaInicioCurva;
    }
}