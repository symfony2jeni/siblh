<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhSubOpcionMenu
 *
 * @ORM\Table(name="blh_sub_opcion_menu")
 * @ORM\Entity
 */
class BlhSubOpcionMenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_sub_opcion_menu_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_sub_opcion", type="string", length=50, nullable=false)
     */
    public $nombreSubOpcion;

    /**
     * @var string
     *
     * @ORM\Column(name="url_sub_opcion", type="string", length=100, nullable=false)
     */
    public $urlSubOpcion;

    /**
     * @var \BlhOpcionMenu
     *
     * @ORM\ManyToOne(targetEntity="BlhOpcionMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_opcion_menu", referencedColumnName="id")
     * })
     */
    private $idOpcionMenu;



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
     * Set nombreSubOpcion
     *
     * @param string $nombreSubOpcion
     * @return BlhSubOpcionMenu
     */
    public function setNombreSubOpcion($nombreSubOpcion)
    {
        $this->nombreSubOpcion = $nombreSubOpcion;
    
        return $this;
    }

    /**
     * Get nombreSubOpcion
     *
     * @return string 
     */
    public function getNombreSubOpcion()
    {
        return $this->nombreSubOpcion;
    }

    /**
     * Set urlSubOpcion
     *
     * @param string $urlSubOpcion
     * @return BlhSubOpcionMenu
     */
    public function setUrlSubOpcion($urlSubOpcion)
    {
        $this->urlSubOpcion = $urlSubOpcion;
    
        return $this;
    }

    /**
     * Get urlSubOpcion
     *
     * @return string 
     */
    public function getUrlSubOpcion()
    {
        return $this->urlSubOpcion;
    }

    /**
     * Set idOpcionMenu
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhOpcionMenu $idOpcionMenu
     * @return BlhSubOpcionMenu
     */
    public function setIdOpcionMenu(\siblh\mantenimientoBundle\Entity\BlhOpcionMenu $idOpcionMenu = null)
    {
        $this->idOpcionMenu = $idOpcionMenu;
    
        return $this;
    }

    /**
     * Get idOpcionMenu
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhOpcionMenu 
     */
    public function getIdOpcionMenu()
    {
        return $this->idOpcionMenu;
    }
}