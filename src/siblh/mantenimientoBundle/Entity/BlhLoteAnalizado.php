<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhLoteAnalizado
 *
 * @ORM\Table(name="blh_lote_analizado")
 * @ORM\Entity
 */
class BlhLoteAnalizado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_lote_analizado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_lote_analizado", type="string", length=11, nullable=false)
     */
    private $codigoLoteAnalizado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_analisis_fisico_quimico", type="date", nullable=false)
     */
    private $fechaAnalisisFisicoQuimico;



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
     * Set codigoLoteAnalizado
     *
     * @param string $codigoLoteAnalizado
     * @return BlhLoteAnalizado
     */
    public function setCodigoLoteAnalizado($codigoLoteAnalizado)
    {
        $this->codigoLoteAnalizado = $codigoLoteAnalizado;
    
        return $this;
    }

    /**
     * Get codigoLoteAnalizado
     *
     * @return string 
     */
    public function getCodigoLoteAnalizado()
    {
        return $this->codigoLoteAnalizado;
    }

    /**
     * Set fechaAnalisisFisicoQuimico
     *
     * @param \DateTime $fechaAnalisisFisicoQuimico
     * @return BlhLoteAnalizado
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
}