<?php

class Enfermero extends Persona
{

    private $foto;

    private $telefono;

    private $EnfermeroDAO;

    private $conexion;


    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->conexion = new Conexion();
        $this->EnfermeroDAO = new EnfermeroDAO($id, $nombre, $apellido, $correo, $clave,$foto,$telefono);
    }
    
    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->registrar());
        $this->conexion->cerrar();
    }
    
    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->existeCorreo());
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
        $this->conexion->ejecutar($this->EnfermeroDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
}

?>