<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhGrupoSolicitud
 */
class BlhGrupoSolicitud
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoGrupoSolicitud;


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
}
