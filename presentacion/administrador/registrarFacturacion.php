<?php
if (!isset($_SESSION["id"])) {
	header("Location: index.php");
	exit();
}
$administrador = new Administrador($_SESSION["id"]);
$administrador->consultar();

$idcliente = $_GET["idCliente"];
$error = -1;
$valor = "";
$descuento = "";
$tipo_tarifa = "";
$fecha_inicio = "";
$fecha_vencimiento = "";
$id_admin = $_SESSION["id"];


if (isset($_POST["registrar"])) {

	$valor = $_POST["valor"];
	$descuento = $_POST["descuento"];
	$tipo_tarifa = $_POST["tipo_tarifa"];
	$fecha_inicio = $_POST["fecha_inicio"];
    if ($tipo_tarifa == 1){
        $fecha_vencimiento = date("Y-m-d",strtotime($fecha_inicio."+ 1 month"));
    }elseif ($tipo_tarifa == 2){
        $fecha_vencimiento = date("Y-m-d",strtotime($fecha_inicio."+ 3 month"));
    }elseif ($tipo_tarifa == 3){
        $fecha_vencimiento = date("Y-m-d",strtotime($fecha_inicio."+ 6 month"));
    }elseif ($tipo_tarifa == 4){
        $fecha_vencimiento = date("Y-m-d",strtotime($fecha_inicio."+ 1 year"));
    }

	$facturas = new Facturacion("", "", "", "", $fecha_inicio, $fecha_vencimiento, $idcliente, "");
	if (!$facturas->existeFactura()) {

		$factura = new Facturacion("", $valor, $descuento, $tipo_tarifa, $fecha_inicio, $fecha_vencimiento, $idcliente, $id_admin);
		$factura->registrarFactura();
		$error = 0;
	} else {
		$error = 1;
		$fecha_inicio = $_POST["fecha_inicio"];
	}
}
?>

<title>Registro Factura Cliente</title>

<header>
	<?php
	include 'nav.php';
	?>
</header>

<div class="container-fluid text-center form">
	<div class="row justify-content-center">
		<div class="col col-md-auto col-lg-8">
			<div class="card">
				<div class="card-header bg-primary text-white">Registro Factura</div>
				<div class="card-body">
					<?php
					if ($error == 0) {
					?>
						<div class="alert alert-success" role="alert">
							facturacion registrada exitosamente.
						</div>
					<?php } else if ($error == 1) { ?>
						<div class="alert alert-danger" role="alert">
							la facturacion con fecha <?php echo $fecha_inicio; ?> ya existe
						</div>
					<?php } ?>

					<form action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/registrarFacturacion.php") . "&action=signup" . "&idCliente=" . $_GET["idCliente"] ?>" method="post">
						<div class="form-group">
							<input type="number" name="valor" class="form-control" placeholder="Valor de la subscripción" required="required" value="<?php echo $valor; ?>">
						</div>
						<div class="form-group">
                            <select id="descuento" name="descuento" class="input-group sm-3 px-2 py-2 bg-white shadow-sm" required="required">
                                <option value="">Seleccione el tipo de descuento a la subscripción del cliente</option>
                                <option value="0">Ninguno</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="25">25%</option>
                            </select>
						</div>
						<div class="form-group">
							<select id="tipo_tarifa" name="tipo_tarifa" class="input-group sm-3 px-2 py-2 bg-white shadow-sm" required="required">
								<option value="">Seleccione el tipo de tarifa del cliente</option>
								<option value="1">Mensual</option>
								<option value="2">Trimestral</option>
								<option value="3">Semestral</option>
								<option value="4">Anual</option>
							</select>
						</div>
						<div class="form-group">
                            <label>Fecha inicio factura</label>
							<input type="date" name="fecha_inicio" class="form-control" required="required" value="<?php echo $fecha_inicio; ?>">
						</div>
						<button type="submit" name="registrar" class="btn btn-primary" style="float: left">Registrar</button>
						<a class="btn btn-secondary" href="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/consultarCliente.php") ?>" role="button" style="float: right">Volver</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

<script>

</script>