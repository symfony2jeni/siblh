<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntPaciente
 *
 * @ORM\Table(name="mnt_paciente")
 * @ORM\Entity
 */
class MntPaciente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_paciente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_nacimiento", type="date", nullable=true)
     */
    private $horaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre", type="string", length=25, nullable=false)
     */
    private $primerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre", type="string", length=25, nullable=true)
     */
    private $segundoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tercer_nombre", type="string", length=25, nullable=true)
     */
    private $tercerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido", type="string", length=25, nullable=false)
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apelido", type="string", length=25, nullable=true)
     */
    private $segundoApelido;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=false)
     */
    private $direccion;

    /**
     * @var \CltMunicipio
     *
     * @ORM\ManyToOne(targetEntity="CltMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio_domicilio", referencedColumnName="id")
     * })
     */
    private $idMunicipioDomicilio;

    /**
     * @var \CtlSexo
     *
     * @ORM\ManyToOne(targetEntity="CtlSexo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sexo", referencedColumnName="id")
     * })
     */
    private $idSexo;



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
     * Set horaNacimiento
     *
     * @param \DateTime $horaNacimiento
     * @return MntPaciente
     */
    public function setHoraNacimiento($horaNacimiento)
    {
        $this->horaNacimiento = $horaNacimiento;
    
        return $this;
    }

    /**
     * Get horaNacimiento
     *
     * @return \DateTime 
     */
    public function getHoraNacimiento()
    {
        return $this->horaNacimiento;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return MntPaciente
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return MntPaciente
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    
        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string 
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return MntPaciente
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    
        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set tercerNombre
     *
     * @param string $tercerNombre
     * @return MntPaciente
     */
    public function setTercerNombre($tercerNombre)
    {
        $this->tercerNombre = $tercerNombre;
    
        return $this;
    }

    /**
     * Get tercerNombre
     *
     * @return string 
     */
    public function getTercerNombre()
    {
        return $this->tercerNombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return MntPaciente
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    
        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string 
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApelido
     *
     * @param string $segundoApelido
     * @return MntPaciente
     */
    public function setSegundoApelido($segundoApelido)
    {
        $this->segundoApelido = $segundoApelido;
    
        return $this;
    }

    /**
     * Get segundoApelido
     *
     * @return string 
     */
    public function getSegundoApelido()
    {
        return $this->segundoApelido;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return MntPaciente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set idMunicipioDomicilio
     *
     * @param \siblh\mantenimientoBundle\Entity\CltMunicipio $idMunicipioDomicilio
     * @return MntPaciente
     */
    public function setIdMunicipioDomicilio(\siblh\mantenimientoBundle\Entity\CltMunicipio $idMunicipioDomicilio = null)
    {
        $this->idMunicipioDomicilio = $idMunicipioDomicilio;
    
        return $this;
    }

    /**
     * Get idMunicipioDomicilio
     *
     * @return \siblh\mantenimientoBundle\Entity\CltMunicipio 
     */
    public function getIdMunicipioDomicilio()
    {
        return $this->idMunicipioDomicilio;
    }

    /**
     * Set idSexo
     *
     * @param \siblh\mantenimientoBundle\Entity\CtlSexo $idSexo
     * @return MntPaciente
     */
    public function setIdSexo(\siblh\mantenimientoBundle\Entity\CtlSexo $idSexo = null)
    {
        $this->idSexo = $idSexo;
    
        return $this;
    }

    /**
     * Get idSexo
     *
     * @return \siblh\mantenimientoBundle\Entity\CtlSexo 
     */
    public function getIdSexo()
    {
        return $this->idSexo;
    }
}