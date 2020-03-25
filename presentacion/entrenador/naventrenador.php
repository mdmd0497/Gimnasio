<?php
$entrenador = new Entrenador($_SESSION["id"]);
$entrenador->consultar();
?>
<div class="nav">
    <div class="container-fluid">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light" >
            <div class="site-logo">
                <a id="tool" class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Sistema de Gestion de Gimnasios">
                    <i class="fas fa-dumbbell"></i>
                    <span class="logo-text">
                            SGG
                        </span>
                </a>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation" style="color: #1a252f">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navigation">


                <li class="nav-item dropdown">
                    <a class="menu nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Consultar
                    </a>
                    <div class="dropdown-menu dropdown-menu-right rounded shadow menu-animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="menu dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/entrenador/consultarcliente.php"); ?>">
                            Clientes
                        </a>

                    </div>
                </li>

                <ul class="social-list list-inline mt-3 mt-lg-0 mb-lg-0 d-flex ml-lg-5 mr-lg-5">
                    <li class="list-inline-item">
                        <a class="menu" id="tool" data-toggle="tooltip" data-placement="bottom" title="Github" href="https://github.com/oscarce10" target="_blank">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="menu" id="tool" data-toggle="tooltip" data-placement="bottom" title="GitLab" href="https://gitlab.com/oscarce10" target="_blank">
                            <i class="fab fa-gitlab"></i>
                        </a>
                    </li>
                </ul>

                <ul class="menu navbar-nav ml-lg-auto">
                    <li class="nav-item mr-lg-4">
                            <span class="nav-link">
                                <?php echo "Entrenador: " . $entrenador->getNombre() . " " . $entrenador->getApellido();?>
                            </span>
                    </li>



                    <li class="menu nav-item mr-lg-4">
                        <a class=" nav-link" href="index.php?pid=<?php echo  base64_encode("presentacion/salir.php");?>&logout=true">
                            Salir
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>