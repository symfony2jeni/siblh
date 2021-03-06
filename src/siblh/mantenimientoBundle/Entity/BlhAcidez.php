<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhAcidez
 *
 * @ORM\Table(name="blh_acidez")
 * @ORM\Entity
 */
class BlhAcidez
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_acidez_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="acidez1", type="integer", nullable=false)
     */
    private $acidez1;

    /**
     * @var integer
     *
     * @ORM\Column(name="acidez2", type="integer", nullable=false)
     */
    private $acidez2;

    /**
     * @var integer
     *
     * @ORM\Column(name="acidez3", type="integer", nullable=false)
     */
    private $acidez3;

    /**
     * @var float
     *
     * @ORM\Column(name="factor", type="decimal", nullable=false)
     */
    private $factor;

    /**
     * @var float
     *
     * @ORM\Column(name="resultado", type="decimal", nullable=false)
     */
    private $resultado;

    /**
     * @var float
     *
     * @ORM\Column(name="media_acidez", type="decimal", nullable=false)
     */
    private $mediaAcidez;

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
     * Set acidez1
     *
     * @param integer $acidez1
     * @return BlhAcidez
     */
    public function setAcidez1($acidez1)
    {
        $this->acidez1 = $acidez1;
    
        return $this;
    }

    /**
     * Get acidez1
     *
     * @return integer 
     */
    public function getAcidez1()
    {
        return $this->acidez1;
    }

    /**
     * Set acidez2
     *
     * @param integer $acidez2
     * @return BlhAcidez
     */
    public function setAcidez2($acidez2)
    {
        $this->acidez2 = $acidez2;
    
        return $this;
    }

    /**
     * Get acidez2
     *
     * @return integer 
     */
    public function getAcidez2()
    {
        return $this->acidez2;
    }

    /**
     * Set acidez3
     *
     * @param integer $acidez3
     * @return BlhAcidez
     */
    public function setAcidez3($acidez3)
    {
        $this->acidez3 = $acidez3;
    
        return $this;
    }

    /**
     * Get acidez3
     *
     * @return integer 
     */
    public function getAcidez3()
    {
        return $this->acidez3;
    }

    /**
     * Set factor
     *
     * @param float $factor
     * @return BlhAcidez
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;
    
        return $this;
    }

    /**
     * Get factor
     *
     * @return float 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set resultado
     *
     * @param float $resultado
     * @return BlhAcidez
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    
        return $this;
    }

    /**
     * Get resultado
     *
     * @return float 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set mediaAcidez
     *
     * @param float $mediaAcidez
     * @return BlhAcidez
     */
    public function setMediaAcidez($mediaAcidez)
    {
        $this->mediaAcidez = $mediaAcidez;
    
        return $this;
    }

    /**
     * Get mediaAcidez
     *
     * @return float 
     */
    public function getMediaAcidez()
    {
        return $this->mediaAcidez;
    }
     /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhAcidez
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
     * @return BlhAcidez
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