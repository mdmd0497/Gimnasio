<?php


class Rutina
{
    private $id;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_entrenador;
    private $id_cliente;
    private $fecha_registro;
    private $conexion;
    private $RutinaDAO;

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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @return string
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @return string
     */
    public function getIdEntrenador()
    {
        return $this->id_entrenador;
    }

    /**
     * @return string
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @return RutinaDAO
     */
    public function getRutinaDAO()
    {
        return $this->RutinaDAO;
    }

    /**
     * @return string
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }





    public function __construct($id="", $descripcion="", $fecha_inicio="", $fecha_fin="", $id_entrenador="", $id_cliente="", $fecha_registro="")
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->id_entrenador = $id_entrenador;
        $this->id_cliente = $id_cliente;
        $this->fecha_registro = $fecha_registro;
        $this->conexion = new Conexion();
        $this->RutinaDAO = new RutinaDAO($id, $descripcion, $fecha_inicio, $fecha_fin, $id_entrenador, $id_cliente, $fecha_registro);
    }

    function registrarRutina(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->registrarRutina());
        $this->conexion->cerrar();
    }

    function consultarRutinas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->consultarRutinas());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return null;
        } else {
            $resultados = array();
            $i = 0;
            while (($registro = $this->conexion->extraer()) != null) {
                $resultados[$i] = new Rutina($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6]);
                $i++;
            }
            $this->conexion->cerrar();
            return $resultados;
        }
    }

     function consultar(){
            $this->conexion->abrir();
            $this->conexion->ejecutar($this->RutinaDAO->consultar());
            $resultado = $this->conexion->extraer();
            $this->descripcion=$resultado[1];
            $this->fecha_inicio=$resultado[2];
            $this->fecha_fin=$resultado[3];
            $this->id_cliente=$resultado[5];
            $this->fecha_registro=$resultado[6];
            $this->conexion->cerrar();
     }




}