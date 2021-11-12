<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';
require_once 'logica/Medida.php';

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

$idCliente = $_SESSION["id"];

$medida = new Medida("","","","","","","","","","","","","","",$idCliente);
$medidas = $medida->consultarPorPagina($cantidad, $pagina, $orden, $dir);
$totalRegistros =$medida-> consultarTotalRegistros();
$totalPaginas = intval(($totalRegistros/$cantidad));
if($totalRegistros%$cantidad != 0){
    $totalPaginas++;
}
?>
<header>
    <?php
    include 'navcliente.php';
    ?>
</header>
<div class="modal-header">
    <h5 class="modal-title">Detalles Cliente</h5>
</div>
<div class="modal-body">

    <table class="table table-striped table-hover">
        <tbody>
        <?php
        $i = (($pagina - 1) * $cantidad) + 1;
        foreach ($medidas as $m) {
            $altura = $peso = false;
            if($m->getAltura() != null && $m->getAltura() != "") {
                $altura = true;
                echo "<tr class='bg-primary text-white'>
                        <th width='20%'>Medidas para la fecha: </th>
                        <td>". $m->getFecha() ."</td>
                         </tr>";
                echo "<tr>
                        <th width='20%'>altura</th>
                        <td>". $m->getAltura() ."</td>
                    </tr>";
            }if($m->getPeso() != null && $m->getPeso() != "") {
                $peso = true;
                echo "<tr>
                        <th width='20%'>peso</th>
                        <td>". $m->getPeso() ."</td>
                    </tr>";
            }if($peso) {
                echo "<tr>
                        <th width='20%'>IMC</th>
                        <td>" . ($m->getPeso() / pow($m->getAltura() / 100, 2)) . "</td>
                    </tr>";
            }
        }
        ?>
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
                        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/consultarMedidas.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Anterior</a></li>";
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
                                        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/consultarMedidas.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
                                    }
                                    else{
                                        echo "...";
                                    }
                                }
                                else{
                                    echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/consultarMedidas.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>" . $i . "</a></li>";
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
                        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/cliente/consultarMedidas.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad . (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") . "'>Siguiente</a></li>";
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
<script>
    $("#cantidad").on("change", function() {
        url = "index.php?pid=<?php echo base64_encode("presentacion/cliente/consultarMedidas.php") ?>&cantidad=" + $(this).val() + "<?php echo (($orden!="")?"&orden=" . $orden:"") . (($dir!="")?"&dir=" . $dir:"") ?>";
        //alert (url);
        location.replace(url);
    });
</script>
