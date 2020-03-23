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

    function __construct($id="", $altura="", $peso="", $fecha="", $id_enfermero="", $id_cliente="")
    {
        $this->altura=$altura;
        $this->peso=$peso;
        $this->id_cliente=$id_cliente;
        $this->id_enfermero=$this->id_enfermero;
        $this->conexion=new Conexion();
        $this->MedidaDAO = new MedidaDAO($altura="", $fecha="", $id_cliente="", $id_enfermero="", $peso="");
        $this->id=$id;
        $this->fecha = date("d-M-Y");
    }

    function agregarMedida(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->MedidaDAO->agregarMedida());
        $this->conexion->cerrar();
    }

}