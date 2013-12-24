<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhCrematocrito
 *
 * @ORM\Table(name="blh_crematocrito")
 * @ORM\Entity
 */
class BlhCrematocrito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_crematocrito_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="crema1", type="decimal", nullable=true)
     */
    private $crema1;

    /**
     * @var float
     *
     * @ORM\Column(name="crema2", type="decimal", nullable=true)
     */
    private $crema2;

    /**
     * @var float
     *
     * @ORM\Column(name="crema3", type="decimal", nullable=true)
     */
    private $crema3;

    /**
     * @var float
     *
     * @ORM\Column(name="ct1", type="decimal", nullable=true)
     */
    private $ct1;

    /**
     * @var float
     *
     * @ORM\Column(name="ct2", type="decimal", nullable=true)
     */
    private $ct2;

    /**
     * @var float
     *
     * @ORM\Column(name="ct3", type="decimal", nullable=true)
     */
    private $ct3;

    /**
     * @var float
     *
     * @ORM\Column(name="media_crema", type="decimal", nullable=true)
     */
    private $mediaCrema;

    /**
     * @var float
     *
     * @ORM\Column(name="media_ct", type="decimal", nullable=true)
     */
    private $mediaCt;

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje_crema", type="decimal", nullable=true)
     */
    private $porcentajeCrema;

    /**
     * @var float
     *
     * @ORM\Column(name="kilocalorias", type="decimal", nullable=true)
     */
    private $kilocalorias;

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
     * Set crema1
     *
     * @param float $crema1
     * @return BlhCrematocrito
     */
    public function setCrema1($crema1)
    {
        $this->crema1 = $crema1;
    
        return $this;
    }

    /**
     * Get crema1
     *
     * @return float 
     */
    public function getCrema1()
    {
        return $this->crema1;
    }

    /**
     * Set crema2
     *
     * @param float $crema2
     * @return BlhCrematocrito
     */
    public function setCrema2($crema2)
    {
        $this->crema2 = $crema2;
    
        return $this;
    }

    /**
     * Get crema2
     *
     * @return float 
     */
    public function getCrema2()
    {
        return $this->crema2;
    }

    /**
     * Set crema3
     *
     * @param float $crema3
     * @return BlhCrematocrito
     */
    public function setCrema3($crema3)
    {
        $this->crema3 = $crema3;
    
        return $this;
    }

    /**
     * Get crema3
     *
     * @return float 
     */
    public function getCrema3()
    {
        return $this->crema3;
    }

    /**
     * Set ct1
     *
     * @param float $ct1
     * @return BlhCrematocrito
     */
    public function setCt1($ct1)
    {
        $this->ct1 = $ct1;
    
        return $this;
    }

    /**
     * Get ct1
     *
     * @return float 
     */
    public function getCt1()
    {
        return $this->ct1;
    }

    /**
     * Set ct2
     *
     * @param float $ct2
     * @return BlhCrematocrito
     */
    public function setCt2($ct2)
    {
        $this->ct2 = $ct2;
    
        return $this;
    }

    /**
     * Get ct2
     *
     * @return float 
     */
    public function getCt2()
    {
        return $this->ct2;
    }

    /**
     * Set ct3
     *
     * @param float $ct3
     * @return BlhCrematocrito
     */
    public function setCt3($ct3)
    {
        $this->ct3 = $ct3;
    
        return $this;
    }

    /**
     * Get ct3
     *
     * @return float 
     */
    public function getCt3()
    {
        return $this->ct3;
    }

    /**
     * Set mediaCrema
     *
     * @param float $mediaCrema
     * @return BlhCrematocrito
     */
    public function setMediaCrema($mediaCrema)
    {
        $this->mediaCrema = $mediaCrema;
    
        return $this;
    }

    /**
     * Get mediaCrema
     *
     * @return float 
     */
    public function getMediaCrema()
    {
        return $this->mediaCrema;
    }

    /**
     * Set mediaCt
     *
     * @param float $mediaCt
     * @return BlhCrematocrito
     */
    public function setMediaCt($mediaCt)
    {
        $this->mediaCt = $mediaCt;
    
        return $this;
    }

    /**
     * Get mediaCt
     *
     * @return float 
     */
    public function getMediaCt()
    {
        return $this->mediaCt;
    }

    /**
     * Set porcentajeCrema
     *
     * @param float $porcentajeCrema
     * @return BlhCrematocrito
     */
    public function setPorcentajeCrema($porcentajeCrema)
    {
        $this->porcentajeCrema = $porcentajeCrema;
    
        return $this;
    }

    /**
     * Get porcentajeCrema
     *
     * @return float 
     */
    public function getPorcentajeCrema()
    {
        return $this->porcentajeCrema;
    }

    /**
     * Set kilocalorias
     *
     * @param float $kilocalorias
     * @return BlhCrematocrito
     */
    public function setKilocalorias($kilocalorias)
    {
        $this->kilocalorias = $kilocalorias;
    
        return $this;
    }

    /**
     * Get kilocalorias
     *
     * @return float 
     */
    public function getKilocalorias()
    {
        return $this->kilocalorias;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhCrematocrito
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
     * @return BlhCrematocrito
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