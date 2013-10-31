<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhRolMenu
 *
 * @ORM\Table(name="blh_rol_menu")
 * @ORM\Entity
 */
class BlhRolMenu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_rol_menu_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \BlhMenu
     *
     * @ORM\ManyToOne(targetEntity="BlhMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_menu", referencedColumnName="id")
     * })
     */
    public $idMenu;

    /**
     * @var \BlhRol
     *
     * @ORM\ManyToOne(targetEntity="BlhRol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rol", referencedColumnName="id")
     * })
     */
    public $idRol;



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
     * Set idMenu
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhMenu $idMenu
     * @return BlhRolMenu
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

    /**
     * Set idRol
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhRol $idRol
     * @return BlhRolMenu
     */
    public function setIdRol(\siblh\mantenimientoBundle\Entity\BlhRol $idRol = null)
    {
        $this->idRol = $idRol;
    
        return $this;
    }

    /**
     * Get idRol
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhRol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }
}