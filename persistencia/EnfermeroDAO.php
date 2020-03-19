<?php

class EnfermeroDAO extends Persona
{

    private $foto;

    private $telefono;

    /**
     * EnfermeroDAO constructor.
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
    }
    
    function registrar()
    {
        return "INSERT INTO enfermero (nombre, apellido, correo, clave, telefono)
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->clave . "', '" . $this->telefono . "');";
    }
    
    function existeCorreo()
    {
        return "SELECT id
                FROM enfermero
                WHERE correo LIKE '" . $this->correo . "';";
    }
}

?>