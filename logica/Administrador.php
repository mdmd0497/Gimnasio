<?php


class Administrador extends Persona
{
    private $administradorDAO;
    private $conexion;
    /**
     * Administrador constructor.
     */
    public function __construct($id="", $nombre="", $apellido="", $correo="", $salt="", $clave="")
    {
        parent::__construct($id,$nombre,$apellido,$correo,$salt,$clave);
        $this->administradorDAO;
        $this->conexion = new Conexion();
    }
}