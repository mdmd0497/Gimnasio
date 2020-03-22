<?php

class Entrenador extends Persona
{

    private $foto;

    private $telefono;
    
    private $rutina;

    private $EntrenadorDAO;

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
     * @return string
     */
    public function getRutina()
    {
        return $this->rutina;
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

    /**
     * @param string $rutina
     */
    public function setRutina($rutina)
    {
        $this->rutina = $rutina;
    }

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $rutina = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->rutina = $rutina;
        $this->conexion = new Conexion();
        $this->EntrenadorDAO = new EntrenadorDAO($id, $nombre, $apellido, $correo, $clave,$foto,$telefono,$rutina);
    }
    
    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->registrar());
        $this->conexion->cerrar();
    }
    
    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->existeCorreo());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }
    
    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
    
    public function consultarmodal()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->consultarmodal());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->foto = $resultado[4];
        $this->telefono = $resultado[5];
        
    }
    
    function filtroEntrenador($filtro) {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->filtroEntrenador($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Entrenador($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4], $registro[5],"");
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
    function actualizar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->actualizar());
        $this->conexion->cerrar();
    }
    
    function fotoExiste()
    {
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->EntrenadorDAO->fotoExiste());
        if ($this->conexion->extraer()[0] === "" || !($this->conexion->extraer()[0])) {
            $this->conexion->cerrar();
            return 0;
        } else {
            $this->conexion->ejecutar($this->EntrenadorDAO->fotoExiste());
            $resultado = $this->conexion->extraer()[0];
            $this->conexion->cerrar();
            return $resultado;
        }
    }
    
    function actualizarFoto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->actualizarFoto());
        $this->conexion->cerrar();
    }
    
    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->EntrenadorDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Entrenador($registro[0],$registro[1],$registro[2],"","","","","");
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
}

?>