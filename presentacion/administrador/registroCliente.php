<?php
require_once 'logica/Cliente.php';
$entrenador = new Entrenador();
$entrenadores = $entrenador->consultarTodos();

$enfermero = new Enfermero();
$enfermeros = $enfermero->consultarTodos();

$genero = new genero();
$generos = $genero->consultarTodos();

$rh = new rh();
$rhs = $rh->consultarTodos();

$idenfermero = "";
$error = -1;
$nombre = "";
$apellido = "";
$correo = "";
$telefono = "";
$identre = "";
$id_gen = "";
$id_rh = "";

if (isset($_POST["registrar"])) {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $idenfermero = $_POST["enferme"];
    $identre = $_POST["entrenad"];
    $id_gen = $_POST["genero"];
    $id_rh = $_POST["rh"];

    function validateEmail($email) {
        $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        if (preg_match($regex, $email)){
            return true;
        }else{
            return false;
        }
    }

    $cliente = new Cliente("", "", "", $correo);
    if (validateEmail($correo)){
        if (strlen($telefono) == 6 || strlen($telefono) == 10) {
            if (!$cliente->existeCorreo()) {
                $password = $_POST["clave"];
                $cliente = new Cliente("", $nombre, $apellido, $correo, password_hash($password, PASSWORD_BCRYPT), "", $telefono, "", "", $identre, $idenfermero, $id_gen, $id_rh);
                $cliente->registrar();
                $error = 0;
            } else {
                $error = 1;
                $correo = $_POST["correo"];
            }
        } else {
            $error = 2;
        }
    }else{
        $error = 3;
    }

}
?>

<title>Registro Cliente</title>

<header>
    <?php
    include 'nav.php';
    ?>
</header>

<div class="container-fluid text-center form">
    <div class="row justify-content-center">
        <div class="col col-md-auto col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Registro</div>
                <div class="card-body">
                    <?php
                    if ($error == 0) { ?>
                        <div class="alert alert-success" role="alert">
                            Cliente registrado Existosamente
                        </div>
                    <?php } ?>
                    <?php
                    if ($error == 1) { ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> ya existe
                        </div>
                    <?php } elseif ($error == 2) { ?>
                        <div class="alert alert-danger" role="alert">
                            El teléfono <?php echo $telefono; ?> no es valido
                        </div>
                    <?php } elseif ($error == 3){ ?>
                        <div class="alert alert-danger" role="alert">
                            El correo <?php echo $correo; ?> no es valido
                        </div>
                    <?php } ?>
                    <form
                            action="<?php echo "index.php?pid=" . base64_encode("presentacion/administrador/registroCliente.php") . "&action=signup" ?>"
                            method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control"
                                   placeholder="Nombre" required="required"
                                   value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" class="form-control"
                                   placeholder="Apellido" required="required"
                                   value="<?php echo $apellido; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="correo" class="form-control"
                                   placeholder="Correo" required="required"
                                   value="<?php echo $correo; ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="clave" class="form-control"
                                   placeholder="Clave" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control"
                                   placeholder="telefono" required="required"
                                   value="<?php echo $telefono; ?>">
                        </div>

                        <div class="form-group">
                            <label for="formenfermero">Médico</label> <select name="enferme"
                                                                                 class="form-control" id="enferme">
                                <?php foreach ($enfermeros as $en) {
                                    echo "<option value='" . $en->getId() . "'>" . $en->getNombre() . " " . $en->getApellido() . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formentrenador">Entrenador</label> <select name="entrenad"
                                                                                   class="form-control" id="entrenad">
                                <?php foreach ($entrenadores as $e) {
                                    echo "<option value='" . $e->getId() . "'>" . $e->getNombre() . " " . $e->getApellido() . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formgenero">genero</label> <select name="genero"
                                                                           class="form-control" id="genero">
                                <?php foreach ($generos as $g) {
                                    echo "<option value='" . $g->getId_gen() . "'>" . $g->getGenero() . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="formrh">rh</label> <select name="rh"
                                                                   class="form-control" id="rh">
                                <?php foreach ($rhs as $r) {
                                    echo "<option value='" . $r->getId_rh() . "'>" . $r->getRh() . "</option>";
                                } ?>
                            </select>
                        </div>

                        <button type="submit" name="registrar" class="btn btn-primary" style="float: left">Registrar
                        </button>
                        <a class="btn btn-secondary" href="index.php" role="button" style="float: right">Volver</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script>

</script>
