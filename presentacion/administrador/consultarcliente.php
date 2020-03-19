<?php
$administrador = new Administrador($_SESSION["administrador"]);
$administrador->consultar();
include 'nav.php';
?>
