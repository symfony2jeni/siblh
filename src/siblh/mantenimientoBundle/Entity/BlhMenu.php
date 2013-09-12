<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhMenu
 *
 * @ORM\Table(name="blh_menu")
 * @ORM\Entity
 */
class BlhMenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_menu_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_menu", type="string", length=50, nullable=false)
     */
    public $nombreMenu;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_menu", type="string", length=50, nullable=true)
     */
    private $descripcionMenu;



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
     * Set nombreMenu
     *
     * @param string $nombreMenu
     * @return BlhMenu
     */
    public function setNombreMenu($nombreMenu)
    {
        $this->nombreMenu = $nombreMenu;
    
        return $this;
    }

    /**
     * Get nombreMenu
     *
     * @return string 
     */
    public function getNombreMenu()
    {
        return $this->nombreMenu;
    }

    /**
     * Set descripcionMenu
     *
     * @param string $descripcionMenu
     * @return BlhMenu
     */
    public function setDescripcionMenu($descripcionMenu)
    {
        $this->descripcionMenu = $descripcionMenu;
    
        return $this;
    }

    /**
     * Get descripcionMenu
     *
     * @return string 
     */
    public function getDescripcionMenu()
    {
        return $this->descripcionMenu;
    }
    
    public function __toString() {
        return $this->nombreMenu;
    }
}