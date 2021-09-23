<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';
require_once 'logica/Medida.php';

$idCliente = $_SESSION["id"];

$medida = new Medida("","","","","",$idCliente);
$medida->obtenerMedidas();
?>
<header>
    <?php
    include 'navcliente.php';
    ?>
</header>
<div class="modal-header">
    <h5 class="modal-title">Detalles Cliente</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover">
        <tbody>

            <?php
            $altura = $peso = false;
            if($medida->getAltura() != null && $medida->getAltura() != "") {
                $altura = true;
                ?>
                <tr>
                    <th width="20%">altura</th>
                    <td><?php echo $medida->getAltura(); ?></td>
                </tr>
                <?php
            }if($medida->getPeso() != null && $medida->getPeso() != "") {
                $peso = true;
                ?>

                <tr>
                    <th width="20%">peso</th>
                    <td><?php echo $medida->getPeso(); ?></td>
                </tr>

                <?php
            }if($medida && $peso){
            ?>
            <tr>
                <th width="20%">IMC</th>
                <td><?php echo ($medida->getPeso()/pow($medida->getAltura()/100, 2)); ?></td>
            </tr>
        <?php } 
        $fecha = false;
        if($medida->getFecha() != null){
            $fecha = true;
            ?>

            <tr>
                <th width="20%">Fecha</th>
                <td><?php echo $medida->getFecha(); ?></td>
            </tr>

            <?php
        }
            ?>
        
        </tbody>
    </table>
</div>
