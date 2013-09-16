<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTemperaturaEnfriamiento
 */
class BlhTemperaturaEnfriamiento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $temperaturaE;

    /**
     * @var \siblh\menuBundle\Entity\BlhPasteurizacion
     */
    private $idPasteurizacion;


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
     * Set temperaturaE
     *
     * @param integer $temperaturaE
     * @return BlhTemperaturaEnfriamiento
     */
    public function setTemperaturaE($temperaturaE)
    {
        $this->temperaturaE = $temperaturaE;
    
        return $this;
    }

    /**
     * Get temperaturaE
     *
     * @return integer 
     */
    public function getTemperaturaE()
    {
        return $this->temperaturaE;
    }

    /**
     * Set idPasteurizacion
     *
     * @param \siblh\menuBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhTemperaturaEnfriamiento
     */
    public function setIdPasteurizacion(\siblh\menuBundle\Entity\BlhPasteurizacion $idPasteurizacion = null)
    {
        $this->idPasteurizacion = $idPasteurizacion;
    
        return $this;
    }

    /**
     * Get idPasteurizacion
     *
     * @return \siblh\menuBundle\Entity\BlhPasteurizacion 
     */
    public function getIdPasteurizacion()
    {
        return $this->idPasteurizacion;
    }
}
