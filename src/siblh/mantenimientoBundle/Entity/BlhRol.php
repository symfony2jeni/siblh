<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhRol
 *
 * @ORM\Table(name="blh_rol")
 * @ORM\Entity
 */
class BlhRol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_rol_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_rol", type="string", length=30, nullable=false)
     */
    private $nombreRol;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_rol", type="string", length=50, nullable=true)
     */
    private $descripcionRol;



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
     * Set nombreRol
     *
     * @param string $nombreRol
     * @return BlhRol
     */
    public function setNombreRol($nombreRol)
    {
        $this->nombreRol = $nombreRol;
    
        return $this;
    }

    /**
     * Get nombreRol
     *
     * @return string 
     */
    public function getNombreRol()
    {
        return $this->nombreRol;
    }

    /**
     * Set descripcionRol
     *
     * @param string $descripcionRol
     * @return BlhRol
     */
    public function setDescripcionRol($descripcionRol)
    {
        $this->descripcionRol = $descripcionRol;
    
        return $this;
    }

    /**
     * Get descripcionRol
     *
     * @return string 
     */
    public function getDescripcionRol()
    {
        return $this->descripcionRol;
    }
       public function __toString() {
            return $this->nombreRol;
        }
}