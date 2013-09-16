<?php

namespace siblh\menuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhPasteurizacion
 */
class BlhPasteurizacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codigoPasteurizacion;

    /**
     * @var integer
     */
    private $numCiclo;

    /**
     * @var float
     */
    private $volumenPasteurizado;

    /**
     * @var integer
     */
    private $numFrascosPasteurizados;

    /**
     * @var \DateTime
     */
    private $fechaPasteurizacion;

    /**
     * @var \DateTime
     */
    private $horaInicioP;

    /**
     * @var \DateTime
     */
    private $horaFinalP;

    /**
     * @var \DateTime
     */
    private $horaInicioE;

    /**
     * @var \DateTime
     */
    private $horaFinalE;

    /**
     * @var string
     */
    private $responsablePasteurizacion;

    /**
     * @var \siblh\menuBundle\Entity\BlhCurva
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
     * @param \siblh\menuBundle\Entity\BlhCurva $idCurva
     * @return BlhPasteurizacion
     */
    public function setIdCurva(\siblh\menuBundle\Entity\BlhCurva $idCurva = null)
    {
        $this->idCurva = $idCurva;
    
        return $this;
    }

    /**
     * Get idCurva
     *
     * @return \siblh\menuBundle\Entity\BlhCurva 
     */
    public function getIdCurva()
    {
        return $this->idCurva;
    }
}
