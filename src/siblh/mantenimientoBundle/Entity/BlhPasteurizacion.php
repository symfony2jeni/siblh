<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhPasteurizacion
 *
 * @ORM\Table(name="blh_pasteurizacion")
 * @ORM\Entity
 */
class BlhPasteurizacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_pasteurizacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_pasteurizacion", type="string", length=11, nullable=false)
     */
    private $codigoPasteurizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_ciclo", type="integer", nullable=false)
     */
    private $numCiclo;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen_pasteurizado", type="decimal", nullable=false)
     */
    private $volumenPasteurizado;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_frascos_pasteurizados", type="integer", nullable=false)
     */
    private $numFrascosPasteurizados;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pasteurizacion", type="date", nullable=false)
     */
    private $fechaPasteurizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_inicio_p", type="time", nullable=true)
     */
    private $horaInicioP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_final_p", type="time", nullable=true)
     */
    private $horaFinalP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_inicio_e", type="time", nullable=true)
     */
    private $horaInicioE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_final_e", type="time", nullable=true)
     */
    private $horaFinalE;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_pasteurizacion", type="string", length=30, nullable=false)
     */
    private $responsablePasteurizacion;

    /**
     * @var \BlhCurva
     *
     * @ORM\ManyToOne(targetEntity="BlhCurva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_curva", referencedColumnName="id")
     * })
     */
    private $idCurva;



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
     * Set codigoPasteurizacion
     *
     * @param string $codigoPasteurizacion
     * @return BlhPasteurizacion
     */
    public function setCodigoPasteurizacion($codigoPasteurizacion)
    {
        $this->codigoPasteurizacion = $codigoPasteurizacion;
    
        return $this;
    }

    /**
     * Get codigoPasteurizacion
     *
     * @return string 
     */
    public function getCodigoPasteurizacion()
    {
        return $this->codigoPasteurizacion;
    }

    /**
     * Set numCiclo
     *
     * @param integer $numCiclo
     * @return BlhPasteurizacion
     */
    public function setNumCiclo($numCiclo)
    {
        $this->numCiclo = $numCiclo;
    
        return $this;
    }

    /**
     * Get numCiclo
     *
     * @return integer 
     */
    public function getNumCiclo()
    {
        return $this->numCiclo;
    }

    /**
     * Set volumenPasteurizado
     *
     * @param float $volumenPasteurizado
     * @return BlhPasteurizacion
     */
    public function setVolumenPasteurizado($volumenPasteurizado)
    {
        $this->volumenPasteurizado = $volumenPasteurizado;
    
        return $this;
    }

    /**
     * Get volumenPasteurizado
     *
     * @return float 
     */
    public function getVolumenPasteurizado()
    {
        return $this->volumenPasteurizado;
    }

    /**
     * Set numFrascosPasteurizados
     *
     * @param integer $numFrascosPasteurizados
     * @return BlhPasteurizacion
     */
    public function setNumFrascosPasteurizados($numFrascosPasteurizados)
    {
        $this->numFrascosPasteurizados = $numFrascosPasteurizados;
    
        return $this;
    }

    /**
     * Get numFrascosPasteurizados
     *
     * @return integer 
     */
    public function getNumFrascosPasteurizados()
    {
        return $this->numFrascosPasteurizados;
    }

    /**
     * Set fechaPasteurizacion
     *
     * @param \DateTime $fechaPasteurizacion
     * @return BlhPasteurizacion
     */
    public function setFechaPasteurizacion($fechaPasteurizacion)
    {
        $this->fechaPasteurizacion = $fechaPasteurizacion;
    
        return $this;
    }

    /**
     * Get fechaPasteurizacion
     *
     * @return \DateTime 
     */
    public function getFechaPasteurizacion()
    {
        return $this->fechaPasteurizacion;
    }

    /**
     * Set horaInicioP
     *
     * @param \DateTime $horaInicioP
     * @return BlhPasteurizacion
     */
    public function setHoraInicioP($horaInicioP)
    {
        $this->horaInicioP = $horaInicioP;
    
        return $this;
    }

    /**
     * Get horaInicioP
     *
     * @return \DateTime 
     */
    public function getHoraInicioP()
    {
        return $this->horaInicioP;
    }

    /**
     * Set horaFinalP
     *
     * @param \DateTime $horaFinalP
     * @return BlhPasteurizacion
     */
    public function setHoraFinalP($horaFinalP)
    {
        $this->horaFinalP = $horaFinalP;
    
        return $this;
    }

    /**
     * Get horaFinalP
     *
     * @return \DateTime 
     */
    public function getHoraFinalP()
    {
        return $this->horaFinalP;
    }

    /**
     * Set horaInicioE
     *
     * @param \DateTime $horaInicioE
     * @return BlhPasteurizacion
     */
    public function setHoraInicioE($horaInicioE)
    {
        $this->horaInicioE = $horaInicioE;
    
        return $this;
    }

    /**
     * Get horaInicioE
     *
     * @return \DateTime 
     */
    public function getHoraInicioE()
    {
        return $this->horaInicioE;
    }

    /**
     * Set horaFinalE
     *
     * @param \DateTime $horaFinalE
     * @return BlhPasteurizacion
     */
    public function setHoraFinalE($horaFinalE)
    {
        $this->horaFinalE = $horaFinalE;
    
        return $this;
    }

    /**
     * Get horaFinalE
     *
     * @return \DateTime 
     */
    public function getHoraFinalE()
    {
        return $this->horaFinalE;
    }

    /**
     * Set responsablePasteurizacion
     *
     * @param string $responsablePasteurizacion
     * @return BlhPasteurizacion
     */
    public function setResponsablePasteurizacion($responsablePasteurizacion)
    {
        $this->responsablePasteurizacion = $responsablePasteurizacion;
    
        return $this;
    }

    /**
     * Get responsablePasteurizacion
     *
     * @return string 
     */
    public function getResponsablePasteurizacion()
    {
        return $this->responsablePasteurizacion;
    }

    /**
     * Set idCurva
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhCurva $idCurva
     * @return BlhPasteurizacion
     */
    public function setIdCurva(\siblh\mantenimientoBundle\Entity\BlhCurva $idCurva = null)
    {
        $this->idCurva = $idCurva;
    
        return $this;
    }

    /**
     * Get idCurva
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhCurva 
     */
    public function getIdCurva()
    {
        return $this->idCurva;
    }
    
 public function __toString()
    {
       return $this->codigoPasteurizacion;
    }   
    
}