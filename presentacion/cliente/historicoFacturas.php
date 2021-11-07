<?php
$facturas = new Facturacion("", "", "", "", "", "", $_SESSION['id']);
$facturas = $facturas->consultarTodos();
?>

<title>Histórico de Facturas</title>
<header>
    <?php
    include 'navcliente.php';
    ?>
</header>

<div class="card">
    <div class="card-header bg-primary text-white">Su historial</div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID Factura</th>
                <th scope="col">Fecha inicial de factura</th>
                <th scope="col">Fecha de vencimiento de factura</th>
                <th scope="col">Servicios</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($facturas as $f) {
                // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
                echo "<tr id='cli" . $f->getId() . "'>";

                echo "<td>" . $f->getId() . "</td>";

                echo "<td>" . $f->getFechaInicio() . "</td>";

                echo "<td>" . $f->getFechaVencimiento() . "</td>";

                // Capa <div> correspondiente al icono de Estado a cambiar dependiendo el estado del paciente

                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalFactura.php") . "&idFactura=" . $f->getId() . "' data-toggle='modal' data-target='#modalFactura' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>";

//                 // Icono de candado a cambiar dependiendo si el paciente esta activo o no
//                 echo "<span class='servicios' id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado() == 0) ? "fas fa-lock-open' title='Habilitar cliente' " : "fas fa-lock' title='Inhabilitar cliente'") . "' id='hab" . $p->getId() . "' href='#" . $p->getId() . "' data-toggle='tooltip' data-placement='right' </a></span>";

                echo "</tr>";
            }
            echo "<tr><td colspan='9'>" . count($facturas) . " registros encontrados</td></tr>" ?>

            </tbody>

        </table>

    </div>
</div>

<div class="modal fade" id="modalFactura" role="document">
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
