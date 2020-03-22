<?php

class Cliente extends Persona
{

    private $observaciones;

    private $estado;

    private $telefono;

    private $clienteDAO;

    private $conexion;

    private $foto;
    
    private $identre;
    
    private $idenfer;
    
    private $id_gen;
    
    private $id_rh;

    
    
    /**
     * @return mixed
     */
    public function getId_gen()
    {
        return $this->id_gen;
    }

    /**
     * @return mixed
     */
    public function getId_rh()
    {
        return $this->id_rh;
    }

    /**
     * @param mixed $id_gen
     */
    public function setId_gen($id_gen)
    {
        $this->id_gen = $id_gen;
    }

    /**
     * @param mixed $id_rh
     */
    public function setId_rh($id_rh)
    {
        $this->id_rh = $id_rh;
    }

    /**
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     *
     * @param string $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    /**
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     *
     * @param string $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

   
    public function getClienteDAO()
    {
        return $this->clienteDAO;
    }

    
    public function setClienteDAO($clienteDAO)
    {
        $this->clienteDAO = $clienteDAO;
    }

    /**
     *
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     *
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     *
     * @param string $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     *
     * @param string $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     *
     * @param string $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }
    
    public function getIdentre(){
        
        return $this->identre;
    }
    
    public function getIdenfer(){
        
        return $this->idenfer;
    }
    

    function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "", $foto = "", $telefono = "", $observaciones = "", $estado = "",$identre = "", $idenfer = "", $id_gen = "", $id_rh = "")
    {
        parent::__construct($id, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this->observaciones = $observaciones;
        $this->estado = $estado;
        $this->identre = $identre;
        $this->idenfer = $idenfer;
        $this->id_gen = $id_gen;
        $this->id_rh = $id_rh;

        $this->conexion = new Conexion();
        $this->clienteDAO = new ClienteDAO($id, $nombre, $apellido, $correo, $clave, $foto, $telefono, $observaciones, $estado, $identre, $idenfer, $id_gen, $id_rh);
    } 

    function registrar()
    {
        
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->registrar());
        $this->conexion->cerrar();
    }
    
    function actualizarEstado(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->clienteDAO->actualizarEstado());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4], $registro[5], $registro[6], $registro[7]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
 

    function existeCorreo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->existeCorreo());
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
        $this->conexion->ejecutar($this->clienteDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->clave = $resultado[4];
    }
    
    function actualizar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->actualizar());
        $this->conexion->cerrar();
    }
    
    public function consultarmodal()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->consultarmodal());
        $resultado = $this->conexion->extraer();
        $this->id = $resultado[0];
        $this->nombre = $resultado[1];
        $this->apellido = $resultado[2];
        $this->correo = $resultado[3];
        $this->foto = $resultado[4];
        $this->telefono = $resultado[5];
        $this->estado = $resultado[6];
        
    }
    
    function fotoExiste()
    {
        $this->conexion->abrir();
        
        $this->conexion->ejecutar($this->clienteDAO->fotoExiste());
        if ($this->conexion->extraer()[0] === "" || !($this->conexion->extraer()[0])) {
            $this->conexion->cerrar();
            return 0;
        } else {
            $this->conexion->ejecutar($this->clienteDAO->fotoExiste());
            $resultado = $this->conexion->extraer()[0];
            $this->conexion->cerrar();
            return $resultado;
        }
    }
    
    function actualizarFoto()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->actualizarFoto());
        $this->conexion->cerrar();
    }

    function filtroCliente($filtro) {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->filtroCliente($filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4], $registro[5], $registro[6], $registro[7],"","");
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
    function filtroClienteEnfermero($idenfermero,$filtro) {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->filtroClienteEnfermero($idenfermero,$filtro));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4], $registro[5], $registro[6], $registro[7],"","");
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
}
?>
    