<?php
class PacienteDAO
{
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $salt;
    private $clave;
    private $foto;
    private $telefono;
    private $observaciones;
    private $estado;
   
    
    function ClienteDAO($id = "", $nombre = "", $apellido = "", $correo = "",$salt, $clave = "",$foto= "",$telefono= "",$observaciones= "",$estado= "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->salt = $salt;
        $this->clave = $clave;
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->observaciones = $observaciones;
        $this->estado = $estado;
    }
    
    function registrar()
    {
        return "INSERT INTO cliente (nombre, apellido, correo,salt, clave,telefono, observaciones, estado)
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->$salt . "', md5('" . $this->clave . "'), '" . $this->telefono . "', '" . $this->estado . "')";
    }