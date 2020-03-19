<?php

class Entrenador extends Persona
{

    private $foto;

    private $telefono;
    
    private $rutina;

    private $EntrenadorDAO;

    private $conexion;


    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $rutina = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->rutina = $rutina;
        $this->conexion = new Conexion();
        $this->EntrenadorDAO = new EntrenadorDAO($id, $nombre, $apellido, $correo, $clave,$foto,$telefono,$rutina);
    }
    
    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->registrar());
        $this->conexion->cerrar();
    }
    
    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->existeCorreo());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }
    
    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
}

?>