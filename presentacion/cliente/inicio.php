<?php
$cliente = new cliente($_SESSION["id"]);
$cliente->consultar();
$ultimaFactura = new Facturacion("", "", "", "", "", "", $_SESSION["id"], "");
$ultimaFactura->ultimaFactura();
$fecha_vencimiento = $ultimaFactura->getFechaVencimiento();
$fecha_limite = date("Y-m-d",strtotime($fecha_vencimiento."+ 6 days"));
$hoy = date('Y-m-d');
if ($hoy > $fecha_limite){
    $actualizarEstado = new Cliente($_SESSION["id"], "", "", "", "", "", "", "", 1);
    $actualizarEstado->actualizarEstado();
}
?>
<title>Inicio cliente</title>

<header>
    <?php
    include 'navcliente.php';
    ?>
</header>
<div class="container align-items-center">

    <div class="card" id="inicio-admin">
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