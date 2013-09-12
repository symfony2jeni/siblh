<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhDonante
 */
class BlhDonante
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoDonante;

    /**
     * @var string
     */
    private $primerNombre;

    /**
     * @var string
     */
    private $segundoNombre;

    /**
     * @var string
     */
    private $primerApellido;

    /**
     * @var string
     */
    private $segundoApellido;

    /**
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     */
    private $fechaRegistroDonanteBlh;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $procedencia;

    /**
     * @var string
     */
    private $registro;

    /**
     * @var string
     */
    private $numeroDocumentoIdentificacion;

    /**
     * @var string
     */
    private $documentoIdentificacion;

    /**
     * @var integer
     */
    private $edad;

    /**
     * @var string
     */
    private $ocupacion;

    /**
     * @var string
     */
    private $estadoCivil;

    /**
     * @var string
     */
    private $nacionalidad;

    /**
     * @var string
     */
    private $escolaridad;

    /**
     * @var string
     */
    private $estadoDonante;

    /**
     * @var string
     */
    private $tipoColecta;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var \siblh\menuBundle\Entity\BlhBancoDeLeche
     */
    private $idBancoDeLeche;

    /**
     * @var \siblh\menuBundle\Entity\CltMunicipio
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
     * Set estadoDonante
     *
     * @param string $estadoDonante
     * @return BlhDonante
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
     * Set idBancoDeLeche
     *
     * @param \siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche
     * @return BlhDonante
     */
    public function setIdBancoDeLeche(\siblh\menuBundle\Entity\BlhBancoDeLeche $idBancoDeLeche = null)
    {
        $this->idBancoDeLeche = $idBancoDeLeche;
    
        return $this;
    }

    /**
     * Get idBancoDeLeche
     *
     * @return \siblh\menuBundle\Entity\BlhBancoDeLeche 
     */
    public function getIdBancoDeLeche()
    {
        return $this->idBancoDeLeche;
    }

    /**
     * Set idMunicipio
     *
     * @param \siblh\menuBundle\Entity\CltMunicipio $idMunicipio
     * @return BlhDonante
     */
    public function setIdMunicipio(\siblh\menuBundle\Entity\CltMunicipio $idMunicipio = null)
    {
        $this->idMunicipio = $idMunicipio;
    
        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return \siblh\menuBundle\Entity\CltMunicipio 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }
}
