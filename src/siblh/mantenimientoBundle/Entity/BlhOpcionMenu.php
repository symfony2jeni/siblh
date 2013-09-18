<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhOpcionMenu
 *
 * @ORM\Table(name="blh_opcion_menu")
 * @ORM\Entity
 */
class BlhOpcionMenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_opcion_menu_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_opcion", type="string", length=50, nullable=false)
     */


    public $nombreOpcion;



    /**
     * @var string
     *
     * @ORM\Column(name="url_opcion", type="string", length=100, nullable=true)
     */

    public $urlOpcion;


    /**
     * @var \BlhMenu
     *
     * @ORM\ManyToOne(targetEntity="BlhMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_menu", referencedColumnName="id")
     * })
     */
    private $idMenu;



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
     * Set nombreOpcion
     *
     * @param string $nombreOpcion
     * @return BlhOpcionMenu
     */
    public function setNombreOpcion($nombreOpcion)
    {
        $this->nombreOpcion = $nombreOpcion;
    
        return $this;
    }

    /**
     * Get nombreOpcion
     *
     * @return string 
     */
    public function getNombreOpcion()
    {
        return $this->nombreOpcion;
    }

    /**
     * Set urlOpcion
     *
     * @param string $urlOpcion
     * @return BlhOpcionMenu
     */
    public function setUrlOpcion($urlOpcion)
    {
        $this->urlOpcion = $urlOpcion;
    
        return $this;
    }

    /**
     * Get urlOpcion
     *
     * @return string 
     */
    public function getUrlOpcion()
    {
        return $this->urlOpcion;
    }

    /**
     * Set idMenu
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhMenu $idMenu
     * @return BlhOpcionMenu
     */
    public function setIdMenu(\siblh\mantenimientoBundle\Entity\BlhMenu $idMenu = null)
    {
        $this->idMenu = $idMenu;
    
        return $this;
    }

    /**
     * Get idMenu
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhMenu 
     */
    public function getIdMenu()
    {
        return $this->idMenu;
    }
}

