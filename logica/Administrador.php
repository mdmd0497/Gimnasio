<?php

class Administrador extends Persona
{

    private $administradorDAO;

    private $conexion;

    /**
     * Administrador constructor.
     */
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->administradorDAO = new AdministradorDAO($id, $nombre, $apellido, $correo, $clave);
        $this->conexion = new Conexion();
    }

    public function registro()
    {
        $this->conexion->abrir();
        echo $this->administradorDAO->registro();
        $this->conexion->ejecutar($this->administradorDAO->registro());
        $this->conexion->cerrar();
    }

    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->administradorDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
}

?>