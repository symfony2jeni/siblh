<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhReceptor
 *
 * @ORM\Table(name="blh_receptor")
 * @ORM\Entity
 */
class BlhReceptor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_receptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_receptor", type="string", length=12, nullable=true)
     */
    private $codigoReceptor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro_blh", type="date", nullable=true)
     */
    private $fechaRegistroBlh;

    /**
     * @var string
     *
     * @ORM\Column(name="procedencia", type="string", length=20, nullable=true)
     */
    private $procedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_receptor", type="string", length=8, nullable=true)
     */
    private $estadoReceptor;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad_dias", type="integer", nullable=false)
     */
    private $edadDias;

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
     * @var \MntPaciente
     *
     * @ORM\ManyToOne(targetEntity="MntPaciente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_paciente", referencedColumnName="id")
     * })
     */
    private $idPaciente;



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
     * Set codigoReceptor
     *
     * @param string $codigoReceptor
     * @return BlhReceptor
     */
    public function setCodigoReceptor($codigoReceptor)
    {
        $this->codigoReceptor = $codigoReceptor;
    
        return $this;
    }

    /**
     * Get codigoReceptor
     *
     * @return string 
     */
    public function getCodigoReceptor()
    {
        return $this->codigoReceptor;
    }

    /**
     * Set fechaRegistroBlh
     *
     * @param \DateTime $fechaRegistroBlh
     * @return BlhReceptor
     */
    public function setFechaRegistroBlh($fechaRegistroBlh)
    {
        $this->fechaRegistroBlh = $fechaRegistroBlh;
    
        return $this;
    }

    /**
     * Get fechaRegistroBlh
     *
     * @return \DateTime 
     */
    public function getFechaRegistroBlh()
    {
        return $this->fechaRegistroBlh;
    }

    /**
     * Set procedencia
     *
     * @param string $procedencia
     * @return BlhReceptor
     */
    public function setProcedencia($procedencia)
    {
        $this->procedencia = $procedencia;
    
        return $this;
    }

    /**
     * Get procedencia
     *
     * @return string 
     */
    public function getProcedencia()
    {
        return $this->procedencia;
    }

    /**
     * Set estadoReceptor
     *
     * @param string $estadoReceptor
     * @return BlhReceptor
     */
    public function setEstadoReceptor($estadoReceptor)
    {
        $this->estadoReceptor = $estadoReceptor;
    
        return $this;
    }

    /**
     * Get estadoReceptor
     *
     * @return string 
     */
    public function getEstadoReceptor()
    {
        return $this->estadoReceptor;
    }

    /**
     * Set edadDias
     *
     * @param integer $edadDias
     * @return BlhReceptor
     */
    public function setEdadDias($edadDias)
    {
        $this->edadDias = $edadDias;
    
        return $this;
    }

    /**
     * Get edadDias
     *
     * @return integer 
     */
    public function getEdadDias()
    {
        return $this->edadDias;
    }

    /**
     * Set idBancoDeLeche
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhReceptor
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
     * Set idPaciente
     *
     * @param \siblh\mantenimientoBundle\Entity\MntPaciente $idPaciente
     * @return BlhReceptor
     */
    public function setIdPaciente(\siblh\mantenimientoBundle\Entity\MntPaciente $idPaciente = null)
    {
        $this->idPaciente = $idPaciente;
    
        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return \siblh\mantenimientoBundle\Entity\MntPaciente 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }
}