<?php


class AdministradorDAO extends Persona
{

    /**
     * AdministradorDAO constructor.
     */
    public function __construct($id="", $nombre="", $apellido="", $correo="", $salt="", $clave="")
    {
        parent::__construct($id,$nombre,$apellido,$correo,$salt,$clave);
    }


}

?>