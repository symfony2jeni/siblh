<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhEstado
 *
 * @ORM\Table(name="blh_estado")
 * @ORM\Entity
 */
class BlhEstado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_estado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_estado", type="string", length=13, nullable=false)
     */
    private $nombreEstado;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;



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
     * Set nombreEstado
     *
     * @param string $nombreEstado
     * @return BlhEstado
     */
    public function setNombreEstado($nombreEstado)
    {
        $this->nombreEstado = $nombreEstado;
    
        return $this;
    }

    /**
     * Get nombreEstado
     *
     * @return string 
     */
    public function getNombreEstado()
    {
        return $this->nombreEstado;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhEstado
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
  public function __toString()
    {
       return $this->nombreEstado;
    }
}