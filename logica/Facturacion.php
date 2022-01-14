<?php

class Facturacion
{
    private $id;
    private $valor;
    private $descuento;
    private $tipo_tarifa;
    private $fecha_inicio;
    private $fecha_vencimiento;
    private $cliente_id;
    private $administrador_id;
    private $conexion;
    private $FacturacionDAO;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor): void
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * @param mixed $descuento
     */
    public function setDescuento($descuento): void
    {
        $this->descuento = $descuento;
    }

    /**
     * @return mixed
     */
    public function getTipoTarifa()
    {
        return $this->tipo_tarifa;
    }

    /**
     * @param mixed $tipo_tarifa
     */
    public function setTipoTarifa($tipo_tarifa): void
    {
        $this->tipo_tarifa = $tipo_tarifa;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio): void
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaVencimiento()
    {
        return $this->fecha_vencimiento;
    }

    /**
     * @param mixed $fecha_vencimiento
     */
    public function setFechaVencimiento($fecha_vencimiento): void
    {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * @param mixed $cliente_id
     */
    public function setClienteId($cliente_id): void
    {
        $this->cliente_id = $cliente_id;
    }

    /**
     * @return mixed
     */
    public function getAdministradorId()
    {
        return $this->administrador_id;
    }

    /**
     * @param mixed $administrador_id
     */
    public function setAdministradorId($administrador_id): void
    {
        $this->administrador_id = $administrador_id;
    }

    public function __construct($id="", $valor="", $descuento="", $tipo_tarifa="", $fecha_inicio="", $fecha_vencimiento="", $cliente_id="", $administrador_id="")
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->descuento = $descuento;
        $this->tipo_tarifa = $tipo_tarifa;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->cliente_id = $cliente_id;
        $this->administrador_id = $administrador_id;
        $this->conexion = new Conexion();
        $this->FacturacionDAO = new FacturacionDAO($id,$valor,$descuento,$tipo_tarifa,$fecha_inicio,$fecha_vencimiento,$cliente_id,$administrador_id);
    }

    function registrarFactura(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->FacturacionDAO->registrarFactura());
        $this->conexion->cerrar();
    }

    function consultarTodos(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->FacturacionDAO->consultarTodos());
        $this -> conexion -> cerrar();
        $facturas = array();
        while (($resultado = $this->conexion->extraer()) != null){
            array_push($facturas, new Facturacion(
                $resultado[0],
                $resultado[1],
                $resultado[2],
                $resultado[3],
                $resultado[4],
                $resultado[5],
                $resultado[6],
                $resultado[7]
            ));
        }
        return $facturas;
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->FacturacionDAO->consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this->id = $resultado[0];
        $this->valor = $resultado[1];
        $this->descuento = $resultado[2];
        $this->tipo_tarifa = $resultado[3];
        $this->fecha_inicio = $resultado[4];
        $this->fecha_vencimiento = $resultado[5];
        $this->cliente_id = $resultado[6];
        $this->administrador_id = $resultado[7];
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> FacturacionDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $facturas = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($facturas, new Facturacion(
                $resultado[0],
                $resultado[1],
                $resultado[2],
                $resultado[3],
                $resultado[4],
                $resultado[5],
                $resultado[6],
                $resultado[7]
            ));
        }
        return $facturas;
    }

    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> FacturacionDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function update(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->FacturacionDAO->update());
        $this -> conexion -> cerrar();
    }

    function existeFactura()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->FacturacionDAO->existeFactura());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return false;
        } else {
            $this->conexion->cerrar();
            return true;
        }
    }

    function ultimaFactura()
    {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->FacturacionDAO->ultimaFactura());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this->id = $resultado[0];
        $this->valor = $resultado[1];
        $this->descuento = $resultado[2];
        $this->tipo_tarifa = $resultado[3];
        $this->fecha_inicio = $resultado[4];
        $this->fecha_vencimiento = $resultado[5];
        $this->cliente_id = $resultado[6];
        $this->administrador_id = $resultado[7];
    }
}

?>
