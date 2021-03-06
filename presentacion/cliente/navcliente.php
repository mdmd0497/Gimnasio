<?php
$cliente = new Cliente($_SESSION["id"]);
$cliente->consultar();
?>
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
            <div class="site-logo">
                <a id="tool" class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Sistema de Gestion de Gimnasios"> <i class="fas fa-dumbbell"></i>
                    <span class="logo-text"> SGG </span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Consultar </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/verRutina.php"); ?>">Rutinas</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarEntrenador.php"); ?>">Entrenador</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarMedidas.php") ?>">Medidas</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/analizarMedidas.php") ?>">Analizar Medidas</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/historicoFacturas.php") ?>">Historial de Facturas</a>
                        </div>
                    </li>
                    <li class="nav-item mr-lg-4"><a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/salir.php"); ?>&logout=true">
                            Salir </a></li>
                </ul>
                <span class="navbar-text">
                    Cliente: <?php echo $cliente->getNombre() . " " . $cliente->getApellido() ?>
                </span>
            </div>
        </nav>