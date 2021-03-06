<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boletin
 *
 * @ORM\Table(name="boletin")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BoletinRepository") 
 * 
 */ 

class Boletin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="agente", type="string", length=150)
     */
    private $agente;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=10, unique=true)
     */
    private $dni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string", length=255, nullable=true)
     */
    private $destino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaSalida", type="datetime")
     */
    private $horaSalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaRegreso", type="datetime")
     */
    private $horaRegreso;

    /**
     * @var int
     *
     * @ORM\Column(name="tiempoTotal", type="integer")
     */
    private $tiempoTotal; 

    /**
     * @ORM\ManyToOne(targetEntity="Dependencia")
     * @ORM\JoinColumn(name="dependencia_id", referencedColumnName="id")
     */
    private $dependencia;

    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set agente
     *
     * @param string $agente
     *
     * @return Boletin
     */
    public function setAgente($agente)
    {
        $this->agente = $agente;

        return $this;
    }

    /**
     * Get agente
     *
     * @return string
     */
    public function getAgente()
    {
        return $this->agente;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Boletin
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Boletin
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Boletin
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set destino
     *
     * @param string $destino
     *
     * @return Boletin
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set horaSalida
     *
     * @param \DateTime $horaSalida
     *
     * @return Boletin
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;

        return $this;
    }

    /**
     * Get horaSalida
     *
     * @return \DateTime
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * Set horaRegreso
     *
     * @param \DateTime $horaRegreso
     *
     * @return Boletin
     */
    public function setHoraRegreso($horaRegreso)
    {
        $this->horaRegreso = $horaRegreso;

        return $this;
    }

    /**
     * Get horaRegreso
     *
     * @return \DateTime
     */
    public function getHoraRegreso()
    {
        return $this->horaRegreso;
    }

    /**
     * Set tiempoTotal
     *
     * @param integer $tiempoTotal
     *
     * @return Boletin
     */
    public function setTiempoTotal($tiempoTotal)
    {
        $this->tiempoTotal = $tiempoTotal;

        return $this;
    }

    /**
     * Get tiempoTotal
     *
     * @return int
     */
    public function getTiempoTotal()
    {
        return $this->tiempoTotal;
    }

    /**
     * Get the value of dependencia
     */ 
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * Set the value of dependencia
     *
     * @return  self
     */ 
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;

        return $this;
    }
}

