<?php
require_once 'logica/Rutina.php';
require_once 'persistencia/RutinaDAO.php';

$rutina = new Rutina($_GET["idRutina"]);
$rutina->consultar();

?>
<script type="text/javascript"
        src="https://cloud.n1ed.com/cdn/PDE4DFLT/n1tinymce.js"></script>
<div class="modal-header">
    <h5 class="modal-title">Detalles Rutina</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-striped table-hover">
        <tbody>
        <tr>
            <th width="20%">Fecha Inicio</th>
            <td><?php echo $rutina->getFechaInicio(); ?></td>
        </tr>
        <tr>
            <th width="20%">Fecha Fin</th>
            <td><?php echo $rutina->getFechaFin(); ?></td>
        </tr>

        <tr>
            <th width="20%">Descripcion</th>
            <td><?php echo $rutina->getDescripcion(); ?></td>
        </tr>

        </tbody>
    </table>
</div>

<script>
    window.onEditorLoaded = function () {
        tinymce.init({selector: "#editor"});
    }
</script>