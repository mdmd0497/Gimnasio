<?php
require 'persistencia/ClienteDAO.php';
require_once 'persistencia/Conexion.php';

class Cliente extends Persona
{
    private $observaciones;
    private $estado;
    private $telefono;
    private $pacienteDAO;
    private $conexion;
    private $foto;


    function getEstado()
    {
        return $this->estado;
    }

    function getobservaciones()
    {
        return $this->observaciones;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function getFoto()
    {
        return $this->foto;
    }


    function Paciente($id = "", $nombre = "", $apellido = "", $correo = "", $salt, $clave = "", $foto = "", $telefono = "", $observaciones = "", $estado = "")
    {
        $this->Persona($id, $nombre, $apellido, $correo, $salt, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->observaciones = $observaciones;
        $this->estado = $estado;

        $this->conexion = new Conexion();
        $this->pacienteDAO = new ClienteDAO($id, $nombre, $apellido, $correo, $salt, $clave, $foto, $telefono, $observaciones, $estado);
    }

    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ClienteDAO->registrar());
        $this->conexion->cerrar();
    }
}
?>
    