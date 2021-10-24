<?php


class MedidaDAO
{

    private $id;
    private $altura;
    private $peso;
    private $cuello;
    private $hombros;
    private $pecho;
    private $cintura;
    private $antebrazos;
    private $muslo;
    private $pantorrillas;
    private $biceps;
    private $cadera;
    private $fecha;
    private $id_cliente;
    private $id_enfermero;

    function __construct($id = "", $altura = "", $peso = "", $cuello = "", $hombros = "", $pecho = "", $cintura = "", $antebrazos = "", $muslo = "", $pantorrillas = "", $biceps = "", $cadera = "", $fecha = "", $id_enfermero = "", $id_cliente = "")
    {
        $this->altura = $altura;
        $this->peso = $peso;
        $this->cuello = $cuello;
        $this->hombros = $hombros;
        $this->pecho = $pecho;
        $this->cintura = $cintura;
        $this->antebrazos = $antebrazos;
        $this->muslo = $muslo;
        $this->pantorrillas = $pantorrillas;
        $this->biceps = $biceps;
        $this->cadera = $cadera;
        $this->fecha = date("Y-m-d");
        $this->id_cliente = $id_cliente;
        $this->id_enfermero = $id_enfermero;
    }

    function agregarMedida()
    {
        return "INSERT INTO medidas (altura, peso,cuello,hombros,pecho,cintura,antebrazos,muslo,pantorrillas,biceps,cadera, fecha, enfermero_idenfermero, cliente_idcliente) VALUES ( " . $this->altura . " ,  
            " . $this->peso  . ", 
            '" . $this->cuello . "',
            '" . $this->hombros . "',
            '" . $this->pecho . "',
            '" . $this->cintura . "',
            '" . $this->antebrazos . "',
            '" . $this->muslo . "',
            '" . $this->pantorrillas . "',
            '" . $this->biceps . "',
            '" . $this->cadera . "',
            '" . $this->fecha . "', " .  $this->id_enfermero  . ", " . $this->id_cliente . ");";
    }

    public function consultarmodalenfermero()
    {
        return "SELECT altura,peso
                FROM medidas 
                WHERE cliente_idcliente = " . $this->id_cliente . "
                ORDER BY id DESC
                LIMIT 1";
    }

    public function obtenerMedidas()
    {
        return "SELECT id,altura,peso,fecha,enfermero_idenfermero,cliente_idcliente FROM medidas WHERE cliente_idcliente = " . $this->id_cliente . " ORDER BY fecha DESC ";
    }
}
