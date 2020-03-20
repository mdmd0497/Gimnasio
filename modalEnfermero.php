<?php
require_once 'logica/Persona.php';
require_once 'logica/Enfermero.php';

$idEnfermero = $_GET['idEnfermero'];
$Enfermero = new Enfermero($idEnfermero);
$Enfermero->consultarmodal();

?>
<div class="modal-header">
    <h5 class="modal-title">Detalles enfermero</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th width="20%">Nombre</th>
                <td><?php echo $Enfermero->getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $Enfermero->getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Foto</th>
                <?php 
                echo "<td>" . (($Enfermero->getFoto() !== "" && file_exists("img/" . $Enfermero->getFoto() . "") && $Enfermero->getFoto())?"<img src='img/" . $Enfermero->getFoto() . "' width='300px'/>" :
                 "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";
                ?>
            </tr>
            <tr>
                <th width="20%">telefono</th>
                <td><?php echo $Enfermero->getTelefono(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $Enfermero->getCorreo(); ?></td>
            </tr>
        </tbody>
    </table>
</div>
