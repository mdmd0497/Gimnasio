<?php

class Enfermero extends Persona
{

    private $foto;

    private $telefono;

    private $EnfermeroDAO;

    private $conexion;

    /**
     * Enfermero constructor.
     *
     * @param
     *            $foto
     * @param
     *            $telefono
     */
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->conexion = new Conexion();
        $this->EnfermeroDAO = new EnfermeroDAO();
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
}

?>