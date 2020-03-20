<?php
// Sources https://www.youtube.com/watch?v=2jxM7IwpiXc
#https://www.tutorialspoint.com/php/php_file_uploading.htm

$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$enfermero = new Enfermero($_GET["idEnfermero"]);
$enfermero->consultarmodal();
include 'nav.php';

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
        if ($enfermero->fotoExiste() != 0 && file_exists("img/" . $enfermero->getFoto())) {
            unlink("img/" . $enfermero->getFoto());
        }
        $enfermero = new Enfermero($_GET["idEnfermero"], "", "", "", "", $nombreFoto, "");
        $enfermero->actualizarFoto();
    }
}

?>

<div class="container form">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Actualizar Foto Enfermero</div>
                <div class="card-body">
                    <?php
                    if (isset($_POST["actualizar"])) {
                        if ($_FILES['foto']['error'] == 1) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo 'El archivo no debe pesar mas de 2MB. Seleccione otro.';
                            echo '</div>';
                        } else if ($errors) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $errors[0];
                            echo '</div>';
                        } else {
                            echo '<div class="alert alert-success" role="alert">';
                            echo 'Foto del Enfermero actualizada exitosamente.';
                            echo '</div>';
                        }
                    }
                    ?>
                    <form action=<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/actualizarFotoEnfermero.php") . "&idEnfermero=" . $_GET["idEnfermero"] ?> method="post"
                          enctype="multipart/form-data">
                        <!-- Upload image input-->
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="foto">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Subir
                                archivo</label>
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

                        <div class="form-group">
                            <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
                            <a class="btn btn-light" style="float: right"
                               href="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/consultarEnfermero.php") ?>"
                               role="button">Volver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>


<script>
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

