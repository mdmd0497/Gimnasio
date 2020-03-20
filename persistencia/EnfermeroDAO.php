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
    
    public function consultar()
    {
        return "SELECT *
                FROM enfermero
                WHERE correo LIKE '" . $this->correo . "'
                OR id = " . $this->id;
    }
    
    public function consultarmodal()
    {
        return "SELECT id,nombre,apellido,correo,foto,telefono
                FROM enfermero
                WHERE id = " . $this->id;
    }
    
    function fotoExiste()
    {
        return "SELECT foto
                FROM enfermero
                WHERE id = " . $this->id;
    }
    
    function actualizar()
    {
        return "update enfermero set
                nombre = '" . $this->nombre . "',
                apellido='" . $this->apellido . "',
                correo ='" . $this->correo . "',
                telefono='" . $this->telefono . "'
                where id=" . $this->id;
    }
    
    public function filtroEnfermero($filtro)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono
				FROM enfermero
				WHERE nombre LIKE '%" . $filtro . "%' OR apellido LIKE '%" . $filtro . "%' OR CONCAT(nombre, ' ', apellido) LIKE '%" . $filtro . "%';";
    }
    
    function actualizarFoto()
    {
        return "UPDATE enfermero
                SET foto = '" . $this->foto . "'
                WHERE id = " . $this->id;
    }
}

?>