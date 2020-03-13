<?php


class EnfermeroDAO extends Persona
{
    private $foto;
    private $telefono;

    /**
     * EnfermeroDAO constructor.
     * @param $foto
     * @param $telefono
     */
    public function __construct($id="", $nombre="", $apellido="", $correo="", $salt="", $clave="", $foto="", $telefono="")
    {
        parent::__construct($id,$nombre,$apellido,$correo,$salt,$clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
    }


}

?>