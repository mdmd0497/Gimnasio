<?php

if ($_SESSION["tipo"] == "cliente"){
    if($_GET["idCliente"] != $_SESSION["id"]){
        header("Location: 404.php");
        exit();
    }
}
require_once 'logica/Rutina.php';
require_once 'persistencia/RutinaDAO.php';

$rutina = new Rutina($_GET["idRutina"]);
$rutina->consultar();
?>

<script type="text/javascript"
        src="https://cloud.n1ed.com/cdn/PDE4DFLT/n1tinymce.js"></script>

<div class="modal-header">
    <h5 class="modal-title">Detalles de rutina</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    <div class="card-body">
        <div class="px-2">
            <div class="flex -mx-2">
                <div class="w-1/2 px-2 text-center">
                    <div class="p-3 text-center text-black-200">Fecha de Inicio</div>
                </div>
                <div class="w-1/2 px-2">
                    <div class="p-3 text-center text-black"><?php echo $rutina->getFechaInicio(); ?></div>
                </div>

            </div>

            <div class="px-2">
                <div class="flex -mx-2">
                    <div class="w-1/2 px-2 text-center">
                        <div class="p-3 text-center text-black-200">Fecha de Fin</div>
                    </div>
                    <div class="w-1/2 px-2">
                        <div class="p-3 text-center text-black"><?php echo $rutina->getFechaFin(); ?></div>
                    </div>

                </div>

            </div>
            <div class="px-2">
                <div class="flex -mx-2">
                    <div class="w-1/3 px-2">
                        <div class="h-12"></div>
                    </div>
                    <div class="w-1/3 px-2">
                        <div class="p-3 text-black-200">Descripcion</div>
                    </div>
                    <div class="w-1/3 px-2">
                        <div class="h-12"></div>
                    </div>
                </div>
            </div>

            <textarea class="flex mb-4" id="editor">
                <div class="w-full bg-gray-500 h-12"><?php echo $rutina->getDescripcion(); ?></div>
            </textarea>

        </div>
        <div class="card-footer">
            Asignada el <?php echo $rutina->getFechaRegistro();?>
        </div>
    </div>

</div>

<script>
    window.onEditorLoaded = function () {
        tinymce.init({selector: "#editor"});
    }
</script>