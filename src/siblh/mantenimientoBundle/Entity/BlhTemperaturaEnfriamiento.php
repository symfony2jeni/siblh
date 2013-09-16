<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTemperaturaEnfriamiento
 *
 * @ORM\Table(name="blh_temperatura_enfriamiento")
 * @ORM\Entity
 */
class BlhTemperaturaEnfriamiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_temperatura_enfriamiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="temperatura_e", type="integer", nullable=false)
     */
    private $temperaturaE;

    /**
     * @var \BlhPasteurizacion
     *
     * @ORM\ManyToOne(targetEntity="BlhPasteurizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pasteurizacion", referencedColumnName="id")
     * })
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
     * @param \siblh\mantenimientoBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhTemperaturaEnfriamiento
     */
    public function setIdPasteurizacion(\siblh\mantenimientoBundle\Entity\BlhPasteurizacion $idPasteurizacion = null)
    {
        $this->idPasteurizacion = $idPasteurizacion;
    
        return $this;
    }

    /**
     * Get idPasteurizacion
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhPasteurizacion 
     */
    public function getIdPasteurizacion()
    {
        return $this->idPasteurizacion;
    }
}