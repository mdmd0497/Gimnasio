<?php


class Medida
{
    private $id;
    private $altura;
    private $peso;
    private $fecha;
    private $id_cliente;
    private $id_enfermero;
    private $conexion;
    private $MedidaDAO;
    
    

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @return string
     */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return string
     */
    public function getId_enfermero()
    {
        return $this->id_enfermero;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @return MedidaDAO
     */
    public function getMedidaDAO()
    {
        return $this->MedidaDAO;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @param string $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @param string $id_cliente
     */
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @param string $id_enfermero
     */
    public function setId_enfermero($id_enfermero)
    {
        $this->id_enfermero = $id_enfermero;
    }

    /**
     * @param Conexion $conexion
     */
    public function setConexion($conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * @param MedidaDAO $MedidaDAO
     */
    public function setMedidaDAO($MedidaDAO)
    {
        $this->MedidaDAO = $MedidaDAO;
    }

    function __construct($id = "", $altura = "", $peso = "", $fecha = "", $id_enfermero = "", $id_cliente = "")
    {
        $this->id=$id;
        $this->altura=$altura;
        $this->peso=$peso;
        $this->fecha = $fecha;
        $this->id_enfermero=$id_enfermero;
        $this->id_cliente=$id_cliente;

        
        $this->conexion=new Conexion();
        $this->MedidaDAO = new MedidaDAO($id, $altura,$peso,$fecha,$id_enfermero,$id_cliente);
        
    }

    function agregarMedida(){
        $this->conexion->abrir();
        echo $this->MedidaDAO->agregarMedida();
        $this->conexion->ejecutar($this->MedidaDAO->agregarMedida());
        $this->conexion->cerrar();
    }
    
    public function consultarmodalenfermero()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->consultarmodalenfermero());
        $resultado = $this->conexion->extraer();
        $this->altura = $resultado[0];
        $this->peso = $resultado[1];
        
        
    }

    public function obtenerMedidas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->obtenerMedidas());
        $resultados = array();
        while (($registro = $this->conexion->extraer()) != null){
            array_push($resultados, new Medida(
                $registro[0],
                $registro[1],
                $registro[2],
                $registro[3],
                $registro[4],
                $registro[5]
            ));
        }
        $this->conexion->cerrar();
        return $resultados;
    }

}