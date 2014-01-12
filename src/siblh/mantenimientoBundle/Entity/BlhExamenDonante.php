<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhExamenDonante
 *
 * @ORM\Table(name="blh_examen_donante")
 * @ORM\Entity
 */
class BlhExamenDonante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_examen_donante_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_examen", type="string", length=8, nullable=false)
     */
    private $resultadoExamen;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=true)
     */
    private $usuario;

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
     * @var \BlhExamen
     *
     * @ORM\ManyToOne(targetEntity="BlhExamen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_examen", referencedColumnName="id")
     * })
     */
    private $idExamen;



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
     * Set resultadoExamen
     *
     * @param string $resultadoExamen
     * @return BlhExamenDonante
     */
    public function setResultadoExamen($resultadoExamen)
    {
        $this->resultadoExamen = $resultadoExamen;
    
        return $this;
    }

    /**
     * Get resultadoExamen
     *
     * @return string 
     */
    public function getResultadoExamen()
    {
        return $this->resultadoExamen;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     * @return BlhExamenDonante
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
     * Set idDonante
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhDonante $idDonante
     * @return BlhExamenDonante
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

    /**
     * Set idExamen
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhExamen $idExamen
     * @return BlhExamenDonante
     */
    public function setIdExamen(\siblh\mantenimientoBundle\Entity\BlhExamen $idExamen = null)
    {
        $this->idExamen = $idExamen;
    
        return $this;
    }

    /**
     * Get idExamen
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhExamen 
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }
}