<?php
session_start();
require_once 'logica/Persona.php';
require_once 'logica/Administrador.php';
require_once 'persistencia/AdministradorDAO.php';
require_once 'conexion/Conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="shortcut icon" type="image/png" href="css/icon.png"/>
    <link rel="stylesheet" 	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" 	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" 	href="css/normalize.css">
    <link rel="stylesheet" href="css/flaty.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" 	href="css/styles.css">

    <!-- https://tailwindcss.com/ Framework -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca|Lexend+Giga&display=swap" rel="stylesheet">

</head>

<body>


<?php
if (isset($_GET["pid"])) {
    $pid = base64_decode($_GET["pid"]);
    if (isset($_GET["nos"]) || (!isset($_GET["nos"]) && $_SESSION['id'] == null)) {
        include $pid;
    } else {
        header("Location: index.php");
    }
} else {
    $_SESSION['id'] = "";
    include 'presentacion/inicio.php';
}

?>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>


</body>

</html>

