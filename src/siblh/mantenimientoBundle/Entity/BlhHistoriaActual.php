<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhHistoriaActual
 *
 * @ORM\Table(name="blh_historia_actual")
 * @ORM\Entity
 */
class BlhHistoriaActual
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_historia_actual_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="peso_donante", type="decimal", nullable=false)
     */
    private $pesoDonante;

    /**
     * @var float
     *
     * @ORM\Column(name="talla_donante", type="decimal", nullable=false)
     */
    private $tallaDonante;

    /**
     * @var string
     *
     * @ORM\Column(name="medicamento", type="string", length=50, nullable=true)
     */
    private $medicamento;

    /**
     * @var string
     *
     * @ORM\Column(name="habito_toxico", type="string", length=50, nullable=true)
     */
    private $habitoToxico;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo_donacion", type="string", length=50, nullable=false)
     */
    private $motivoDonacion;

    /**
     * @var string
     *
     * @ORM\Column(name="patologia_donante", type="string", length=50, nullable=true)
     */
    private $patologiaDonante;

    /**
     * @var float
     *
     * @ORM\Column(name="imc", type="decimal", nullable=false)
     */
    private $imc;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_donante", type="string", length=12, nullable=false)
     */
    private $estadoDonante;

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
     * Set pesoDonante
     *
     * @param float $pesoDonante
     * @return BlhHistoriaActual
     */
    public function setPesoDonante($pesoDonante)
    {
        $this->pesoDonante = $pesoDonante;
    
        return $this;
    }

    /**
     * Get pesoDonante
     *
     * @return float 
     */
    public function getPesoDonante()
    {
        return $this->pesoDonante;
    }

    /**
     * Set tallaDonante
     *
     * @param float $tallaDonante
     * @return BlhHistoriaActual
     */
    public function setTallaDonante($tallaDonante)
    {
        $this->tallaDonante = $tallaDonante;
    
        return $this;
    }

    /**
     * Get tallaDonante
     *
     * @return float 
     */
    public function getTallaDonante()
    {
        return $this->tallaDonante;
    }

    /**
     * Set medicamento
     *
     * @param string $medicamento
     * @return BlhHistoriaActual
     */
    public function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    
        return $this;
    }

    /**
     * Get medicamento
     *
     * @return string 
     */
    public function getMedicamento()
    {
        return $this->medicamento;
    }

    /**
     * Set habitoToxico
     *
     * @param string $habitoToxico
     * @return BlhHistoriaActual
     */
    public function setHabitoToxico($habitoToxico)
    {
        $this->habitoToxico = $habitoToxico;
    
        return $this;
    }

    /**
     * Get habitoToxico
     *
     * @return string 
     */
    public function getHabitoToxico()
    {
        return $this->habitoToxico;
    }

    /**
     * Set motivoDonacion
     *
     * @param string $motivoDonacion
     * @return BlhHistoriaActual
     */
    public function setMotivoDonacion($motivoDonacion)
    {
        $this->motivoDonacion = $motivoDonacion;
    
        return $this;
    }

    /**
     * Get motivoDonacion
     *
     * @return string 
     */
    public function getMotivoDonacion()
    {
        return $this->motivoDonacion;
    }

    /**
     * Set patologiaDonante
     *
     * @param string $patologiaDonante
     * @return BlhHistoriaActual
     */
    public function setPatologiaDonante($patologiaDonante)
    {
        $this->patologiaDonante = $patologiaDonante;
    
        return $this;
    }

    /**
     * Get patologiaDonante
     *
     * @return string 
     */
    public function getPatologiaDonante()
    {
        return $this->patologiaDonante;
    }

    /**
     * Set imc
     *
     * @param float $imc
     * @return BlhHistoriaActual
     */
    public function setImc($imc)
    {
        $this->imc = $imc;
    
        return $this;
    }

    /**
     * Get imc
     *
     * @return float 
     */
    public function getImc()
    {
        return $this->imc;
    }

    /**
     * Set estadoDonante
     *
     * @param string $estadoDonante
     * @return BlhHistoriaActual
     */
    public function setEstadoDonante($estadoDonante)
    {
        $this->estadoDonante = $estadoDonante;
    
        return $this;
    }

    /**
     * Get estadoDonante
     *
     * @return string 
     */
    public function getEstadoDonante()
    {
        return $this->estadoDonante;
    }

    /**
     * Set idDonante
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhHistoriaActual
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