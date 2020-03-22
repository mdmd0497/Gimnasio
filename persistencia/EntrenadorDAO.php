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
    
    public function filtroEntrenador($filtro)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono
				FROM entrenador
				WHERE nombre LIKE '%" . $filtro . "%' OR apellido LIKE '%" . $filtro . "%' OR CONCAT(nombre, ' ', apellido) LIKE '%" . $filtro . "%';";
    }
    
    public function consultarmodal()
    {
        return "SELECT id,nombre,apellido,correo,foto,telefono
                FROM entrenador
                WHERE id = " . $this->id;
    }
    
    function fotoExiste()
    {
        return "SELECT foto
                FROM entrenador
                WHERE id = " . $this->id;
    }
    
    function actualizarFoto()
    {
        return "UPDATE entrenador
                SET foto = '" . $this->foto . "'
                WHERE id = " . $this->id;
    }
    
    function actualizar()
    {
        return "update entrenador set
                nombre = '" . $this->nombre . "',
                apellido='" . $this->apellido . "',
                correo ='" . $this->correo . "',
                telefono='" . $this->telefono . "'
                where id=" . $this->id;
    }
    
    function consultarTodos()
    {
        return "SELECT id, nombre, apellido
                FROM entrenador";
    }
}

?>
