<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhDonacion
 *
 * @ORM\Table(name="blh_donacion")
 * @ORM\Entity
 */
class BlhDonacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_donacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_donacion", type="date", nullable=false)
     */
    private $fechaDonacion;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_donacion", type="string", length=60, nullable=false)
     */
    private $responsableDonacion;

    /**
     * @var \BlhBancoDeLeche
     *
     * @ORM\ManyToOne(targetEntity="BlhBancoDeLeche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_banco_de_leche", referencedColumnName="id")
     * })
     */
    private $idBancoDeLeche;

    /**
     * @var \BlhDonante
     *
     * @ORM\ManyToOne(targetEntity="BlhDonante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_donante", referencedColumnName="id")
     * })
     */
    private $idDonante;



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
     * Set fechaDonacion
     *
     * @param \DateTime $fechaDonacion
     * @return BlhDonacion
     */
    public function setFechaDonacion($fechaDonacion)
    {
        $this->fechaDonacion = $fechaDonacion;
    
        return $this;
    }

    /**
     * Get fechaDonacion
     *
     * @return \DateTime 
     */
    public function getFechaDonacion()
    {
        return $this->fechaDonacion;
    }

    /**
     * Set responsableDonacion
     *
     * @param string $responsableDonacion
     * @return BlhDonacion
     */
    public function setResponsableDonacion($responsableDonacion)
    {
        $this->responsableDonacion = $responsableDonacion;
    
        return $this;
    }

    /**
     * Get responsableDonacion
     *
     * @return string 
     */
    public function getResponsableDonacion()
    {
        return $this->responsableDonacion;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhDonacion
     */
    public function setIdBancoDeLeche(\siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche = null)
    {
        $this->idBancoDeLeche = $idBancoDeLeche;
    
        return $this;
    }

    /**
     * Get idBancoDeLeche
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche 
     */
    public function getIdBancoDeLeche()
    {
        return $this->idBancoDeLeche;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhDonacion
     */
    public function setIdDonante(\siblh\mantenimientoBundle\Entity\BlhDonante $idDonante = null)
    {
        $this->idDonante = $idDonante;
    
        return $this;
    }

    /**
     * Get idDonante
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhDonante 
     */
    public function getIdDonante()
    {
        return $this->idDonante;
    }
    
     public function __toString()
    {
       return $this->responsableDonacion;
    }
}
