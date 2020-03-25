<?php

include 'navcliente.php';

$cliente = new Cliente($_SESSION["id"]);
$cliente->consultar();

?>


<div class="card text-center form">
    <div class="card-header bg-primary text-white">
        Rutinas asignadas a cliente <?php echo $cliente->getNombre() . " " . $cliente->getApellido();?>
    </div>
    <div class="card-body">
        <?php
        $rutina = new Rutina("", "", "", "", $cliente->getEntrenador(), $cliente->getId(), "");
        $rutinas = $rutina->consultarRutinas();
        if($rutinas != null && count($rutinas)>0) { ?>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Fecha inicio</th>
                <th scope="col">Fecha fin</th>
                <th scope="col">Servicios</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rutinas as $r) {
                echo "<tr>";
                echo '<td>' .$r->getFechaInicio() . '</td>';
                echo '<td>' . $r->getFechaFin() . '</td>';
                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalRutinas.php") . "&idRutina=" . $r->getId() . "&idCliente=" . $r->getIdCliente() ."' data-toggle='modal' data-target='#modalRutinas' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>";
                echo "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("presentacion/cliente/rutinapdf.php") . "&idRutina=" . $r->getId()."' target='_blank'><span  class='far fa-file-pdf' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Descargar en PDF\" ></span> </a>";
                echo '</tr>';

            }
            echo '</tbody>';
            echo '</table>';
            }else{
            echo '<p> No hay rutinas asignadas para el cliente </p>';
            }
        ?>

    </div>
</div>


<div class="modal fade" id="modalRutinas" role="document">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
    $('body').on('show.bs.modal', '.modal', function (e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-content").load(link.attr("href"));
    });

</script>