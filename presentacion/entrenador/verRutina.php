<?php

include 'naventrenador.php';

$cliente = new Cliente($_GET["idCliente"]);
$cliente->consultar();

?>

<div class="card text-center form">
    <div class="card-header bg-primary text-white">
        Rutinas asignadas a cliente <?php echo $cliente->getNombre() . " " . $cliente->getApellido();?>
    </div>
    <div class="card-body">
        <?php
        $rutina = new Rutina("", "", "", "", "", "", "", "", "", "", "", $_SESSION["id"], $cliente->getId());
        $rutinas = $rutina->consultarRutinas();
        if($rutinas != null && count($rutinas)>0) { ?>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Dia</th>
                <th scope="col">Nombre Ejercicio</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Servicios</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rutinas as $r) {
                echo "<tr>";
                echo '<td>';
                switch ($r->getNumeroDia()) {
                    case 1:
                        echo "Lunes";
                        break;
                    case 2:
                        echo "Martes";
                        break;
                    case 3:
                        echo "Miercoles";
                        break;
                    case 4:
                        echo "Jueves";
                        break;
                    case 5:
                        echo "Viernes";
                        break;
                    case 6:
                        echo "Sabado";
                        break;
                    case 7:
                        echo "Domingo";
                        break;
                }
                echo '</td>';
                echo '<td>' . $r->getNombre() . '</td>';
                echo '<td>' . $r->getDescripcion() . '</td>';
                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalRutinas.php") . "&idRutina=" . $r->getId() . "' data-toggle='modal' data-target='#modalRutinas' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>";
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