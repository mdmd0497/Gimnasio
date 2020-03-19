<?php

class EntrenadorDAO extends Persona
{

    private $foto;

    private $telefono;
    
    private $rutina;

    /**
     * EntrenadorDAO constructor.
     *
     * @param
     *            $foto
     * @param
     *            $telefono
     */
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $rutina = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->rutina = $rutina;
    }
    
    function registrar()
    {
        return "INSERT INTO entrenador (nombre, apellido, correo, clave, telefono)
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->clave . "', '" . $this->telefono . "');";
    }
    
    function existeCorreo()
    {
        return "SELECT id
                FROM entrenador
                WHERE correo LIKE '" . $this->correo . "';";
    }
    
    public function consultar()
    {
        return "SELECT *
                FROM entrenador
                WHERE correo LIKE '" . $this->correo . "'
                OR id = " . $this->id;
    }
}

?>
