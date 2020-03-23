<?php
require_once 'logica/Persona.php';
require_once 'logica/Administrador.php';

$correo = $_POST["correo"];
$clave = $_POST["clave"];

$administrador = new Administrador(0, "", "", $correo);
$administrador->consultar();
$cliente = new Cliente(0,"","",$correo);
$cliente -> consultar();
$enfermero = new Enfermero(0,"","",$correo);
$enfermero ->consultar();
$entrenador = new Entrenador(0,"","",$correo);
$entrenador->consultar();
if ($administrador->getCorreo() != "" && password_verify($clave, $administrador->getClave())) {
    $_SESSION["tipo"] = "administrador";
    $_SESSION["id"] = $administrador->getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/administrador/inicio.php"));
    exit();
}else if($cliente->getCorreo() != "" && password_verify($clave, $cliente->getClave())){
    if($cliente->getEstado() != 1){
        header("Location:index.php?pid=" . base64_encode("presentacion/inicio.php") . "&action=login&status=fail");
        exit();
    }
    $_SESSION["tipo"] = "cliente";
    $_SESSION["id"] = $cliente->getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/cliente/inicio.php"));
    exit();
}else if($enfermero->getCorreo() != "" && password_verify($clave, $enfermero->getClave())){
    $_SESSION["tipo"] = "enfermero";
    $_SESSION["id"] = $enfermero->getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/enfermero/inicio.php"));
    exit();
}else if($entrenador->getCorreo() != "" && password_verify($clave, $entrenador->getClave())){
    $_SESSION["tipo"] = "entrenador";
    $_SESSION["id"] = $entrenador->getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/entrenador/inicio.php"));
    exit();
}

else {
    header("Location:index.php?pid=" . base64_encode("presentacion/inicio.php") . "&action=login&login=fail");
    exit();
}
?>
