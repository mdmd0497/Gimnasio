<?php
$entrenador = new Entrenador($_SESSION["id"]);
$entrenador->consultar();
?>
<title>Inicio Entrenador</title>

<header>
    <?php
    include 'naventrenador.php';
    ?>
</header>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido
					Entrenador</div>
				<div class="card-body">
					<p>Entrenador: <?php echo $entrenador -> getNombre() . " " . $entrenador -> getApellido() ?></p>
					<p>Correo: <?php echo  $entrenador -> getCorreo(); ?></p>
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