<?php

class FacturacionDAO
{
    private $id;
    private $valor;
    private $descuento;
    private $tipo_tarifa;
    private $fecha_inicio;
    private $fecha_vencimiento;
    private $cliente_id;
    private $administrador_id;

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
    }

    function consultarTodos(){
        return "SELECT * FROM facturacion WHERE cliente_id = '".$this->cliente_id."'
        ORDER BY id DESC";
    }

    function consultar(){
        return "SELECT * FROM facturacion
                WHERE id = '". $this->id ."'";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "SELECT * FROM facturacion
                WHERE cliente_id = '" . $this->cliente_id . "' 
                ORDER BY id DESC
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "SELECT * FROM facturacion
                WHERE cliente_id = '" . $this->cliente_id . "' 
                ORDER BY id DESC
                ORDER BY " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }

    function consultarTotalRegistros(){
        return "select count(id)
                from facturacion";
    }

    function registrarFactura(){
        return "INSERT INTO facturacion (valor, descuento, tipo_tarifa, fecha_inicio, fecha_vencimiento, cliente_id, administrador_id)
                VALUES ('".$this->valor."', '".$this->descuento."', '".$this->tipo_tarifa."', '".$this->fecha_inicio."', '".$this->fecha_vencimiento."', '".$this->cliente_id."', '".$this->administrador_id."');";
    }

    function update() {
        return "UPDATE facturacion SET
                valor = '".$this->valor."',
                descuento = '".$this->descuento."',
                tipo_tarifa = '".$this->tipo_tarifa."',
                fecha_inicio = '".$this->fecha_inicio."',
                fecha_vencimiento = '".$this->fecha_vencimiento."',
                cliente_id = '".$this->cliente_id."',
                administrador = '".$this->administrador_id."'
                WHERE id = '".$this->id."';";
    }
    function existeFactura()
    {
        return "SELECT id
                FROM facturacion
                WHERE cliente_id = '" . $this->cliente_id . "'
                AND fecha_inicio  BETWEEN '".$this->fecha_inicio."' AND '".$this->fecha_vencimiento."' 
                AND fecha_vencimiento  BETWEEN '".$this->fecha_inicio."' AND '".$this->fecha_vencimiento."'" ;
    }

    function ultimaFactura()
    {
        return "SELECT * FROM facturacion WHERE cliente_id = '".$this->cliente_id."' ORDER BY id DESC LIMIT 1;";
    }
}

?>
