<?php


class Rutina
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
    private $conexion;
    private $RutinaDAO;

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
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @return string
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @return string
     */
    public function getIdEntrenador()
    {
        return $this->id_entrenador;
    }

    /**
     * @return string
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @return Conexion
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @return RutinaDAO
     */
    public function getRutinaDAO()
    {
        return $this->RutinaDAO;
    }

    /**
     * @return string
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    public function __construct($id = "", $descripcion = "", $numero_dia = "", $nombre = "", $duracion = "", $series = "", $repeticiones_series = "", $imagen = "", $descanso = "", $fecha_inicio = "", $fecha_fin = "", $id_entrenador = "", $id_cliente = "")
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
        $this->conexion = new Conexion();
        $this->RutinaDAO = new RutinaDAO($id, $descripcion, $numero_dia, $nombre, $duracion, $series, $repeticiones_series, $imagen, $descanso, $fecha_inicio, $fecha_fin, $id_entrenador, $id_cliente);
    }

    function registrarRutina()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->registrarRutina());
        $this->conexion->cerrar();
    }

    function consultarRutinas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->consultarRutinas());
        if ($this->conexion->numFilas() == 0) {
            $this->conexion->cerrar();
            return null;
        } else {
            $resultados = array();
            $i = 0;
            while (($registro = $this->conexion->extraer()) != null) {
                $resultados[$i] = new Rutina(
                    $registro[0],
                    $registro[1],
                    $registro[2],
                    $registro[3],
                    $registro[4],
                    $registro[5],
                    $registro[6],
                    $registro[7],
                    $registro[8],
                    $registro[9],
                    $registro[10],
                    $registro[11],
                    $registro[12]
                );
                $i++;
            }
            $this->conexion->cerrar();
            return $resultados;
        }
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->descripcion = $resultado[1];
        $this->numero_dia =$resultado[2];
        $this->nombre = $resultado[3];
        $this->duracion = $resultado[4];
        $this->series = $resultado[5];
        $this->repeticiones_series = $resultado[6];
        $this->imagen =$resultado[7];
        $this->descanso = $resultado[8];
        $this->fecha_inicio = $resultado[9];
        $this->fecha_fin =$resultado[10];

        $this->conexion->cerrar();
    }

    function consultarPorPagina($cantidad, $pagina, $orden, $dir){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RutinaDAO -> consultarPorPagina($cantidad, $pagina, $orden, $dir));
        $this -> conexion -> cerrar();
        $rutinas = array();
        while(($registro = $this -> conexion -> extraer()) != null){
            array_push($rutinas, new Rutina(
                $registro[0],
                $registro[1],
                $registro[2],
                $registro[3],
                $registro[4],
                $registro[5],
                $registro[6],
                $registro[7],
                $registro[8],
                $registro[9],
                $registro[10],
                $registro[11],
                $registro[12]
            ));
        }
        return $rutinas;
    }

    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> RutinaDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }

    function update()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->RutinaDAO->update());
        $this->conexion->cerrar();
    }

}