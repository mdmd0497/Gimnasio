<?php
if (!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}
$administrador = new Administrador($_SESSION["id"]);
$administrador->consultar();
?>
<title>Registro Entrenador</title>

<header>
    <?php
    include 'nav.php';
    ?>
</header>
<?php
$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$telefono = "";
if (isset($_POST["registrar_entrenador"])) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    $entrenador = new Entrenador("", "", "", $correo);

    if (strlen($telefono) == 6 || strlen($telefono) == 10) {
        if (!$entrenador->existeCorreo()) {
            $password = $_POST["clave"];
            $entrenador = new Entrenador("", $nombre, $apellido, $correo, password_hash($password, PASSWORD_BCRYPT), "", $telefono, "");
            $entrenador->registrar();
            $error = 0;
        } else {
            $error = 1;
            $correo = $_POST["correo"];
        }
    } else {
        $error = 2;
    }
}


?>
<div class="container-fluid form" id="reg-enfermero">
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-9">
            <div class="card">
                <div class="card-header bg-primary text-white">Registro Entrenador</div>
                <div class="card-body">
                    <?php
                    if ($error == 0) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            entrenador registrado exitosamente.
                        </div>
                    <?php } else if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> ya existe
                        </div>
                    <?php } elseif ($error == 2) { ?>
                        <div class="alert alert-danger" role="alert">
                            El teléfono <?php echo $telefono; ?> no es valido
                        </div>
                    <?php } ?>
                    <form
                            action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/registroEntrenador.php") . "&action=signup" ?>"
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

                        <div class="form-group">
                            <button type="submit" name="registrar_entrenador" class="btn btn-primary">Registrar</button>
                            <a class="btn btn-secondary" href="index.php" style="float: right">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
