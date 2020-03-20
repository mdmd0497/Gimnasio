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
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->clave . "', '" . $this->telefono . "', '" . $this->observaciones . "', 0);";
    }

    function existeCorreo()
    {
        return "SELECT id
                FROM cliente
                WHERE correo = '" . $this->correo . "'";
    }

    public function consultar()
    {
        return "SELECT *
                FROM cliente
                WHERE correo LIKE '" . $this->correo . "'
                OR id = " . $this->id;
    }
    
    public function consultarmodal()
    {
        return "SELECT id,nombre,apellido,correo,foto,telefono,estado
                FROM cliente
                WHERE id = " . $this->id;
    }
    
    function actualizar()
    {
        return "update cliente set
                nombre = '" . $this->nombre . "',
                apellido='" . $this->apellido . "',
                correo ='" . $this->correo . "',
                telefono='" . $this->telefono . "'
                where id=" . $this->id;
    }
    
    function fotoExiste()
    {
        return "SELECT foto
                FROM cliente
                WHERE id = " . $this->id;
    }
    
    function actualizarFoto()
    {
        return "UPDATE cliente
                SET foto = '" . $this->foto . "'
                WHERE id = " . $this->id;
    }

    public function filtroCliente($filtro)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono, observaciones, estado 
				FROM cliente 
				WHERE nombre LIKE '%" . $filtro . "%' OR apellido LIKE '%" . $filtro . "%' OR CONCAT(nombre, ' ', apellido) LIKE '%" . $filtro . "%';";
    }
    
    function consultarTodos()
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono, estado
                FROM cliente
                ORDER BY id";
    }
    
    
    function actualizarEstado(){
        $est = ($this->estado==1)?"0":"1";
        return "UPDATE cliente
                SET estado = " . $est .
                " WHERE id = " . $this->id;
        
    }


}

?>
