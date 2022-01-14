<?php

include 'navcliente.php';

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

$cliente = new Cliente($_SESSION["id"]);
$cliente->consultar();

?>


<div class="card text-center form">
    <div class="card-header bg-primary text-white">
        Rutinas asignadas a cliente <?php echo $cliente->getNombre() . " " . $cliente->getApellido();?>
    </div>
    <div class="card-body">
        <?php
        $rutina = new Rutina("", "", "", "", "", "", "", "", "", "", "", $cliente->getEntrenador(), $cliente->getId());
        $rutinas = $rutina->consultarPorPagina($cantidad, $pagina, $orden, $dir);
        $totalRegistros = $rutina->consultarTotalRegistros();
        $totalPaginas = intval(($totalRegistros/$cantidad));
        if($totalRegistros%$cantidad != 0){
            $totalPaginas++;
        }
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
            $i = (($pagina - 1) * $cantidad) + 1;
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
            echo '</table>'; ?>
            <div class="row">
                <div class="col-11">
                    <nav>
                        <ul class="pagination">
                            <?php
                            if($pagina == 1){
                                echo "<li class='page-item disabled'><span class='page-link'>Anterior</span></li>";
                            }else{
                                echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/verRutina.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
                                                echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/verRutina.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                            }
                                            else{
                                                echo "...";
                                            }
                                        }
                                        else{
                                            echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/verRutina.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
                                echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/verRutina.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
            <?php
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

    $("#cantidad").on("change", function() {
        url = "index.php?pid=<?php echo base64_encode("presentacion/cliente/verRutina.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
        //alert (url);
        location.replace(url);
    });
</script>