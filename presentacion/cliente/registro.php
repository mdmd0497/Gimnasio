<?php
require_once 'logica/Cliente.php';
$error = - 1;
$nombre = "";
$apellido = "";
$correo = "";
$clave = "";
$telefono = "";
if (isset($_POST["registrar"])) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    $cliente = new Cliente("", "", "", $correo);
    if (!$cliente->existeCorreo()) {
        $password = $_POST["clave"];
        $cliente = new Cliente("", $nombre, $apellido, $correo, password_hash($password, PASSWORD_BCRYPT), "", $telefono, "");
        $cliente->registrar();
        header("Location: index.php?action=signup&result=success");
    } else {
        $error = 1;
        $correo = $_POST["correo"];
    }
}
?>
<div class="container-fluid text-center form" >
	<div class="row justify-content-center">
		<div class="col col-md-auto col-lg-8">
			<div class="card">
				<div class="card-header bg-primary text-white">Registro</div>
				<div class="card-body">
                    <?php
                    if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> ya existe
                        </div>
                    <?php } ?>
                    <form
						action="<?php echo "index.php?pid=" . base64_encode("presentacion/cliente/registro.php") . "&action=signup" ?>"
						method="post">
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required"
								value="<?php echo $nombre; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="apellido" class="form-control"
								placeholder="Apellido" required="required"
								value="<?php echo $apellido; ?>">
						</div>
						<div class="form-group">
							<input type="email" name="correo" class="form-control"
								placeholder="Correo" required="required"
								value="<?php echo $correo; ?>">
						</div>
						<div class="form-group">
							<input type="password" name="clave" class="form-control"
								placeholder="Clave" required="required">
						</div>
						<div class="form-group">
							<input type="text" name="telefono" class="form-control"
								placeholder="telefono" required="required"
								value="<?php echo $telefono; ?>">
						</div>
						<button type="submit" name="registrar" class="btn btn-primary" style="float: left">Registrar</button>
						<a class="btn btn-secondary" href="index.php" role="button" style="float: right">Volver</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

<script type="text/javascript">
    window.onEditorLoaded = function() {
        tinymce.init({selector: "#editor"});
    }
</script>
<script type="text/javascript"
	src="https://cloud.n1ed.com/cdn/PDE4DFLT/n1tinymce.js"></script>
