<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhExamen
 *
 * @ORM\Table(name="blh_examen")
 * @ORM\Entity
 */
class BlhExamen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_examen_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_examen", type="string", length=30, nullable=false)
     */
    private $nombreExamen;



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
     * Set nombreExamen
     *
     * @param string $nombreExamen
     * @return BlhExamen
     */
    public function setNombreExamen($nombreExamen)
    {
        $this->nombreExamen = $nombreExamen;
    
        return $this;
    }

    /**
     * Get nombreExamen
     *
     * @return string 
     */
    public function getNombreExamen()
    {
        return $this->nombreExamen;
    }
  
}