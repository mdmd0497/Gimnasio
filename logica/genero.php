<?php
class genero 
{
    private $id_gen;
    private $genero;
    private $generoDAO;
    private $conexion;
    
    
    
    
    
    /**
     * @return GeneroDAO
     */
    public function getGeneroDAO()
    {
        return $this->generoDAO;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param GeneroDAO $generoDAO
     */
    public function setGeneroDAO($generoDAO)
    {
        $this->generoDAO = $generoDAO;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @return string
     */
    public function getId_gen()
    {
        return $this->id_gen;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }
    
    /**
     * @param string $id_gen
     */
    public function setId_gen($id_gen)
    {
        $this->id_gen = $id_gen;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    function __construct($id_gen = "", $genero = "")
    {
        $this->id_gen = $id_gen;
        $this->genero = $genero;

        $this->conexion = new Conexion();
        $this->generoDAO = new GeneroDAO($id_gen, $genero);
    } 
    
    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->generoDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new genero($registro[0],$registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
}
?>