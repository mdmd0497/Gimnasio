<?php
session_start();
require_once 'logica/Persona.php';
require_once 'logica/Administrador.php';
require_once 'persistencia/AdministradorDAO.php';
require_once 'conexion/Conexion.php';
require_once 'logica/Cliente.php';
require_once 'persistencia/ClienteDAO.php';
require_once 'logica/Enfermero.php';
require_once 'persistencia/EnfermeroDAO.php';
require_once 'logica/Entrenador.php';
require_once 'persistencia/EntrenadorDAO.php';
require_once 'logica/genero.php';
require_once 'persistencia/generoDAO.php';
require_once 'logica/rh.php';
require_once 'persistencia/rhDAO.php';
require_once 'logica/Medida.php';
require_once 'persistencia/MedidaDAO.php';

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" type="image/png" href="img/icon/logo.png"/>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/flaty.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">

    <!-- https://tailwindcss.com/ Framework -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
          rel="stylesheet">

    <link
            href="https://fonts.googleapis.com/css?family=Lexend+Deca|Lexend+Giga&display=swap"
            rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script
	src="https://cdnjs.cloudflare.com/ajax/libs/chartkick/2.3.0/chartkick.min.js"></script>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
<div id="page-container" class="container">


    <?php
    /* Si la sesion esta iniciada no va al inicio de sesion sino al inicio del usuario */
    if (!isset($_GET["pid"]) && isset($_SESSION["id"]) && isset($_SESSION["tipo"]) && !isset($_GET["logout"])) {

        include "presentacion/" . $_SESSION["tipo"] . "/inicio.php";
        echo $_SESSION["id"];
    } else if (isset($_GET["pid"])) {
        if ($_GET["pid"] == null) {
            header("Location: index.php");
            exit();
        } else if (isset($_SESSION["id"]) && $_SESSION["id"] != "" || isset($_GET["action"])) {
            $pid = base64_decode($_GET["pid"]);
            include $pid;
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        include 'presentacion/inicio.php';
    }

    ?>

</div>







</body>

</html>

