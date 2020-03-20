<?php
# session variables are not passed individually to each new page, instead they are retrieved from the session we open at the beginning of each page (session_start()).
session_start();
require 'logica/Persona.php';
require 'logica/Administrador.php';
require 'logica/Cliente.php';
require_once 'conexion/Conexion.php';
require_once 'persistencia/ClienteDAO.php';
$pid = base64_decode($_GET["pid"]);
if ($_SESSION['id'] != "") {
    include $pid;
} else {
    header("Location: index.php");
}
?>
