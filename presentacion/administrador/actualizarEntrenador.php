<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$entrenador = new Entrenador($_GET["idEntrenador"]);
$entrenador->consultarmodal();
$error = -1;

if (isset($_POST["actualizar"])) {
    $correoPrin = $entrenador->getCorreo();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];

    $entrenador = new Entrenador($_GET["idEntrenador"], $nombre, $apellido, "", "", "", $telefono, "");
    $entrenador->actualizar();
    $error = 0;

}
?>
<title>Actualizar Entrenador</title>

<header>
    <?php
    include 'nav.php';
    ?>
</header>

<div class="container-fluid form">
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-9">
            <div class="card">
                <div class="card-header bg-primary text-white">Actualizar Enfermero</div>
                <div class="card-body">
                    <?php
                    if (isset($_POST["actualizar"])) {
                        ?>
                        <?php if ($error == 1) { ?>
                            <div class="alert alert-danger" role="alert">
                                El correo <?php echo $correo; ?> ya existe
                            </div>
                        <?php } else if ($error == 0) { ?>
                            <div class="alert alert-success" role="alert">
                                Entrenador actualizado exitosamente.
                            </div>
                        <?php }
                    } ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarEntrenador.php") . "&idEntrenador=" . $_GET["idEntrenador"] ?> method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                   required="required" value="<?php echo $entrenador->getNombre(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="apellido"
                                   required="required" value="<?php echo $entrenador->getApellido(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="telefono"
                                   required="required" value="<?php echo $entrenador->getTelefono(); ?>">
                        </div>
                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                        <a class="btn btn-light"
                           href="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/consultarEntrenador.php") ?>"
                           role="button" style="float: right">Volver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>