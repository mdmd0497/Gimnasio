<?php

class ClienteDAO extends Persona
{

    private $foto;

    private $telefono;

    private $observaciones;

    private $estado;
    
    private $identre;
    
    private $idenfer;
    
    private $id_gen;
    
    private $id_rh;

    function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $observaciones = "", $estado = "", $identre = "", $idenfer = "", $id_gen = "", $id_rh = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->observaciones = $observaciones;
        $this->estado = $estado;
        $this->identre = $identre;
        $this->idenfer = $idenfer;
        $this->id_gen =  $id_gen;
        $this->id_rh = $id_rh;
    }

    function registrar()
    {
        return "INSERT INTO cliente (nombre, apellido, correo, clave, telefono, observaciones, estado,entrenador_id,enfermero_id,genero_id,rh_id)
                VALUES ('" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo .
                        "', '" . $this->clave . "', '" . $this->telefono . "', '" . $this->observaciones . "', 0, '$this->identre','$this->idenfer','$this->id_gen','$this->id_rh');";
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
        return "SELECT c.id,c.nombre,c.apellido,c.correo,c.foto,c.telefono,c.estado,CONCAT(e.nombre, ' ', e.apellido),CONCAT(en.nombre, ' ' , en.apellido), g.genero,r.rh
                FROM cliente as c,entrenador as e,enfermero as en,genero as g,rh as r
                WHERE c.id = " . $this->id. " AND c.entrenador_id = e.id AND c.enfermero_id = en.id AND c.genero_id = g.id AND c.rh_id = r.id";
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
    
    public function filtroClienteEnfermero($idenfermero,$filtro)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono, observaciones, estado
				FROM cliente
				WHERE CONCAT(nombre, ' ', apellido) LIKE '%" . $filtro . "%' AND enfermero_id = ". $idenfermero . " AND estado != 0;";
    }

    public function filtroClienteEntrenador($identrenador,$filtro)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono, observaciones, estado
				FROM cliente
				WHERE CONCAT(nombre, ' ', apellido) LIKE '%" . $filtro . "%' AND entrenador_id = ". $identrenador . " AND estado != 0;";
    }
    
    function consultarTodos($idenfermero)
    {
        return "SELECT id, nombre, apellido, correo, foto, telefono, estado,genero_id
                FROM cliente
                WHERE enfermero_id = ". $idenfermero . " AND estado != 0
                ORDER BY id;";
    }
    
    
    function actualizarEstado(){
        $est = ($this->estado==1)?"0":"1";
        return "UPDATE cliente
                SET estado = " . $est .
                " WHERE id = " . $this->id;
        
    }
    
    function agruparPorGenero(){
        return "SELECT c.genero_id, COUNT(c.genero_id) 
                FROM cliente as c,enfermero as e, genero as g 
                WHERE c.enfermero_id=e.id AND c.genero_id=g.id AND c.estado != 0 
                GROUP BY c.genero_id";
    }

    function actualizarEntrenador(){
        return "UPDATE cliente
                SET entrenador_id = " . $this->identre .
                " WHERE id = " . $this->id;
    }

    function consultarMedidas($idCliente){
        return "SELECT altura,peso,fecha FROM `medidas` WHERE cliente_idcliente = $idCliente ";
    }
}

?>
