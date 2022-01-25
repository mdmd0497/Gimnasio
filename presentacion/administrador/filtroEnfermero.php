<?php
$enfermero = new Enfermero();
if (isset($_POST["filtro"])) {
    $filtro = $_POST ["filtro"];
    $enfermeros= $enfermero->filtroEnfermero($filtro);

} else {
    $enfermero = $enfermero->consultarTodos();
}

?>


<div class="card">
    <div class="card-header bg-primary text-white">Resultado médicos

    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Foto</th>
                <th scope="col">Servicios</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($enfermeros as $p) {
                // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
                echo "<tr id='ent" . $p->getId() . "'>";

                echo "<td>" . $p->getId() . "</td>";

                echo "<td>" . $p->getNombre() . "</td>";

                echo "<td>" . $p->getApellido() . "</td>";

                echo "<td>" . $p->getCorreo() . "</td>";


                echo "<td>" . (($p->getFoto() != "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ? "<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

                // Se codifica la url del modal para evitar mostrarla y se asegura la url, en la pagina del modal toca decodificar idPaciente para que el servidor lo pueda leer
                echo "<td>" . "<a class='servicios' href='indexAjax.php?pid=" . base64_encode("modalEnfermero.php"). "&idEnfermero=" . $p->getId() . "' data-toggle='modal' data-target='#modalEnfermero' ><span  class='fas fa-eye' data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver detalles\" ></span> </a>
								<a class='fas fa-pencil-ruler servicios ' href='index.php?pid=" . base64_encode("presentacion/administrador/actualizarEnfermero.php") . "&idEnfermero=" . $p->getId() . "' data-toggle='tooltip' data-placement='top' title='Actualizar' class='servicios'> </a>
                
                                
										
					   			<a class='fas fa-camera servicios' href='index.php?pid=" . base64_encode("presentacion/administrador/actualizarFotoEnfermero.php") . "&idEnfermero=" . $p->getId() . "' data-toggle='tooltip' data-placement='bottom' title='Actualizar Foto' class='servicios'></a>";
                               
  
//                 // Icono de candado a cambiar dependiendo si el paciente esta activo o no
//                 echo "<span class='servicios' id='status" . $p->getId() . "'><a style='margin-left: 3px' class='" . (($p->getEstado() == 0) ? "fas fa-lock-open' title='Habilitar cliente' " : "fas fa-lock' title='Inhabilitar cliente'") . "' id='hab" . $p->getId() . "' href='#" . $p->getId() . "' data-toggle='tooltip' data-placement='right' </a></span>";

                echo "</tr>";
            }
            echo "<tr><td colspan='9'>" . count($enfermeros) . " registros encontrados</td></tr>" ?>

            </tbody>

        </table>

    </div>
</div>


<script>

    <?php foreach ($enfermeros as $p) { ?>
    $("#hab<?php echo $p->getId();?>").click(function () {
        <?php echo "var ruta = \"indexAjax.php?pid=" . base64_encode("presentacion/administrador/editarEstadoClienteAjax.php") . "&idCliente=" . $p->getId() . "&estado=" . $p->getEstado() . "\";"; ?>
        // Esto esconde el Tooltip del candado previamente seleccionado
        $("#hab<?php echo $p->getId();?>").tooltip('hide');
        // Esto carga toda la capa de la fila de la tabla del paciente a actualizar vease arriba que la etiqueta <tr> contiene el id pac#
        $("#cli<?php echo $p->getId();?>").load(ruta);
    });
    <?php } ?>


</script>