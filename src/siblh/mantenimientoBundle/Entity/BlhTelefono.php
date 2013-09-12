<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhTelefono
 *
 * @ORM\Table(name="blh_telefono")
 * @ORM\Entity
 */
class BlhTelefono
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_telefono_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_de_telefono", type="string", length=9, nullable=true)
     */
    private $numeroDeTelefono;

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
     * Set numeroDeTelefono
     *
     * @param string $numeroDeTelefono
     * @return BlhTelefono
     */
    public function setNumeroDeTelefono($numeroDeTelefono)
    {
        $this->numeroDeTelefono = $numeroDeTelefono;
    
        return $this;
    }

    /**
     * Get numeroDeTelefono
     *
     * @return string 
     */
    public function getNumeroDeTelefono()
    {
        return $this->numeroDeTelefono;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhTelefono
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
}