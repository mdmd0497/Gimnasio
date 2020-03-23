<?php

$enfermero = new Enfermero($_SESSION["id"]);
$enfermero->consultar();
$error = -1;
if(isset($_POST["registrar"])){
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $enfermero_id = $enfermero->getId();
    $cliente_id = $_GET["idCliente"];
    
    $medida = new Medida("", $altura, $peso, "",$enfermero_id, $cliente_id);
    $medida->agregarMedida();
    $error=0;
//     header("Location: index.php?pid=" . base64_encode("presentacion/enfermero/inicio.php") . "&action=medida&succes=true&idcust=" . $_GET["idCliente"]);
//     exit();
}

?>
<title>Asignar medidas a cliente</title>

<header>
    <?php
    include 'navenfermero.php';
    ?>
</header>



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

                        <button type="submit" name="registrar" class="btn btn-primary" style="float: left">Registrar</button>
                        <a class="btn btn-secondary" href="index.php" role="button" style="float: right">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>