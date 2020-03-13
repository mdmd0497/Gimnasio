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

    public  function registroAdministrador(){
        return "INSERT INTO administrador (id, nombre, apellido, correo, salt, clave) VALUES" .
                "('" . $this->id . "', '" . $this->nombre . "', '" . $this->apellido . "', '" . $this->correo . "', '" . $this->salt . "', '" . $this->clave . "');";
    }


}

?>