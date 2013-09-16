<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhEgresoReceptor
 */
class BlhEgresoReceptor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $diagnosticoEgreso;

    /**
     * @var string
     */
    private $madreCanguro;

    /**
     * @var string
     */
    private $tipoEgreso;

    /**
     * @var string
     */
    private $comentarioEgreso;

    /**
     * @var string
     */
    private $trasladoPeriferico;

    /**
     * @var integer
     */
    private $permanenciaUcin;

    /**
     * @var string
     */
    private $hospitalSeguimientoEgreso;

    /**
     * @var \DateTime
     */
    private $fechaEgreso;

    /**
     * @var integer
     */
    private $estanciaHospitalaria;

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
     * Set diagnosticoEgreso
     *
     * @param string $diagnosticoEgreso
     * @return BlhEgresoReceptor
     */
    public function setDiagnosticoEgreso($diagnosticoEgreso)
    {
        $this->diagnosticoEgreso = $diagnosticoEgreso;
    
        return $this;
    }

    /**
     * Get diagnosticoEgreso
     *
     * @return string 
     */
    public function getDiagnosticoEgreso()
    {
        return $this->diagnosticoEgreso;
    }

    /**
     * Set madreCanguro
     *
     * @param string $madreCanguro
     * @return BlhEgresoReceptor
     */
    public function setMadreCanguro($madreCanguro)
    {
        $this->madreCanguro = $madreCanguro;
    
        return $this;
    }

    /**
     * Get madreCanguro
     *
     * @return string 
     */
    public function getMadreCanguro()
    {
        return $this->madreCanguro;
    }

    /**
     * Set tipoEgreso
     *
     * @param string $tipoEgreso
     * @return BlhEgresoReceptor
     */
    public function setTipoEgreso($tipoEgreso)
    {
        $this->tipoEgreso = $tipoEgreso;
    
        return $this;
    }

    /**
     * Get tipoEgreso
     *
     * @return string 
     */
    public function getTipoEgreso()
    {
        return $this->tipoEgreso;
    }

    /**
     * Set comentarioEgreso
     *
     * @param string $comentarioEgreso
     * @return BlhEgresoReceptor
     */
    public function setComentarioEgreso($comentarioEgreso)
    {
        $this->comentarioEgreso = $comentarioEgreso;
    
        return $this;
    }

    /**
     * Get comentarioEgreso
     *
     * @return string 
     */
    public function getComentarioEgreso()
    {
        return $this->comentarioEgreso;
    }

    /**
     * Set trasladoPeriferico
     *
     * @param string $trasladoPeriferico
     * @return BlhEgresoReceptor
     */
    public function setTrasladoPeriferico($trasladoPeriferico)
    {
        $this->trasladoPeriferico = $trasladoPeriferico;
    
        return $this;
    }

    /**
     * Get trasladoPeriferico
     *
     * @return string 
     */
    public function getTrasladoPeriferico()
    {
        return $this->trasladoPeriferico;
    }

    /**
     * Set permanenciaUcin
     *
     * @param integer $permanenciaUcin
     * @return BlhEgresoReceptor
     */
    public function setPermanenciaUcin($permanenciaUcin)
    {
        $this->permanenciaUcin = $permanenciaUcin;
    
        return $this;
    }

    /**
     * Get permanenciaUcin
     *
     * @return integer 
     */
    public function getPermanenciaUcin()
    {
        return $this->permanenciaUcin;
    }

    /**
     * Set hospitalSeguimientoEgreso
     *
     * @param string $hospitalSeguimientoEgreso
     * @return BlhEgresoReceptor
     */
    public function setHospitalSeguimientoEgreso($hospitalSeguimientoEgreso)
    {
        $this->hospitalSeguimientoEgreso = $hospitalSeguimientoEgreso;
    
        return $this;
    }

    /**
     * Get hospitalSeguimientoEgreso
     *
     * @return string 
     */
    public function getHospitalSeguimientoEgreso()
    {
        return $this->hospitalSeguimientoEgreso;
    }

    /**
     * Set fechaEgreso
     *
     * @param \DateTime $fechaEgreso
     * @return BlhEgresoReceptor
     */
    public function setFechaEgreso($fechaEgreso)
    {
        $this->fechaEgreso = $fechaEgreso;
    
        return $this;
    }

    /**
     * Get fechaEgreso
     *
     * @return \DateTime 
     */
    public function getFechaEgreso()
    {
        return $this->fechaEgreso;
    }

    /**
     * Set estanciaHospitalaria
     *
     * @param integer $estanciaHospitalaria
     * @return BlhEgresoReceptor
     */
    public function setEstanciaHospitalaria($estanciaHospitalaria)
    {
        $this->estanciaHospitalaria = $estanciaHospitalaria;
    
        return $this;
    }

    /**
     * Get estanciaHospitalaria
     *
     * @return integer 
     */
    public function getEstanciaHospitalaria()
    {
        return $this->estanciaHospitalaria;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\menuBundle\Entity\BlhReceptor $idReceptor
     * @return BlhEgresoReceptor
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
