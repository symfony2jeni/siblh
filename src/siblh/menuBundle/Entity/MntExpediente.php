<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntExpediente
 */
class MntExpediente
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numero;

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
     * Set numero
     *
     * @param string $numero
     * @return MntExpediente
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set idPaciente
     *
     * @param \siblh\menuBundle\Entity\MntPaciente $idPaciente
     * @return MntExpediente
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
