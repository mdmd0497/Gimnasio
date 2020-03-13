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
        $this->administradorDAO = new AdministradorDAO($id,$nombre,$apellido,$correo,$salt,$clave);
        $this->conexion = new Conexion();
    }

    public function registroAdministrador(){

        $this->conexion->abrir();
        echo $this->administradorDAO->registroAdministrador();
        $this->conexion->ejecutar($this->administradorDAO->registroAdministrador());
        $this->conexion->cerrar();
    }
}

?>