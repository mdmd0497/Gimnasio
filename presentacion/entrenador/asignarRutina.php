<?php
$entrenador = new Entrenador($_SESSION["id"]);
$entrenador->consultar();

$cliente = new Cliente($_GET["idCliente"]);
$cliente->consultar();



if(isset($_POST["registrar"])){


    $rutina = new Rutina("", $_POST["descripcion"], $_POST["fechaInicio"], $_POST["fechaFin"], $_SESSION["id"], $cliente->getId());
    $rutina->registrarRutina();
    header("Location: index.php?action=regRutina&result=success");
    exit();
}

include 'naventrenador.php';
?>


<script type="text/javascript"
        src="https://cloud.n1ed.com/cdn/PDE4DFLT/n1tinymce.js"></script>

<div class="container-fluid text-center form">
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-8">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    Asignar rutina a cliente <a class='servicios'
                                                href='indexAjax.php?pid=<?php echo base64_encode("modalClienteEnfermero.php") . "&idCliente=" . $_GET["idCliente"]; ?>'
                                                data-toggle='modal'
                                                data-target='#modalClienteEntrenador'> <?php echo $cliente->getNombre() . " " . $cliente->getApellido(); ?> </a>
                </div>
                <div class="card-body">
                    <form action="index.php?pid=<?php echo base64_encode("presentacion/entrenador/asignarRutina.php") . "&idCliente=" . $_GET["idCliente"]; ?>" method="post">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-green-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                       for="fechaInicio">
                                    Fecha de Inicio
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-green-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                       id="fechaInicio" type="date" name="fechaInicio" required>
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                       for="fechaFin">
                                    Fecha de Fin
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input class="bg-red-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                       id="fechaFin" type="date" name="fechaFin" required>
                            </div>
                        </div>

                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-black-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                       for="fechaFin">
                                    Ingrese rutina
                                </label>
                            </div>
                        </div>

                        <textarea id="editor" class="md:w-2/3" name="descripcion" required>

                        </textarea>

                <div class="form-group" style="margin-top: 20px">
                <button type="submit" name="registrar" class="btn btn-primary" style="float: left">
                    Registrar
                </button>

                <a class="btn btn-secondary" href="index.php" role="button"
                   style="float: right">Volver</a>

                </div>


                </form>
            </div>
            <div class="card-footer block text-black-50 font-bold md:text-center mb-1 md:mb-0 pr-4">
                Fecha de asignacion: <?php echo date("d M Y"); ?>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modalClienteEntrenador" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent"></div>
    </div>
</div>


<script>
    $('body').on('show.bs.modal', '.modal', function (e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-content").load(link.attr("href"));
    });
    window.onEditorLoaded = function () {
        tinymce.init({selector: "#editor"});
    }
</script>

