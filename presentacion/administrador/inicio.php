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
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido
					Administrador</div>
				<div class="card-body">
					<p>Administrador: <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></p>
					<p>Correo: <?php echo $administrador -> getCorreo(); ?></p>
					<p>Hoy es: <?php echo date("d-M-Y"); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $("#tool").onclick(function () {
        $("#tool").tooltip('hide');
    });
</script>