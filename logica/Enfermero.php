<?php


class Enfermero extends Persona
{
    private $foto;
    private $telefono;
    private $EnfermeroDAO;
    private $conexion;

    /**
     * Enfermero constructor.
     * @param $foto
     * @param $telefono
     */
    public function __construct($id="", $nombre="", $apellido="", $correo="", $clave="",$foto="", $telefono="")
    {
        parent::__construct($id,$nombre,$apellido,$correo,$clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->conexion = new Conexion();
        $this->EnfermeroDAO = new EnfermeroDAO();
    }


}

?>