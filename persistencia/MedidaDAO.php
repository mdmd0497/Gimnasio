<?php


class MedidaDAO
{

    private $id;
    private $altura;
    private $peso;
    private $fecha;
    private $id_cliente;
    private $id_enfermero;

    function __construct($id = "", $altura = "", $peso = "", $fecha = "", $id_enfermero = "", $id_cliente = "")
    {
        $this->altura = $altura;
        $this->peso = $peso;
        $this->id_cliente = $id_cliente;
        $this->id_enfermero = $id_enfermero;
        $this->fecha = date("Y-m-d");
        
    }

    function agregarMedida(){
        return "INSERT INTO medidas (altura, peso, fecha, enfermero_idenfermero, cliente_idcliente) VALUES ( " . $this->altura ." ,  
            " . $this->peso  . ", '" . $this->fecha . "', " .  $this->id_enfermero  . ", " .$this->id_cliente .");";

    }
    
    public function consultarmodalenfermero()
    {
        return "SELECT altura,peso
                FROM medidas 
                WHERE cliente_idcliente = " . $this->id_cliente. "";
    }

}
?>