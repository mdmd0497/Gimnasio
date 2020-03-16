<?php

class Persona
{

    protected $id;

    protected $nombre;

    protected $apellido;

    protected $correo;

    protected $clave;

    /**
     * Persona constructor.
     *
     * @param
     *            $id
     * @param
     *            $nombre
     * @param
     *            $apellido
     * @param
     *            $correo
     * @param
     *            $clave
     */
    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    /**
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     *
     * @param string $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     *
     * @param string $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }
}