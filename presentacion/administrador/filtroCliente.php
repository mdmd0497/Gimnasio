<?php
$cliente = new Cliente();
if (isset($_POST["filtro"])) {
    $filtro = $_POST ["filtro"];
    $clientes = $cliente->filtroCliente($filtro);

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
                // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
                echo "<tr id='pac" . $p->getId() . "'>";

                echo "<td>" . $p->getId() . "</td>";

                echo "<td>" . $p->getNombre() . "</td>";

                echo "<td>" . $p->getApellido() . "</td>";

                echo "<td>" . $p->getCorreo() . "</td>";

                // Capa <div> correspondiente al icono de Estado a cambiar dependiendo el estado del paciente
                echo "<td><div id='est" . $p->getId() . "'>" . (($p->getEstado() == 1) ? "<i class='fas fa-check-circle fa-2x text-success'></i>" : "<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";

                echo "<td>" . (($p->getFoto() != "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ? "<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "' height='50px'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

                // Se codifica la url del modal para evitar mostrarla y se asegura la url, en la pagina del modal toca decodificar idPaciente para que el servidor lo pueda leer
                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalPaciente.php") . "&" . base64_encode("idPacient") . "=" . $p->getId() . "' data-toggle='modal' data-target='#modalClinte' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>
								<a class='fas fa-pencil-ruler servicios ' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='top' title='Actualizar' class='servicios'> </a>
										
					   			<a class='fas fa-camera servicios' href='index.php?pid=" . base64_encode("presentacion/paciente/actualizarFotoPaciente.php") . "&idPaciente=" . $p->getId() . "' data-toggle='tooltip' data-placement='bottom' title='Actualizar Foto' class='servicios'></a>";

                // Icono de candado a cambiar dependiendo si el paciente esta activo o no
                echo "<span class='servicios' id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado() == 0) ? "fas fa-lock-open' title='Habilitar paciente' " : "fas fa-lock' title='Inhabilitar paciente'") . "' id='hab" . $p->getId() . "' href='#pac" . $p->getId() . "' data-toggle='tooltip' data-placement='right' </a></span>";

                echo "</tr>";
            }
            echo "<tr><td colspan='9'>" . count($clientes) . " registros encontrados</td></tr>" ?>

            </tbody>

        </table>

    </div>
</div>


<script>

    <?php foreach ($clientes as $p) { ?>
    $("#hab<?php echo $p->getId();?>").click(function () {
        <?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/paciente/editarEstadoPacienteAjax.php") . "&idPaciente=" . $p->getId() . "&estado=" . $p->getEstado() . "\";"; ?>
        // Esto esconde el Tooltip del candado previamente seleccionado
        $("#hab<?php echo $p->getId();?>").tooltip('hide');
        // Esto carga toda la capa de la fila de la tabla del paciente a actualizar vease arriba que la etiqueta <tr> contiene el id pac#
        $("#pac<?php echo $p->getId();?>").load(ruta);
    });
    <?php } ?>


</script>
