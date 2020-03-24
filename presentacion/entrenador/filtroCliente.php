<?php
$cliente = new Cliente();
if (isset($_POST["filtro"])) {
    $filtro = $_POST ["filtro"];
    $identrenador = $_SESSION["id"];
    $clientes = $cliente->filtroClienteEntrenador($identrenador,$filtro);

    
} else {
    $cliente = $cliente->consultarTodos();
}

?>


<div class="card">
    <div class="card-header bg-primary text-white">Resultado clientes

    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado</th>
                <th scope="col">Foto</th>
                <th scope="col">Servicios</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($clientes as $p) {
                $medida = new Medida("", "", "", "", "", $p->getId());
                $medida->obtenerMedidas();
                // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
                echo "<tr id='cli" . $p->getId() . "'>";

                echo "<td>" . $p->getId() . "</td>";

                echo "<td>" . $p->getNombre() . "</td>";

                echo "<td>" . $p->getApellido() . "</td>";

                echo "<td>" . $p->getCorreo() . "</td>";

                // Capa <div> correspondiente al icono de Estado a cambiar dependiendo el estado del paciente
                echo "<td><div id='est" . $p->getId() . "'>" . (($p->getEstado() == 1) ? "<i class='fas fa-check-circle fa-2x text-success'></i>" : "<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";

                echo "<td>" . (($p->getFoto() != "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ? "<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalClienteEnfermero.php"). "&idCliente=" . $p->getId() . "' data-toggle='modal' data-target='#modalClienteEnfermero' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>
                               <a class='servicios' href='indexAjax.php?pid=" . base64_encode("presentacion/enfermero/asignarMedidas.php") . "&idCliente=" . $p->getId() . "' data-toggle='modal' data-target='#modalMedidas'><span  class='far fa-edit servicios' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Medidas\" ></a>";

//                 // Icono de candado a cambiar dependiendo si el paciente esta activo o no
//                 echo "<span class='servicios' id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado() == 0) ? "fas fa-lock-open' title='Habilitar cliente' " : "fas fa-lock' title='Inhabilitar cliente'") . "' id='hab" . $p->getId() . "' href='#" . $p->getId() . "' data-toggle='tooltip' data-placement='right' </a></span>";

                echo "</tr>";
            }
            echo "<tr><td colspan='9'>" . count($clientes) . " registros encontrados</td></tr>" ?>

            </tbody>

        </table>

    </div>
</div>


<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>