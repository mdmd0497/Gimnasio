<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$cliente = new Cliente($_GET["idCliente"]);
$cliente->consultarmodal();
$error = -1;

if (isset($_POST["actualizar"])) {
    $correoPrin = $cliente->getCorreo();
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];

    $cliente = new Cliente($_GET["idCliente"], $nombre, $apellido, "", "", "", $telefono, "", "", "", "");
    $cliente->actualizar();
    $error = 0;

}
?>
<title>Actualizar cliente</title>

<header>
    <?php
    include 'nav.php';
    ?>
</header>

<div class="container-fluid form">
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-9">
            <div class="card">
                <div class="card-header bg-primary text-white">Actualizar Cliente</div>
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
                                cliente actualizado exitosamente.
                            </div>
                        <?php }
                    } ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarCliente.php") . "&idCliente=" . $_GET["idCliente"] ?> method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                                   required="required" value="<?php echo $cliente->getNombre(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control" placeholder="apellido"
                                   required="required" value="<?php echo $cliente->getApellido(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="telefono"
                                   required="required" value="<?php echo $cliente->getTelefono(); ?>">
                        </div>
                        <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                        <a class="btn btn-light"
                           href="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/consultarcliente.php") ?>"
                           role="button" style="float: right">Volver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>