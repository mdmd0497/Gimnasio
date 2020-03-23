<?php

$enfermero = new Enfermero($_SESSION["id"]);
$enfermero->consultar();
?>
<title>Consultar clientes</title>

<header>
    <?php
    include 'navenfermero.php';
    ?>
</header>


<div class="container" style="margin-top: 20px;">
    <div class="card" id="inicio-admin">
        <div class="card-header bg-primary text-white">Consultar clientes

        </div>
        <div class="card-body">
            <div>
                <!-- Search form -->
                <form class="form-inline active-pink-3 active-pink-4">
                    <i class="fas fa-search" aria-hidden="true"></i> <input
                            class="form-control form-control-sm ml-3 w-75" type="text"
                            id="formConsulta"
                            placeholder="Buscar Cliente por nombre o apellido"
                            aria-label="Search">
                </form>
            </div>
        </div>
    </div>

    <div id="tabla" style="margin-top: 25px;"></div>

</div>

<div class="modal fade" id="modalClienteEnfermero" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('body').on('show.bs.modal', '.modal', function (e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-content").load(link.attr("href"));
        });

        $("#formConsulta").keyup(function () {
            console.log($("#formConsulta").val());
            if ($("#formConsulta").val() != "") {
                $("#tabla").show();
                <?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/enfermero/filtroCliente.php"). "&idEnfermero=" . $enfermero->getId() ."\";";?>

                $("#tabla").load(ruta, {"filtro": $("#formConsulta").val()})
            } else
                $("#tabla").hide();

        });

        //Al presionar enter se cierra la sesion, esto evita que eso pase
        $(document).keypress(
            function (event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });

    });
</script>
