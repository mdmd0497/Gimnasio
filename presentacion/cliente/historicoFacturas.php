<?php

$cantidad = 5;
if(isset($_GET["cantidad"])){
    $cantidad = $_GET["cantidad"];
}
$pagina = 1;
if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
$orden = "";
if(isset($_GET["orden"])){
    $orden = $_GET["orden"];
}
$dir = "";
if(isset($_GET["dir"])){
    $dir = $_GET["dir"];
}

$factura = new Facturacion("", "", "", "", "", "", $_SESSION['id']);
$facturas = $factura->consultarPorPagina($cantidad, $pagina, $orden, $dir);
$totalRegistros = $factura->consultarTotalRegistros();
$totalPaginas = intval(($totalRegistros/$cantidad));
if($totalRegistros%$cantidad != 0){
    $totalPaginas++;
}
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
            $i = (($pagina - 1) * $cantidad) + 1;
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
        <div class="row">
            <div class="col-11">
                <nav>
                    <ul class="pagination">
                        <?php
                        if($pagina == 1){
                            echo "<li class='page-item disabled'><span class='page-link'>Anterior</span></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/historicoFacturas.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
                        }
                        for($i=1; $i<=$totalPaginas; $i++){
                            $radius = 2;
                            if(($i >= 1 && $i <= $radius) || ($i > $pagina - $radius && $i < $pagina + $radius) || ($i <= $totalPaginas && $i > $totalPaginas - $radius)){
                                if($pagina == $i){
                                    echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                                }
                                else{
                                    if ($pagina != 1 && $i == $pagina-2 || $pagina != 1 && $i== $pagina+2){
                                        if ($i == 1 || $i == $totalPaginas){
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/historicoFacturas.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                        }
                                        else{
                                            echo "...";
                                        }
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/historicoFacturas.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                    }
                                }
                            }
                            elseif($i == $pagina - $radius || $i == $pagina + $radius) {
                                echo "...";
                            }
                        }
                        if($pagina == $totalPaginas || $totalRegistros==0){
                            echo "<li class='page-item disabled'><span class='page-link'>Siguiente</span></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/historicoFacturas.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-1 text-right">
                <select name="cantidad" id="cantidad" class="custom-select">
                    <option value="5" <?php echo ($cantidad==5)?"selected":"" ?>>5</option>
                    <option value="10" <?php echo ($cantidad==10)?"selected":"" ?>>10</option>
                    <option value="20" <?php echo ($cantidad==20)?"selected":"" ?>>20</option>
                </select>
            </div>
        </div>
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

    $("#cantidad").on("change", function() {
        url = "index.php?pid=<?php echo base64_encode("presentacion/cliente/historicoFacturas.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
        //alert (url);
        location.replace(url);
    });
</script>
