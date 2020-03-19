<?php

$administrador = new Administrador($_SESSION["id"]);
$administrador->consultar();
?>
<title>Inicio Administrador</title>

<header>
    <?php
    include 'nav.php';
    ?>
</header>
<div class="container align-items-center">

    <div class="card" id="inicio-admin">
        <div class="card-header bg-primary text-white">Bienvenido
            Administrador
        </div>
        <div class="card-body">
            <p>Administrador: <?php echo $administrador->getNombre() . " " . $administrador->getApellido() ?></p>
            <p>Correo: <?php echo $administrador->getCorreo(); ?></p>
            <p>Hoy es: <?php echo date("d-M-Y"); ?></p>
        </div>
    </div>
</div>

<script>
    $("#tool").onclick(function () {
        $("#tool").tooltip('hide');
    });
</script>