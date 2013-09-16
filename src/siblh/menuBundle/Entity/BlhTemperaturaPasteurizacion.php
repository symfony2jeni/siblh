<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTemperaturaPasteurizacion
 */
class BlhTemperaturaPasteurizacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $temperaturaP;

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
     * Set temperaturaP
     *
     * @param integer $temperaturaP
     * @return BlhTemperaturaPasteurizacion
     */
    public function setTemperaturaP($temperaturaP)
    {
        $this->temperaturaP = $temperaturaP;
    
        return $this;
    }

    /**
     * Get temperaturaP
     *
     * @return integer 
     */
    public function getTemperaturaP()
    {
        return $this->temperaturaP;
    }

    /**
     * Set idPasteurizacion
     *
     * @param \siblh\menuBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhTemperaturaPasteurizacion
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
