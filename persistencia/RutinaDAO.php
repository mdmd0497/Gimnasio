<?php


class RutinaDAO
{
    private $id;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_entrenador;
    private $id_cliente;

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
    public function getDescripcion()
    {
        return $this->descripcion;
    }




    public function __construct($id="", $descripcion="", $fecha_inicio="", $fecha_fin="", $id_entrenador="", $id_cliente="")
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->id_entrenador = $id_entrenador;
        $this->id_cliente = $id_cliente;
    }


    function registrarRutina(){
        return "INSERT INTO rutina (descripcion, fecha_inicio, fecha_fin, entrenador_identrenador, cliente_idcliente)
                VALUES ( '" . $this->descripcion . "', '" . $this->fecha_inicio . "', '" . $this->fecha_fin ."', ". $this->id_entrenador . ", " . $this->id_cliente ." );";
    }


}