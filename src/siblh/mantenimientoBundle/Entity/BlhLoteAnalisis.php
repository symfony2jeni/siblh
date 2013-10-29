<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhLoteAnalisis
 *
 * @ORM\Table(name="blh_lote_analisis")
 * @ORM\Entity
 */
class BlhLoteAnalisis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_lote_analisis_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_lote_analisis", type="string", length=11, nullable=false)
     */
    private $codigoLoteAnalisis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_analisis_fisico_quimico", type="date", nullable=false)
     */
    private $fechaAnalisisFisicoQuimico;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_analisis", type="string", length=60, nullable=false)
     */
    private $responsableAnalisis;



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
     * Set codigoLoteAnalisis
     *
     * @param string $codigoLoteAnalisis
     * @return BlhLoteAnalisis
     */
    public function setCodigoLoteAnalisis($codigoLoteAnalisis)
    {
        $this->codigoLoteAnalisis = $codigoLoteAnalisis;
    
        return $this;
    }

    /**
     * Get codigoLoteAnalisis
     *
     * @return string 
     */
    public function getCodigoLoteAnalisis()
    {
        return $this->codigoLoteAnalisis;
    }

    /**
     * Set fechaAnalisisFisicoQuimico
     *
     * @param \DateTime $fechaAnalisisFisicoQuimico
     * @return BlhLoteAnalisis
     */
    public function setFechaAnalisisFisicoQuimico($fechaAnalisisFisicoQuimico)
    {
        $this->fechaAnalisisFisicoQuimico = $fechaAnalisisFisicoQuimico;
    
        return $this;
    }

    /**
     * Get fechaAnalisisFisicoQuimico
     *
     * @return \DateTime 
     */
    public function getFechaAnalisisFisicoQuimico()
    {
        return $this->fechaAnalisisFisicoQuimico;
    }

    /**
     * Set responsableAnalisis
     *
     * @param string $responsableAnalisis
     * @return BlhLoteAnalisis
     */
    public function setResponsableAnalisis($responsableAnalisis)
    {
        $this->responsableAnalisis = $responsableAnalisis;
    
        return $this;
    }

    /**
     * Get responsableAnalisis
     *
     * @return string 
     */
    public function getResponsableAnalisis()
    {
        return $this->responsableAnalisis;
    }
}