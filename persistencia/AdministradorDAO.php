<?php


class AdministradorDAO extends Persona
{

    /**
     * AdministradorDAO constructor.
     */
    public function __construct($id="", $nombre="", $apellido="", $correo="", $clave="")
    {
        parent::__construct($id,$nombre,$apellido,$correo,$clave);
    }

    /** --------------------------- GETTERS AMD SETTERS -----------------------------------------*/

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param string $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param string $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }


    /** --------------------------------------------------------------------------------------- */

    public  function registro(){
        return "INSERT INTO administrador (id, nombre, apellido, correo, clave) VALUES" .
                "('" . $this->id . "', '" . $this->nombre . "', '" . $this->apellido . "', '"
                    . $this->correo . "', '" . $this->clave . "');";
    }


    public function consultar(){
        return "SELECT *
                FROM administrador
                WHERE correo LIKE '" . $this->correo . "' 
                OR id = " . $this->id;
    }


}

?>