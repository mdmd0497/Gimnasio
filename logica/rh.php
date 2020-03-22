<?php
class rh
{
    private $id_rh;
    private $rh;
    private $conexion;
    private $rhDAO;
    /**
     * @return mixed
     */
    public function getId_rh()
    {
        return $this->id_rh;
    }

    /**
     * @return mixed
     */
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * @return mixed
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @return mixed
     */
    public function getRhDAO()
    {
        return $this->rhDAO;
    }

    /**
     * @param mixed $id_rh
     */
    public function setId_rh($id_rh)
    {
        $this->id_rh = $id_rh;
    }

    /**
     * @param mixed $rh
     */
    public function setRh($rh)
    {
        $this->rh = $rh;
    }

    /**
     * @param mixed $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @param mixed $rhDAO
     */
    public function setRhDAO($rhDAO)
    {
        $this->rhDAO = $rhDAO;
    }

    function __construct($id_rh = "", $rh = "")
    {
        $this->id_rh = $id_rh;
        $this->rh = $rh;
        
        $this->conexion = new Conexion();
        $this->rhDAO = new rhDAO($id_rh, $rh);
    } 
    
    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->rhDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new rh($registro[0],$registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
   
}
?>