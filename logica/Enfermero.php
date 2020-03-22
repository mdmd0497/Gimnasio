<?php

class Enfermero extends Persona
{

    private $foto;

    private $telefono;

    private $EnfermeroDAO;

    private $conexion;

    
    
    
    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param string $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->conexion = new Conexion();
        $this->EnfermeroDAO = new EnfermeroDAO($id, $nombre, $apellido, $correo, $clave,$foto,$telefono);
    }
    
    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->registrar());
        $this->conexion->cerrar();
    }
    
    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->existeCorreo());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }
    
    function filtroEnfermero($filtro) {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->filtroEnfermero($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Enfermero($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4], $registro[5]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
    function actualizar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->actualizar());
        $this->conexion->cerrar();
    }
    
    function fotoExiste()
    {
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->EnfermeroDAO->fotoExiste());
        if ($this->conexion->extraer()[0] === "" || !($this->conexion->extraer()[0])) {
            $this->conexion->cerrar();
            return 0;
        } else {
            $this->conexion->ejecutar($this->EnfermeroDAO->fotoExiste());
            $resultado = $this->conexion->extraer()[0];
            $this->conexion->cerrar();
            return $resultado;
        }
    }
    
    public function consultarmodal()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->consultarmodal());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->foto = $resultado[4];
        $this->telefono = $resultado[5];
        
    }
    
    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
    
    
    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Enfermero($registro[0],$registro[1],$registro[2],"","","","");
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
    function actualizarFoto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EnfermeroDAO->actualizarFoto());
        $this->conexion->cerrar();
    }
    
}

?>