<?php

$enfermero = new Enfermero($_SESSION["id"]);
$enfermero->consultar();
$error = -1;
if(isset($_POST["registrar"])){
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $cuello = $_POST["cuello"];
    $hombros = $_POST["hombros"];
    $pecho = $_POST["pecho"];
    $cintura = $_POST["cintura"];
    $antebrazos = $_POST["antebrazos"];
    $muslo = $_POST["muslo"];
    $pantorrillas = $_POST["pantorrillas"];
    $biceps = $_POST["biceps"];
    $cadera = $_POST["cadera"];
    $enfermero_id = $enfermero->getId();
    $cliente_id = $_GET["idCliente"];

    $medida = new Medida("", $altura, $peso, $cuello, $hombros, $pecho, $cintura, $antebrazos, $muslo, $pantorrillas, $biceps, $cadera, "",$enfermero_id, $cliente_id);
    $medida->agregarMedida();
    header("Location: index.php?pid=" . base64_encode("presentacion/enfermero/inicio.php") . "&action=medida&succes=true&idcust=" . $_GET["idCliente"]);
     exit();
}

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
<div class="container-fluid text-center form" >
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Registrar medidas</div>
                <div class="card-body">
                <?php
                    if ($error == 0) { ?>
                        <div class="alert alert-success" role="alert">
                            medidas  Existosas
                        </div>
                    <?php } ?>
                    <form
                        action="index.php?pid=<?php echo base64_encode("presentacion/enfermero/asignarMedidas.php") . "&idCliente=" . $_GET["idCliente"];?>");
                        method="post">
                        <div class="form-group">
                            <label>Ingrese altura en Centimetros</label>
                            <input type="number" name="altura" class="form-control"
								placeholder="altura" required="required" value="<?php echo $altura;?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese peso en Kilogramos</label>
                            <input type="number" name="peso" class="form-control"
                                   placeholder="peso" required="required" value="<?php echo $peso;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida cuello (cm)</label>
                            <input type="number" name="cuello" class="form-control"
                                   placeholder="Cuello" required="required" value="<?php echo $cuello;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida hombros (cm)</label>
                            <input type="number" name="hombros" class="form-control"
                                   placeholder="Hombros" required="required" value="<?php echo $hombros;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida pecho (cm)</label>
                            <input type="number" name="pecho" class="form-control"
                                   placeholder="Pecho" required="required" value="<?php echo $pecho;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida cintura (cm)</label>
                            <input type="number" name="cintura" class="form-control"
                                   placeholder="Cintura" required="required" value="<?php echo $cintura;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida antebrazos (cm)</label>
                            <input type="number" name="antebrazos" class="form-control"
                                   placeholder="Antebrazos" required="required" value="<?php echo $antebrazos;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida muslo (cm)</label>
                            <input type="number" name="muslo" class="form-control"
                                   placeholder="Muslo" required="required" value="<?php echo $muslo;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida pantorrillas (cm)</label>
                            <input type="number" name="pantorrillas" class="form-control"
                                   placeholder="Pantorrillas" required="required" value="<?php echo $pantorrillas;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida biceps (cm)</label>
                            <input type="number" name="biceps" class="form-control"
                                   placeholder="Biceps" required="required" value="<?php echo $biceps;?>">

                        </div>
                        <br>
                        <div class="form-group">
                            <label>Ingrese medida cadera (cm)</label>
                            <input type="number" name="cadera" class="form-control"
                                   placeholder="Cadera" required="required" value="<?php echo $cadera;?>">

                        </div>
                        <br>
                        <div class="form-group">

                        <button type="submit" name="registrar" class="btn btn-warning" style="float: left">Registrar</button>
                        <a class="btn btn-secondary" href="index.php" role="button" style="float: right">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>