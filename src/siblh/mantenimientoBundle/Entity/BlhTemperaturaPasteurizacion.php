<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTemperaturaPasteurizacion
 *
 * @ORM\Table(name="blh_temperatura_pasteurizacion")
 * @ORM\Entity
 */
class BlhTemperaturaPasteurizacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_temperatura_pasteurizacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="temperatura_p", type="integer", nullable=false)
     */
    private $temperaturaP;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

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
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhTemperaturaPasteurizacion
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set idPasteurizacion
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhPasteurizacion $idPasteurizacion
     * @return BlhTemperaturaPasteurizacion
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