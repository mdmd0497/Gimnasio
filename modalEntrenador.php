<?php
require_once 'logica/Persona.php';
require_once 'logica/Entrenador.php';

$idEntrenador = $_GET['idEntrenador'];
$Entrenador = new Entrenador($idEntrenador);
$Entrenador->consultarmodal();

?>
<div class="modal-header">
    <h5 class="modal-title">Detalles Entrenador</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th width="20%">Nombre</th>
                <td><?php echo $Entrenador->getNombre(); ?></td>
            </tr>
            <tr>
                <th width="20%">Apellido</th>
                <td><?php echo $Entrenador->getApellido(); ?></td>
            </tr>
            <tr>
                <th width="20%">Foto</th>
                <?php 
                echo "<td>" . (($Entrenador->getFoto() !== "" && file_exists("img/" . $Entrenador->getFoto() . "") && $Entrenador->getFoto())?"<img src='img/" . $Entrenador->getFoto() . "' width='300px'/>" :
                 "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";
                ?>
            </tr>
            <tr>
                <th width="20%">telefono</th>
                <td><?php echo $Entrenador->getTelefono(); ?></td>
            </tr>
            <tr>
                <th width="20%">Correo</th>
                <td><?php echo $Entrenador->getCorreo(); ?></td>
            </tr>
        </tbody>
    </table>
</div>