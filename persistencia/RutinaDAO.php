<?php


class RutinaDAO
{
    private $id;
    private $descripcion;
    private $numero_dia;
    private $nombre;
    private $duracion;
    private $series;
    private $repeticiones_series;
    private $imagen;
    private $descanso;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_entrenador;
    private $id_cliente;
    private $fecha_registro;

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed|string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @param mixed $numero_dia
     */
    public function setNumeroDia($numero_dia)
    {
        $this->numero_dia = $numero_dia;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @param mixed $series
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @param mixed $repeticiones_series
     */
    public function setRepeticionesSeries($repeticiones_series)
    {
        $this->repeticiones_series = $repeticiones_series;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @param mixed $descanso
     */
    public function setDescanso($descanso)
    {
        $this->descanso = $descanso;
    }

    /**
     * @param mixed|string $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @param mixed|string $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @param mixed|string $id_entrenador
     */
    public function setIdEntrenador($id_entrenador)
    {
        $this->id_entrenador = $id_entrenador;
    }

    /**
     * @param mixed|string $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getNumeroDia()
    {
        return $this->numero_dia;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @return mixed
     */
    public function getRepeticionesSeries()
    {
        return $this->repeticiones_series;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return mixed
     */
    public function getDescanso()
    {
        return $this->descanso;
    }

    /**
     * @return mixed|string
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @return mixed|string
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @return mixed|string
     */
    public function getIdEntrenador()
    {
        return $this->id_entrenador;
    }

    /**
     * @return mixed|string
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

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

    public function __construct($id="", $descripcion="", $numero_dia="", $nombre="", $duracion="", $series="", $repeticiones_series="", $imagen="", $descanso="", $fecha_inicio="", $fecha_fin="", $id_entrenador="", $id_cliente="")
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->numero_dia = $numero_dia;
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->series = $series;
        $this->repeticiones_series = $repeticiones_series;
        $this->imagen = $imagen;
        $this->descanso = $descanso;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->id_entrenador = $id_entrenador;
        $this->id_cliente = $id_cliente;
    }

    function registrarRutina(){
        return "INSERT INTO rutina (descripcion, numero_dia, nombre, duracion, series, repeticiones_series, imagen, descanso, fecha_inicio, fecha_fin, entrenador_identrenador, cliente_idcliente)
                VALUES ( '" . $this->descripcion . "', '". $this->numero_dia ."', '". $this->nombre ."', '". $this->duracion ."', '". $this->series ."', '". $this->repeticiones_series ."', '". $this->imagen ."', '". $this->descanso ."', '" . $this->fecha_inicio . "', '" . $this->fecha_fin ."', '". $this->id_entrenador . "', '" . $this->id_cliente ."');";
    }

    function consultarRutinas(){
        return "SELECT * FROM rutina 
                WHERE entrenador_identrenador = " . $this->id_entrenador . " 
                AND cliente_idcliente = " . $this->id_cliente . "
                ORDER BY numero_dia ASC;";
    }

    function consultar()
    {
        return "SELECT * FROM rutina WHERE id=". $this->id .";";
    }

    function consultarPorPagina ($cantidad, $pagina, $orden, $dir) {
        if($orden == "" || $dir == ""){
            return "SELECT *
                FROM rutina
                WHERE entrenador_identrenador = '" . $this->id_entrenador . "' 
                AND cliente_idcliente = '" . $this->id_cliente . "'
                ORDER BY numero_dia ASC
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }else{
            return "SELECT *
                FROM rutina
                WHERE entrenador_identrenador = '" . $this->id_entrenador . "' 
                AND cliente_idcliente = '" . $this->id_cliente . "'
                ORDER BY numero_dia ASC
                ORDER BY " . $orden . " " . $dir . "
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
        }
    }

    function consultarTotalRegistros(){
        return "select count(id)
                from rutina";
    }

    function update()
    {
        return "UPDATE rutina SET 
                  descripcion = '". $this->descripcion ."', 
                  numero_dia = '". $this->numero_dia ."', 
                  nombre = '". $this->nombre ."', 
                  duracion = '". $this->duracion ."', 
                  series = '". $this->series ."', 
                  repeticiones_series = '". $this->repeticiones_series ."', 
                  imagen = '". $this->imagen ."', 
                  descanso = '". $this->descanso ."', 
                  fecha_inicio = '". $this->fecha_inicio."', 
                  fecha_fin = '". $this->fecha_fin ."'
                  WHERE id = ". $this->id;
    }

}