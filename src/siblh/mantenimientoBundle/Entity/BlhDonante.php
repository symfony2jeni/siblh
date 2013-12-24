<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhDonante
 *
 * @ORM\Table(name="blh_donante")
 * @ORM\Entity
 */
class BlhDonante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_donante_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_donante", type="string", length=14, nullable=false)
     */
    private $codigoDonante;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre", type="string", length=15, nullable=false)
     */
    private $primerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre", type="string", length=15, nullable=true)
     */
    private $segundoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido", type="string", length=15, nullable=false)
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido", type="string", length=15, nullable=true)
     */
    private $segundoApellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro_donante_blh", type="date", nullable=true)
     */
    private $fechaRegistroDonanteBlh;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_fijo", type="string", length=9, nullable=true)
     */
    private $telefonoFijo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_movil", type="string", length=9, nullable=true)
     */
    private $telefonoMovil;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="procedencia", type="string", length=20, nullable=true)
     */
    private $procedencia;

    /**
     * @var string
     *
     * @ORM\Column(name="registro", type="string", length=12, nullable=true)
     */
    private $registro;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_documento_identificacion", type="string", length=10, nullable=false)
     */
    private $numeroDocumentoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="documento_identificacion", type="string", length=20, nullable=false)
     */
    private $documentoIdentificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="ocupacion", type="string", length=15, nullable=true)
     */
    private $ocupacion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_civil", type="string", length=10, nullable=false)
     */
    private $estadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=15, nullable=false)
     */
    private $nacionalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="escolaridad", type="string", length=15, nullable=true)
     */
    private $escolaridad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_colecta", type="string", length=10, nullable=false)
     */
    private $tipoColecta;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=150, nullable=true)
     */
    private $observaciones;


    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=8, nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

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
     * @var \CtlMunicipio
     *
     * @ORM\ManyToOne(targetEntity="CtlMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id")
     * })
     */
    private $idMunicipio;



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
     * Set codigoDonante
     *
     * @param string $codigoDonante
     * @return BlhDonante
     */
    public function setCodigoDonante($codigoDonante)
    {
        $this->codigoDonante = $codigoDonante;
    
        return $this;
    }

    /**
     * Get codigoDonante
     *
     * @return string 
     */
    public function getCodigoDonante()
    {
        return $this->codigoDonante;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return BlhDonante
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
     * @return BlhDonante
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
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return BlhDonante
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
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return BlhDonante
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    
        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return BlhDonante
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
     * Set fechaRegistroDonanteBlh
     *
     * @param \DateTime $fechaRegistroDonanteBlh
     * @return BlhDonante
     */
    public function setFechaRegistroDonanteBlh($fechaRegistroDonanteBlh)
    {
        $this->fechaRegistroDonanteBlh = $fechaRegistroDonanteBlh;
    
        return $this;
    }

    /**
     * Get fechaRegistroDonanteBlh
     *
     * @return \DateTime 
     */
    public function getFechaRegistroDonanteBlh()
    {
        return $this->fechaRegistroDonanteBlh;
    }

    /**
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     * @return BlhDonante
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
    
        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string 
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set telefonoMovil
     *
     * @param string $telefonoMovil
     * @return BlhDonante
     */
    public function setTelefonoMovil($telefonoMovil)
    {
        $this->telefonoMovil = $telefonoMovil;
    
        return $this;
    }

    /**
     * Get telefonoMovil
     *
     * @return string 
     */
    public function getTelefonoMovil()
    {
        return $this->telefonoMovil;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return BlhDonante
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
     * Set procedencia
     *
     * @param string $procedencia
     * @return BlhDonante
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
     * Set registro
     *
     * @param string $registro
     * @return BlhDonante
     */
    public function setRegistro($registro)
    {
        $this->registro = $registro;
    
        return $this;
    }

    /**
     * Get registro
     *
     * @return string 
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set numeroDocumentoIdentificacion
     *
     * @param string $numeroDocumentoIdentificacion
     * @return BlhDonante
     */
    public function setNumeroDocumentoIdentificacion($numeroDocumentoIdentificacion)
    {
        $this->numeroDocumentoIdentificacion = $numeroDocumentoIdentificacion;
    
        return $this;
    }

    /**
     * Get numeroDocumentoIdentificacion
     *
     * @return string 
     */
    public function getNumeroDocumentoIdentificacion()
    {
        return $this->numeroDocumentoIdentificacion;
    }

    /**
     * Set documentoIdentificacion
     *
     * @param string $documentoIdentificacion
     * @return BlhDonante
     */
    public function setDocumentoIdentificacion($documentoIdentificacion)
    {
        $this->documentoIdentificacion = $documentoIdentificacion;
    
        return $this;
    }

    /**
     * Get documentoIdentificacion
     *
     * @return string 
     */
    public function getDocumentoIdentificacion()
    {
        return $this->documentoIdentificacion;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return BlhDonante
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    
        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return BlhDonante
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    
        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set estadoCivil
     *
     * @param string $estadoCivil
     * @return BlhDonante
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    
        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return string 
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return BlhDonante
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    
        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set escolaridad
     *
     * @param string $escolaridad
     * @return BlhDonante
     */
    public function setEscolaridad($escolaridad)
    {
        $this->escolaridad = $escolaridad;
    
        return $this;
    }

    /**
     * Get escolaridad
     *
     * @return string 
     */
    public function getEscolaridad()
    {
        return $this->escolaridad;
    }

    /**
     * Set tipoColecta
     *
     * @param string $tipoColecta
     * @return BlhDonante
     */
    public function setTipoColecta($tipoColecta)
    {
        $this->tipoColecta = $tipoColecta;
    
        return $this;
    }

    /**
     * Get tipoColecta
     *
     * @return string 
     */
    public function getTipoColecta()
    {
        return $this->tipoColecta;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return BlhDonante
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return BlhDonante
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhDonante
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
     * Set idBancoDeLeche
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhDonante
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
     * Set idMunicipio
     *
     * @param \siblh\mantenimientoBundle\Entity\CtlMunicipio $idMunicipio
     * @return BlhDonante
     */
    public function setIdMunicipio(\siblh\mantenimientoBundle\Entity\CtlMunicipio $idMunicipio = null)
    {
        $this->idMunicipio = $idMunicipio;
    
        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return \siblh\mantenimientoBundle\Entity\CtlMunicipio 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }
   
     public function __toString()
    {
       return $this->codigoDonante;
    }
}