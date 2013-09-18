<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhHistoriaActual
 */
class BlhHistoriaActual
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $pesoDonante;

    /**
     * @var float
     */
    private $tallaDonante;

    /**
     * @var string
     */
    private $medicamento;

    /**
     * @var string
     */
    private $habitoToxico;

    /**
     * @var string
     */
    private $motivoDonacion;

    /**
     * @var string
     */
    private $patologiaDonante;

    /**
     * @var float
     */
    private $imc;

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
     * Set pesoDonante
     *
     * @param float $pesoDonante
     * @return BlhHistoriaActual
     */
    public function setPesoDonante($pesoDonante)
    {
        $this->pesoDonante = $pesoDonante;
    
        return $this;
    }

    /**
     * Get pesoDonante
     *
     * @return float 
     */
    public function getPesoDonante()
    {
        return $this->pesoDonante;
    }

    /**
     * Set tallaDonante
     *
     * @param float $tallaDonante
     * @return BlhHistoriaActual
     */
    public function setTallaDonante($tallaDonante)
    {
        $this->tallaDonante = $tallaDonante;
    
        return $this;
    }

    /**
     * Get tallaDonante
     *
     * @return float 
     */
    public function getTallaDonante()
    {
        return $this->tallaDonante;
    }

    /**
     * Set medicamento
     *
     * @param string $medicamento
     * @return BlhHistoriaActual
     */
    public function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    
        return $this;
    }

    /**
     * Get medicamento
     *
     * @return string 
     */
    public function getMedicamento()
    {
        return $this->medicamento;
    }

    /**
     * Set habitoToxico
     *
     * @param string $habitoToxico
     * @return BlhHistoriaActual
     */
    public function setHabitoToxico($habitoToxico)
    {
        $this->habitoToxico = $habitoToxico;
    
        return $this;
    }

    /**
     * Get habitoToxico
     *
     * @return string 
     */
    public function getHabitoToxico()
    {
        return $this->habitoToxico;
    }

    /**
     * Set motivoDonacion
     *
     * @param string $motivoDonacion
     * @return BlhHistoriaActual
     */
    public function setMotivoDonacion($motivoDonacion)
    {
        $this->motivoDonacion = $motivoDonacion;
    
        return $this;
    }

    /**
     * Get motivoDonacion
     *
     * @return string 
     */
    public function getMotivoDonacion()
    {
        return $this->motivoDonacion;
    }

    /**
     * Set patologiaDonante
     *
     * @param string $patologiaDonante
     * @return BlhHistoriaActual
     */
    public function setPatologiaDonante($patologiaDonante)
    {
        $this->patologiaDonante = $patologiaDonante;
    
        return $this;
    }

    /**
     * Get patologiaDonante
     *
     * @return string 
     */
    public function getPatologiaDonante()
    {
        return $this->patologiaDonante;
    }

    /**
     * Set imc
     *
     * @param float $imc
     * @return BlhHistoriaActual
     */
    public function setImc($imc)
    {
        $this->imc = $imc;
    
        return $this;
    }

    /**
     * Get imc
     *
     * @return float 
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhHistoriaActual
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
