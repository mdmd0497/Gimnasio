<?php
require_once 'logica/Persona.php';
require_once 'logica/Administrador.php';

$correo = $_POST["correo"];
$clave = $_POST["clave"];

$administrador = new Administrador(0, "", "", $correo);
$administrador->consultar();
if ($administrador->getCorreo() != "" && password_verify ( $clave , $administrador->getClave())){
    $_SESSION["tipo"] = "administrador";
    $_SESSION["id"] = $administrador->getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/administrador/inicio.php"));
    exit();
}
else{
   header("Location:index.php?pid=" . base64_encode("presentacion/inicio.php") . "&login=fail");
   exit();
}
?>
