<?php


class Rutina
{
    private $id;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_entrenador;
    private $id_cliente;
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




    public function __construct($id="", $descripcion="", $fecha_inicio="", $fecha_fin="", $id_entrenador="", $id_cliente="")
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->id_entrenador = $id_entrenador;
        $this->id_cliente = $id_cliente;
        $this->conexion = new Conexion();
        $this->RutinaDAO = new RutinaDAO($id, $descripcion, $fecha_inicio, $fecha_fin, $id_entrenador, $id_cliente);
    }

    function registrarRutina(){
        $this->conexion->abrir();
        echo $this->RutinaDAO->registrarRutina();
        $this->conexion->ejecutar($this->RutinaDAO->registrarRutina());
        $this->conexion->cerrar();
    }


}