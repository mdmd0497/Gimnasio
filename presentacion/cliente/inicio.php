<?php
$cliente = new cliente($_SESSION["id"]);
$cliente->consultar();
?>
<title>Inicio cliente</title>

<header>
    <?php
    include 'navcliente.php';
    ?>
</header>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido
					cliente</div>
				<div class="card-body">
					<p>Cliente: <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?></p>
					<p>Correo: <?php echo  $cliente -> getCorreo(); ?></p>
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