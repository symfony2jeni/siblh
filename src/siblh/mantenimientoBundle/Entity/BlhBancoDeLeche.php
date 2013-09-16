<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhBancoDeLeche
 *
 * @ORM\Table(name="blh_banco_de_leche")
 * @ORM\Entity
 */
class BlhBancoDeLeche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_banco_de_leche_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_banco_de_leche", type="string", length=6, nullable=false)
     */
    private $codigoBancoDeLeche;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_banco", type="string", length=8, nullable=false)
     */
    private $estadoBanco;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;



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
     * Set codigoBancoDeLeche
     *
     * @param string $codigoBancoDeLeche
     * @return BlhBancoDeLeche
     */
    public function setCodigoBancoDeLeche($codigoBancoDeLeche)
    {
        $this->codigoBancoDeLeche = $codigoBancoDeLeche;
    
        return $this;
    }

    /**
     * Get codigoBancoDeLeche
     *
     * @return string 
     */
    public function getCodigoBancoDeLeche()
    {
        return $this->codigoBancoDeLeche;
    }

    /**
     * Set estadoBanco
     *
     * @param string $estadoBanco
     * @return BlhBancoDeLeche
     */
    public function setEstadoBanco($estadoBanco)
    {
        $this->estadoBanco = $estadoBanco;
    
        return $this;
    }

    /**
     * Get estadoBanco
     *
     * @return string 
     */
    public function getEstadoBanco()
    {
        return $this->estadoBanco;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \siblh\mantenimientoBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return BlhBancoDeLeche
     */
    public function setIdEstablecimiento(\siblh\mantenimientoBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;
    
        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \siblh\mantenimientoBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }
<<<<<<< HEAD
=======
    
    public function __toString() {
    $nombre_estab=  $this->codigoBancoDeLeche.$this->idEstablecimiento;
    $estab= substr($nombre_estab, 6);
    return $estab;
}
>>>>>>> marvin
}