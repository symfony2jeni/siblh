<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhGrupoSolicitud
 *
 * @ORM\Table(name="blh_grupo_solicitud")
 * @ORM\Entity
 */
class BlhGrupoSolicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_grupo_solicitud_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_grupo_solicitud", type="string", length=13, nullable=false)
     */
    private $codigoGrupoSolicitud;

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
     * Set codigoGrupoSolicitud
     *
     * @param string $codigoGrupoSolicitud
     * @return BlhGrupoSolicitud
     */
    public function setCodigoGrupoSolicitud($codigoGrupoSolicitud)
    {
        $this->codigoGrupoSolicitud = $codigoGrupoSolicitud;
    
        return $this;
    }

    /**
     * Get codigoGrupoSolicitud
     *
     * @return string 
     */
    public function getCodigoGrupoSolicitud()
    {
        return $this->codigoGrupoSolicitud;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhGrupoSolicitud
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
       return $this->codigoGrupoSolicitudo;
    }
}