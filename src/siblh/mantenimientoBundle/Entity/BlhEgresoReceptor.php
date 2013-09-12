<?php

namespace siblh\mantenimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlhEgresoReceptor
 *
 * @ORM\Table(name="blh_egreso_receptor")
 * @ORM\Entity
 */
class BlhEgresoReceptor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="blh_egreso_receptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico_egreso", type="string", length=50, nullable=false)
     */
    private $diagnosticoEgreso;

    /**
     * @var string
     *
     * @ORM\Column(name="madre_canguro", type="string", length=2, nullable=false)
     */
    private $madreCanguro;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_egreso", type="string", length=6, nullable=false)
     */
    private $tipoEgreso;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario_egreso", type="string", length=50, nullable=true)
     */
    private $comentarioEgreso;

    /**
     * @var string
     *
     * @ORM\Column(name="traslado_periferico", type="string", length=2, nullable=false)
     */
    private $trasladoPeriferico;

    /**
     * @var integer
     *
     * @ORM\Column(name="permanencia_ucin", type="integer", nullable=true)
     */
    private $permanenciaUcin;

    /**
     * @var string
     *
     * @ORM\Column(name="hospital_seguimiento_egreso", type="string", length=30, nullable=true)
     */
    private $hospitalSeguimientoEgreso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_egreso", type="date", nullable=false)
     */
    private $fechaEgreso;

    /**
     * @var integer
     *
     * @ORM\Column(name="estancia_hospitalaria", type="integer", nullable=true)
     */
    private $estanciaHospitalaria;

    /**
     * @var \BlhReceptor
     *
     * @ORM\ManyToOne(targetEntity="BlhReceptor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_receptor", referencedColumnName="id")
     * })
     */
    private $idReceptor;



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
     * Set diagnosticoEgreso
     *
     * @param string $diagnosticoEgreso
     * @return BlhEgresoReceptor
     */
    public function setDiagnosticoEgreso($diagnosticoEgreso)
    {
        $this->diagnosticoEgreso = $diagnosticoEgreso;
    
        return $this;
    }

    /**
     * Get diagnosticoEgreso
     *
     * @return string 
     */
    public function getDiagnosticoEgreso()
    {
        return $this->diagnosticoEgreso;
    }

    /**
     * Set madreCanguro
     *
     * @param string $madreCanguro
     * @return BlhEgresoReceptor
     */
    public function setMadreCanguro($madreCanguro)
    {
        $this->madreCanguro = $madreCanguro;
    
        return $this;
    }

    /**
     * Get madreCanguro
     *
     * @return string 
     */
    public function getMadreCanguro()
    {
        return $this->madreCanguro;
    }

    /**
     * Set tipoEgreso
     *
     * @param string $tipoEgreso
     * @return BlhEgresoReceptor
     */
    public function setTipoEgreso($tipoEgreso)
    {
        $this->tipoEgreso = $tipoEgreso;
    
        return $this;
    }

    /**
     * Get tipoEgreso
     *
     * @return string 
     */
    public function getTipoEgreso()
    {
        return $this->tipoEgreso;
    }

    /**
     * Set comentarioEgreso
     *
     * @param string $comentarioEgreso
     * @return BlhEgresoReceptor
     */
    public function setComentarioEgreso($comentarioEgreso)
    {
        $this->comentarioEgreso = $comentarioEgreso;
    
        return $this;
    }

    /**
     * Get comentarioEgreso
     *
     * @return string 
     */
    public function getComentarioEgreso()
    {
        return $this->comentarioEgreso;
    }

    /**
     * Set trasladoPeriferico
     *
     * @param string $trasladoPeriferico
     * @return BlhEgresoReceptor
     */
    public function setTrasladoPeriferico($trasladoPeriferico)
    {
        $this->trasladoPeriferico = $trasladoPeriferico;
    
        return $this;
    }

    /**
     * Get trasladoPeriferico
     *
     * @return string 
     */
    public function getTrasladoPeriferico()
    {
        return $this->trasladoPeriferico;
    }

    /**
     * Set permanenciaUcin
     *
     * @param integer $permanenciaUcin
     * @return BlhEgresoReceptor
     */
    public function setPermanenciaUcin($permanenciaUcin)
    {
        $this->permanenciaUcin = $permanenciaUcin;
    
        return $this;
    }

    /**
     * Get permanenciaUcin
     *
     * @return integer 
     */
    public function getPermanenciaUcin()
    {
        return $this->permanenciaUcin;
    }

    /**
     * Set hospitalSeguimientoEgreso
     *
     * @param string $hospitalSeguimientoEgreso
     * @return BlhEgresoReceptor
     */
    public function setHospitalSeguimientoEgreso($hospitalSeguimientoEgreso)
    {
        $this->hospitalSeguimientoEgreso = $hospitalSeguimientoEgreso;
    
        return $this;
    }

    /**
     * Get hospitalSeguimientoEgreso
     *
     * @return string 
     */
    public function getHospitalSeguimientoEgreso()
    {
        return $this->hospitalSeguimientoEgreso;
    }

    /**
     * Set fechaEgreso
     *
     * @param \DateTime $fechaEgreso
     * @return BlhEgresoReceptor
     */
    public function setFechaEgreso($fechaEgreso)
    {
        $this->fechaEgreso = $fechaEgreso;
    
        return $this;
    }

    /**
     * Get fechaEgreso
     *
     * @return \DateTime 
     */
    public function getFechaEgreso()
    {
        return $this->fechaEgreso;
    }

    /**
     * Set estanciaHospitalaria
     *
     * @param integer $estanciaHospitalaria
     * @return BlhEgresoReceptor
     */
    public function setEstanciaHospitalaria($estanciaHospitalaria)
    {
        $this->estanciaHospitalaria = $estanciaHospitalaria;
    
        return $this;
    }

    /**
     * Get estanciaHospitalaria
     *
     * @return integer 
     */
    public function getEstanciaHospitalaria()
    {
        return $this->estanciaHospitalaria;
    }

    /**
     * Set idReceptor
     *
     * @param \siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor
     * @return BlhEgresoReceptor
     */
    public function setIdReceptor(\siblh\mantenimientoBundle\Entity\BlhReceptor $idReceptor = null)
    {
        $this->idReceptor = $idReceptor;
    
        return $this;
    }

    /**
     * Get idReceptor
     *
     * @return \siblh\mantenimientoBundle\Entity\BlhReceptor 
     */
    public function getIdReceptor()
    {
        return $this->idReceptor;
    }
}