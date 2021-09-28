<?php
if (isset($_GET["idEntrenador"])){
    $cliente = new Cliente($_SESSION["id"],
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        "",
        $_GET["idEntrenador"],
        "",
        "",
        "");
    $cliente->actualizarEntrenador();
    $cliente->consultar();
    $id_entrenador = $cliente->getIdentre();
    $entrenador = new Entrenador($id_entrenador);
    $entrenador->consultar();
}else{
    $cliente = new Cliente($_SESSION["id"]);
    $cliente->consultar();
    $id_entrenador = $cliente->getIdentre();
    $entrenador = new Entrenador($id_entrenador);
    $entrenador->consultar();
}

?>
<title>Consultar Entrenador</title>
<header>
    <?php
    include 'navcliente.php';
    ?>
</header>

<div class="container align-items-center">
    <div class="card" id="inicio-admin">
        <div class="card-header bg-primary text-white">Información de su entrenador</div>
        <div class="card-body">
            <p><strong>Nombre: </strong><?php echo $entrenador->getNombre(); ?></p>
            <p><strong>Apellido: </strong><?php echo $entrenador->getApellido(); ?></p>
            <p><strong>Correo: </strong><?php echo $entrenador->getCorreo(); ?></p>
            <p><strong>Teléfono: </strong><?php echo $entrenador->getTelefono(); ?></p>
            <?php echo "<p style='width: 200px; height: 250px'><strong>Foto:</strong>
                        <br/> ". (($entrenador->getFoto() != "" && file_exists("img/" . $entrenador->getFoto() . "") && $entrenador->getFoto()) ? "<img src='img/" . $entrenador->getFoto() . "' alt='Imagen de usuario" . $entrenador->getFoto() . "'>" : "<i class='fas fa-user-tie fa-3x'></i>") ." </p>" ?>
            <div class="col text-center">
                <a class="btn btn-primary btn-lg" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/cambiarEntrenador.php") . "&idEntrenador=". $id_entrenador; ?>">
                    Cambiar entrenador
                </a>
            </div>
        </div>
    </div>
</div>
