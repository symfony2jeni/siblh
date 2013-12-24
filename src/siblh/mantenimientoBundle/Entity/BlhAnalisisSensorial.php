<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAnalisisSensorial
 *
 * @ORM\Table(name="blh_analisis_sensorial")
 * @ORM\Entity
 */
class BlhAnalisisSensorial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_analisis_sensorial_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="embalaje", type="string", length=9, nullable=true)
     */
    private $embalaje;

    /**
     * @var string
     *
     * @ORM\Column(name="suciedad", type="string", length=9, nullable=true)
     */
    private $suciedad;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=9, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="flavor", type="string", length=9, nullable=true)
     */
    private $flavor;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=150, nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

     /**
     * @var \BlhFrascoRecolectado
     *
     * @ORM\ManyToOne(targetEntity="BlhFrascoRecolectado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_frasco_recolectado", referencedColumnName="id")
     * })
     */
    private $idFrascoRecolectado;



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
     * Set embalaje
     *
     * @param string $embalaje
     * @return BlhAnalisisSensorial
     */
    public function setEmbalaje($embalaje)
    {
        $this->embalaje = $embalaje;
    
        return $this;
    }

    /**
     * Get embalaje
     *
     * @return string 
     */
    public function getEmbalaje()
    {
        return $this->embalaje;
    }

    /**
     * Set suciedad
     *
     * @param string $suciedad
     * @return BlhAnalisisSensorial
     */
    public function setSuciedad($suciedad)
    {
        $this->suciedad = $suciedad;
    
        return $this;
    }

    /**
     * Get suciedad
     *
     * @return string 
     */
    public function getSuciedad()
    {
        return $this->suciedad;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return BlhAnalisisSensorial
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set flavor
     *
     * @param string $flavor
     * @return BlhAnalisisSensorial
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;
    
        return $this;
    }

    /**
     * Get flavor
     *
     * @return string 
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return BlhAnalisisSensorial
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
    
     /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhAnalisisSensorial
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

    /**
     * Set idFrascoRecolectado
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado
     * @return BlhAnalisisSensorial
     */
    public function setIdFrascoRecolectado(\siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado $idFrascoRecolectado = null)
    {
        $this->idFrascoRecolectado = $idFrascoRecolectado;
    
        return $this;
    }

    /**
     * Get idFrascoRecolectado
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhFrascoRecolectado 
     */
    public function getIdFrascoRecolectado()
    {
        return $this->idFrascoRecolectado;
    }
}