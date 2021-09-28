<?php
$entrenador = new Entrenador();
$entrenadores = $entrenador->consultarPorPagina();
$idEntrenador = $_GET["idEntrenador"];
?>
<title>Cambiar Entrenador</title>
<header>
    <?php
    include 'navcliente.php';
    ?>
</header>

<div class="container align-items-center">
    <div class="card" id="inicio-admin">
        <div class="card-header bg-primary text-white">Entrenadores disponibles</div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Servicios</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($entrenadores as $e) {
                    if($e->getId() != $idEntrenador){
                        echo "<td>". $e->getNombre() ."</td>";
                        echo "<td>". $e->getApellido() ."</td>";
                        echo "<td>". $e->getCorreo() ."</td>";
                        echo "<td>" . (($e->getFoto() != "" && file_exists("img/" . $e->getFoto() . "") && $e->getFoto()) ? "<img src='img/" . $e->getFoto() . "' alt='Imagen de entrenador" . $e->getFoto() . "'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";
                        echo "<td>". "<a class='fas fa-exchange-alt' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Cambiar Entrenador\" href='index.php?pid=" . base64_encode("presentacion/cliente/consultarEntrenador.php") . "&idEntrenador=" . $e->getId() . "'></a>" ."</td>";
                        echo "</tr>";
                    }
                }
                echo "<tr><td colspan='9'>" . count($entrenadores) . " registros encontrados</td></tr>" ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>