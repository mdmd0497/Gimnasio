<?php
$enfermero = new Enfermero($_SESSION["id"]);
$enfermero->consultar();
?>
<title>Inicio Enfermero</title>

<header>
    <?php
    include 'navenfermero.php';
    ?>
</header>
<div class="container">
	<div class="row">
		<div class="col-12">
            <?php
            if (isset($_GET["action"]) && $_GET["action"] == "medida" &&  isset($_GET["succes"]) && $_GET["succes"] == "true"){
                $cliente = new Cliente($_GET["idcust"]);
                $cliente->consultarmodal();?>

            <div class="alert alert-success" role="alert">
                Medidas agregadas satisfactoriamente a cliente <?php echo $cliente->getNombre() . " " . $cliente->getApellido(); ?>
            </div>

            <?php }
                ?>
			<div class="card">
				<div class="card-header bg-primary text-white">Bienvenido
					Enfermero</div>
				<div class="card-body">
					<p>Enfermero: <?php echo $enfermero -> getNombre() . " " . $enfermero -> getApellido() ?></p>
					<p>Correo: <?php echo  $enfermero -> getCorreo(); ?></p>
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