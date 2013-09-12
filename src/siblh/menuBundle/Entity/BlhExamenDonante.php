<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhExamenDonante
 */
class BlhExamenDonante
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $resultadoExamen;

    /**
     * @var \siblh\menuBundle\Entity\BlhDonante
     */
    private $idDonante;

    /**
     * @var \siblh\menuBundle\Entity\BlhExamen
     */
    private $idExamen;


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
     * Set resultadoExamen
     *
     * @param string $resultadoExamen
     * @return BlhExamenDonante
     */
    public function setResultadoExamen($resultadoExamen)
    {
        $this->resultadoExamen = $resultadoExamen;
    
        return $this;
    }

    /**
     * Get resultadoExamen
     *
     * @return string 
     */
    public function getResultadoExamen()
    {
        return $this->resultadoExamen;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\menuBundle\Entity\BlhDonante $idDonante
     * @return BlhExamenDonante
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

    /**
     * Set idExamen
     *
     * @param \siblh\menuBundle\Entity\BlhExamen $idExamen
     * @return BlhExamenDonante
     */
    public function setIdExamen(\siblh\menuBundle\Entity\BlhExamen $idExamen = null)
    {
        $this->idExamen = $idExamen;
    
        return $this;
    }

    /**
     * Get idExamen
     *
     * @return \siblh\menuBundle\Entity\BlhExamen 
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }
}
