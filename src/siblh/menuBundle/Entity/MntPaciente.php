<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntPaciente
 */
class MntPaciente
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $horaNacimiento;

    /**
     * @var \DateTime
     */
    private $fechaNacimiento;

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
    private $tercerNombre;

    /**
     * @var string
     */
    private $primerApellido;

    /**
     * @var string
     */
    private $segundoApelido;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var \siblh\menuBundle\Entity\CltMunicipio
     */
    private $idMunicipioDomicilio;

    /**
     * @var \siblh\menuBundle\Entity\CtlSexo
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
     * @param \siblh\menuBundle\Entity\CltMunicipio $idMunicipioDomicilio
     * @return MntPaciente
     */
    public function setIdMunicipioDomicilio(\siblh\menuBundle\Entity\CltMunicipio $idMunicipioDomicilio = null)
    {
        $this->idMunicipioDomicilio = $idMunicipioDomicilio;
    
        return $this;
    }

    /**
     * Get idMunicipioDomicilio
     *
     * @return \siblh\menuBundle\Entity\CltMunicipio 
     */
    public function getIdMunicipioDomicilio()
    {
        return $this->idMunicipioDomicilio;
    }

    /**
     * Set idSexo
     *
     * @param \siblh\menuBundle\Entity\CtlSexo $idSexo
     * @return MntPaciente
     */
    public function setIdSexo(\siblh\menuBundle\Entity\CtlSexo $idSexo = null)
    {
        $this->idSexo = $idSexo;
    
        return $this;
    }

    /**
     * Get idSexo
     *
     * @return \siblh\menuBundle\Entity\CtlSexo 
     */
    public function getIdSexo()
    {
        return $this->idSexo;
    }
}
