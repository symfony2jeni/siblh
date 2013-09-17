<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhBitacora
 *
 * @ORM\Table(name="blh_bitacora")
 * @ORM\Entity
 */
class BlhBitacora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_bitacora_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_accion", type="date", nullable=false)
     */
    private $fechaAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=14, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=30, nullable=false)
     */
    private $tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=20, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=10, nullable=false)
     */
    private $accion;



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
     * Set fechaAccion
     *
     * @param \DateTime $fechaAccion
     * @return BlhBitacora
     */
    public function setFechaAccion($fechaAccion)
    {
        $this->fechaAccion = $fechaAccion;
    
        return $this;
    }

    /**
     * Get fechaAccion
     *
     * @return \DateTime 
     */
    public function getFechaAccion()
    {
        return $this->fechaAccion;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return BlhBitacora
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set tabla
     *
     * @param string $tabla
     * @return BlhBitacora
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    
        return $this;
    }

    /**
     * Get tabla
     *
     * @return string 
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return BlhBitacora
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set accion
     *
     * @param string $accion
     * @return BlhBitacora
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;
    
        return $this;
    }

    /**
     * Get accion
     *
     * @return string 
     */
    public function getAccion()
    {
        return $this->accion;
    }
}