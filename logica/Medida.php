<?php


class Medida
{
    private $id;
    private $altura;
    private $peso;
    private $cuello;
    private $hombros;
    private $pecho;
    private $cintura;
    private $antebrazos;
    private $muslo;
    private $pantorrillas;
    private $biceps;
    private $cadera;
    private $fecha;
    private $id_cliente;
    private $id_enfermero;
    private $conexion;
    private $MedidaDAO;



    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed|string
     */
    public function getCuello(): mixed
    {
        return $this->cuello;
    }

    /**
     * @param mixed|string $cuello
     */
    public function setCuello(mixed $cuello): void
    {
        $this->cuello = $cuello;
    }

    /**
     * @return mixed|string
     */
    public function getHombros(): mixed
    {
        return $this->hombros;
    }

    /**
     * @param mixed|string $hombros
     */
    public function setHombros(mixed $hombros): void
    {
        $this->hombros = $hombros;
    }

    /**
     * @return mixed|string
     */
    public function getPecho(): mixed
    {
        return $this->pecho;
    }

    /**
     * @param mixed|string $pecho
     */
    public function setPecho(mixed $pecho): void
    {
        $this->pecho = $pecho;
    }

    /**
     * @return mixed|string
     */
    public function getCintura(): mixed
    {
        return $this->cintura;
    }

    /**
     * @param mixed|string $cintura
     */
    public function setCintura(mixed $cintura): void
    {
        $this->cintura = $cintura;
    }

    /**
     * @return mixed|string
     */
    public function getAntebrazos(): mixed
    {
        return $this->antebrazos;
    }

    /**
     * @param mixed|string $antebrazos
     */
    public function setAntebrazos(mixed $antebrazos): void
    {
        $this->antebrazos = $antebrazos;
    }

    /**
     * @return mixed|string
     */
    public function getMuslo(): mixed
    {
        return $this->muslo;
    }

    /**
     * @param mixed|string $muslo
     */
    public function setMuslo(mixed $muslo): void
    {
        $this->muslo = $muslo;
    }

    /**
     * @return mixed|string
     */
    public function getPantorrillas(): mixed
    {
        return $this->pantorrillas;
    }

    /**
     * @param mixed|string $pantorrillas
     */
    public function setPantorrillas(mixed $pantorrillas): void
    {
        $this->pantorrillas = $pantorrillas;
    }

    /**
     * @return mixed|string
     */
    public function getBiceps(): mixed
    {
        return $this->biceps;
    }

    /**
     * @param mixed|string $biceps
     */
    public function setBiceps(mixed $biceps): void
    {
        $this->biceps = $biceps;
    }

    /**
     * @return mixed|string
     */
    public function getCadera(): mixed
    {
        return $this->cadera;
    }

    /**
     * @param mixed|string $cadera
     */
    public function setCadera(mixed $cadera): void
    {
        $this->cadera = $cadera;
    }


    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return string
     */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return string
     */
    public function getId_enfermero()
    {
        return $this->id_enfermero;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @return MedidaDAO
     */
    public function getMedidaDAO()
    {
        return $this->MedidaDAO;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @param string $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param string $id_cliente
     */
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @param string $id_enfermero
     */
    public function setId_enfermero($id_enfermero)
    {
        $this->id_enfermero = $id_enfermero;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @param MedidaDAO $MedidaDAO
     */
    public function setMedidaDAO($MedidaDAO)
    {
        $this->MedidaDAO = $MedidaDAO;
    }

    function __construct($id = "", $altura = "", $peso = "", $cuello = "", $hombros = "", $pecho = "", $cintura = "", $antebrazos = "", $muslo = "", $pantorrillas = "", $biceps = "", $cadera = "", $fecha = "", $id_enfermero = "", $id_cliente = "")
    {
        $this->id = $id;
        $this->altura = $altura;
        $this->peso = $peso;
        $this->cuello = $cuello;
        $this->hombros = $hombros;
        $this->pecho = $pecho;
        $this->cintura = $cintura;
        $this->antebrazos = $antebrazos;
        $this->muslo = $muslo;
        $this->pantorrillas = $pantorrillas;
        $this->biceps = $biceps;
        $this->cadera = $cadera;
        $this->fecha = $fecha;
        $this->id_enfermero = $id_enfermero;
        $this->id_cliente = $id_cliente;

        $this->conexion = new Conexion();
        $this->MedidaDAO = new MedidaDAO($id, $altura, $peso, $cuello, $hombros, $pecho, $cintura, $antebrazos, $muslo, $pantorrillas, $biceps, $cadera, $fecha, $id_enfermero, $id_cliente);
    }

    function agregarMedida()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->agregarMedida());
        $this->conexion->cerrar();
    }

    public function consultarmodalenfermero()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->consultarmodalenfermero());
        $resultado = $this->conexion->extraer();
        $this->altura = $resultado[0];
        $this->peso = $resultado[1];
    }

    public function obtenerMedidas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->obtenerMedidas());
        // print_r($this->MedidaDAO->obtenerMedidas());
        // die();
        $resultados = array();

        while (($registro = $this->conexion->extraer()) != null) {
            array_push($resultados, new Medida(
                $registro[0],
                $registro[1],
                $registro[2],
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                $registro[3],
                $registro[4],
                $registro[5],
            ));
        }
       
        $this->conexion->cerrar();
        return $resultados;
    }
}
