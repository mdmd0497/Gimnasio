<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$enfermero = new Enfermero($_GET["idEnfermero"]);
$enfermero->consultarmodal();
$error = -1;

if (isset($_POST["actualizar"])) {
    $correoPrin = $enfermero->getCorreo();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $enfermero = new Enfermero("", "", "", $correo);
    if ($correo == $correoPrin || !$enfermero->existeCorreo()) {
        $enfermero = new Enfermero($_GET["idEnfermero"], $nombre, $apellido, $correo, "", "", $telefono);
        $enfermero->actualizar();
        $error = 0;
    } else {
        $error = 1;
        $enfermero = new Enfermero($_GET["idEnfermero"]);
        $enfermero->consultarmodal();
    }

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
                <div class="card-header bg-primary text-white">Actualizar Entrenador</div>
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
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarEnfermero.php") . "&idEnfermero=" . $_GET["idEnfermero"] ?> method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                   required="required" value="<?php echo $enfermero->getNombre(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="apellido"
                                   required="required" value="<?php echo $enfermero->getApellido(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="telefono"
                                   required="required" value="<?php echo $enfermero->getTelefono(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="correo" class="form-control" placeholder="correo"
                                   required="required" value="<?php echo $enfermero->getCorreo(); ?>">
                        </div>
                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                        <a class="btn btn-light"
                           href="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/consultarEnfermero.php") ?>"
                           role="button" style="float: right">Volver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
