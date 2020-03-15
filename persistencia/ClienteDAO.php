<?php
class ClienteDAO extends Persona
{
    private $foto;
    private $telefono;
    private $observaciones;
    private $estado;
   
    
    function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $observaciones = "", $estado = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->observaciones = $observaciones;
        $this->estado = $estado;
    }
    
    function registrar()
    {
        return "INSERT INTO cliente (nombre, apellido, correo, clave, telefono, observaciones, estado)
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->clave . "', '" . $this->telefono . "', '" . $this->observaciones ."', 0);";
    }
    
    function existeCorreo()
    {
        return "SELECT id
                FROM cliente
                WHERE correo = '" . $this->correo . "'";
    }
}
?>
