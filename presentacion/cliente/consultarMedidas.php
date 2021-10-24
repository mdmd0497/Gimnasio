<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';
require_once 'logica/Medida.php';

$idCliente = $_SESSION["id"];

$medida = new Medida("","","","","","","","","","","","","","",$idCliente);
$medidas = $medida->obtenerMedidas();
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

</div>
