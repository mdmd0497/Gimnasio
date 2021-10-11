<?php
$entrenador = new Entrenador($_SESSION["id"]);
$entrenador->consultar();

$cliente = new Cliente($_GET["idCliente"]);
$cliente->consultar();

$nombreFoto = "";

if (isset($_POST["registrar"])) {
    if ($_POST["fechaFin"] < $_POST["fechaInicio"]) {
        header("Location: index.php?pid=" . base64_encode("presentacion/entrenador/asignarRutina.php") . "&idCliente=" . $_GET["idCliente"] . "&result=fechaLimit");
        exit();
    }

    if (isset($_FILES['foto'])) {
        $errors = array();
        $extensions = array("jpeg", "jpg", "png");
        $ext_archivo = explode(".", $_FILES['foto']['name']);
        $ext_archivo = end($ext_archivo);
        if (in_array($ext_archivo, $extensions) === false) {
            $errors[] = "Extension no permitada, escoja un archivo con extension JPEG, PNG o JPG.";
        }
        if ($_FILES['foto']['size'] > 2097152) {
            $errors[] = "El archivo no debe pesar mas de 2MB";
        }
        if (empty($errors)) {
            $hora = round(microtime(true) * 1000);
            $nombreFoto = $hora . "." . $ext_archivo;
            move_uploaded_file($_FILES['foto']['tmp_name'], "img/" . $nombreFoto);
        }
    }

    $rutina = new Rutina("", "", "", "", $_SESSION["id"], $cliente->getId(), "");
    $rutinas = $rutina->consultarRutinas();
    if ($rutinas != null && count($rutinas) > 0) {
        foreach ($rutinas as $r) {
            if ($_POST["fechaInicio"] >= $r->getFechaInicio() && $_POST["fechaInicio"] <= $r->getFechaFin() || $_POST["fechaFin"] >= $r->getFechaInicio() && $_POST["fechaFin"] <= $r->getFechaFin()) {
                header("Location: index.php?pid=" . base64_encode("presentacion/entrenador/asignarRutina.php") . "&idCliente=" . $_GET["idCliente"] . "&result=failFecha");
                exit();
            }
        }
    }

    $rutina = new Rutina("", $_POST["descripcion"], $_POST["numero_dia"], $_POST["nombre"], $_POST["duracion"], $_POST["series"], $_POST["repeticiones_series"], $nombreFoto, $_POST["descanso"], $_POST["fechaInicio"], $_POST["fechaFin"], $_SESSION["id"], $cliente->getId());
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
                    <?php
                    if (isset($_POST["registrar"])) {
                        if ($_FILES['foto']['error'] == 1) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo 'El archivo no debe pesar mas de 2MB. Seleccione otro.';
                            echo '</div>';
                        } else if ($errors) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $errors[0];
                            echo '</div>';
                        }
                    }
                    ?>
                    <form action="index.php?pid=<?php echo base64_encode("presentacion/entrenador/asignarRutina.php") . "&idCliente=" . $_GET["idCliente"]; ?>"
                          enctype="multipart/form-data" method="post">
                        <?php if (isset($_GET["result"]) && $_GET["result"] == "failFecha") {
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo "Error, hay cruces en las fechas de la rutina con otras rutinas ya registradas";
                            echo "</div>";
                        } elseif (isset($_GET["result"]) && $_GET["result"] == "fechaLimit") {
                            echo "<div class='alert alert-danger' role='alert'>";
                            echo "Error, verifique las fechas ingresadas";
                            echo "</div>";
                        }
                        ?>
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
                        <div class="text-center">
                            <span><strong>Ingrese Rutina</strong></span>
                        </div>
                        <br/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre Ejercicio</label>
                            <div class="col-sm-10">
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre del ejercicio..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Descripción Ejercicio</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Describa el ejercicio..." rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Duración del Ejercicio</label>
                            <div class="col-sm-10">
                                <input type="number" id="duracion" name="duracion" class="form-control" placeholder="Ingrese la duración del ejercicio (En segundos)..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cantidad de Series</label>
                            <div class="col-sm-10">
                                <input type="number" id="series" name="series" class="form-control" placeholder="Ingrese la cantidad de series del ejercicio..." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Repeticiones por Serie</label>
                            <div class="col-sm-10">
                                <input type="number" id="repeticiones_series" name="repeticiones_series" class="form-control" placeholder="Ingrese las repeticiones que se hacen por serie del ejercicio..." required>
                            </div>
                        </div>
                        <!-- Load image -->
                        <div class="input-group sm-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="foto" required>
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Subir
                                imagen guía de rutina</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Seleccione
                                        archivo</small></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Uploaded image area-->
                            <p class="font-italic text-white text-center">Visualizar la imagen a subir.</p>
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                                              class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Descanso entre series</label>
                            <div class="col-sm-10">
                                <input type="number" id="descanso" name="descanso" class="form-control" placeholder="Ingresen el tiempo de descanso (En segundos)..." required>
                            </div>
                        </div>
                        <select id="numero_dia" name="numero_dia" class="input-group sm-3 px-2 py-2 bg-white shadow-sm" required>
                            <option selected>Seleccione...</option>
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miércoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sábado</option>
                            <option value="7">Domingo</option>
                        </select>

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

    /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $('#upload').on('change', function () {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>

