<?php
if(!isset($open)){
    header("HTTP/1.1 403 Forbidden");
    exit;
}
require_once 'logica/Persona.php';
require_once 'logica/Administrador.php';
require_once 'persistencia/AdministradorDAO.php';
require_once 'conexion/Conexion.php';
require_once 'logica/Cliente.php';
require_once  'persistencia/ClienteDAO.php'


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" type="image/png" href="img/icon/logo.png"/>
    <link rel="stylesheet" 	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" 	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" 	href="/css/normalize.css">
    <link rel="stylesheet" href="/css/flaty.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" 	href="/css/styles.css">


    <!-- https://tailwindcss.com/ Framework -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca|Lexend+Giga&display=swap" rel="stylesheet">

</head>
