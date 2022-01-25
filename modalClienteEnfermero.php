<?php
require_once 'logica/Persona.php';
require_once 'logica/Cliente.php';
require_once 'logica/Medida.php';

$idCliente = $_GET['idCliente'];
$Cliente = new Cliente($idCliente);
$Cliente->consultarmodal();

$medida = new Medida("","","","","","","","","","","","","","",$idCliente);
$medida->consultarmodalenfermero();

?>
<div class="modal-header">
    <h5 class="modal-title">Detalles Cliente</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th width="20%">Nombre</th>
                <td><?php echo $Cliente->getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $Cliente->getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Foto</th>
                <?php 
                echo "<td>" . (($Cliente->getFoto() !== "" && file_exists("img/" . $Cliente->getFoto() . "") && $Cliente->getFoto())?"<img src='img/" . $Cliente->getFoto() . "' width='300px'/>" :
                 "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";
                ?>
            </tr>
            <tr>
                <th width="20%">Telefono</th>
                <td><?php echo $Cliente->getTelefono(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $Cliente->getCorreo(); ?></td>
            </tr>
            <tr>
                <th width="20%">Estado</th>
                <td><?php echo (($Cliente->getEstado()==1)?"<i class='fas fa-check-circle fa-2x text-success'></i>":"<i class='fas fa-times-circle fa-2x   text-danger'></i>"); ?></td>
            </tr>
            
            <tr>
                <th width="20%">Entrenador</th>
                <td><?php echo $Cliente->getEntrenador(); ?></td>
            </tr>
            
            <tr>
                <th width="20%">Médico</th>
                <td><?php echo $Cliente->getEnfermero(); ?></td>
            </tr>
            
            <tr>
                <th width="20%">Género</th>
                <td><?php echo   $Cliente->getGenero() != 'M'?"Masculino":"Femenino";?></td>
            </tr>
            
            <tr>
                <th width="20%">RH</th>
                <td><?php echo $Cliente->getRh(); ?></td>
            </tr>

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
        <?php } ?>
        </tbody>
    </table>
</div>
