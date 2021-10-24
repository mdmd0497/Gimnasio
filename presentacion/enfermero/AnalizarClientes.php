<?php
$enfermero = new Enfermero($_SESSION["id"]);
$enfermero->consultar();

$cliente = new Cliente();
$idenfermero = $_GET["idEnfermero"];
$clientes = $cliente->consultarTodos($idenfermero);
$clientePorGenero = $cliente->agruparPorGenero();

?>

<header>
    <?php
    include 'navenfermero.php';
    ?>
</header>


<div class="card">
	<div class="card-header bg-primary text-white">Resultado clientes</div>
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
					<th scope="col">Genero</th>
				</tr>
			</thead>
			<tbody>

            <?php
            foreach ($clientes as $p) {
                // Esta capa correspondiente a la fila del paciente a actualizar permitira agregar subcapas de estado y el candado a cambiar
                echo "<tr id='cli" . $p->getId() . "'>";

                echo "<td>" . $p->getId() . "</td>";

                echo "<td>" . $p->getNombre() . "</td>";

                echo "<td>" . $p->getApellido() . "</td>";

                echo "<td>" . $p->getCorreo() . "</td>";

                // Capa <div> correspondiente al icono de Estado a cambiar dependiendo el estado del paciente
                echo "<td><div id='est" . $p->getId() . "'>" . (($p->getEstado() == 1) ? "<i class='fas fa-check-circle fa-2x text-success'></i>" : "<i class='fas fa-times-circle fa-2x text-danger'></i>") . "</td>";

                echo "<td>" . (($p->getFoto() != "" && file_exists("img/" . $p->getFoto() . "") && $p->getFoto()) ? "<img src='img/" . $p->getFoto() . "' alt='Imagen de usuario" . $p->getFoto() . "'>" : "<i class='fas fa-user-tie fa-3x'></i>") . "</td>";

                // Se codifica la url del modal para evitar mostrarla y se asegura la url, en la pagina del modal toca decodificar idPaciente para que el servidor lo pueda leer
                if ($p->getId_gen() == 1) {
                    echo "<td> <i class='fas fa-mars fa-2x text-primary'></i> </td>";
                } else if ($p->getId_gen() == 2) {

                    echo "<td><i class='fas fa-venus fa-2x text-primary'> </td>";
                }

                echo "</tr>";
            }
            echo "<tr><td colspan='9'>" . count($clientes) . " registros encontrados</td></tr>"?>

            </tbody>

		</table>

	</div>


</div>

<div class="card">
	<div class="card-header bg-info text-white">
		Grafico Por Genero
		<div class="card-body">
		<div id="generoAgrupar" style="height: 300px;"></div>
		<?php
            $id_porgenero="";
            echo "<script>";
            $json = "[";
    	    for ($i = 0; $i < count($clientePorGenero); $i ++) {
    	        if($clientePorGenero[$i][0]==1){
    	            $id_porgenero = "masculino";
    	        }else if($clientePorGenero[$i][0] == 2){
    	            $id_porgenero = "femenino";
    	        }
    	        $json .= "[\"". $id_porgenero . "\", " . $clientePorGenero[$i][1]."],";
    	    }
    	    $json .= "]";
    	    echo "new Chartkick.PieChart(\"generoAgrupar\", ". $json .",{colors: ['#ec12f0', '#122df0']})";
    	    echo "</script>"; 
	    ?>  
		
		</div>
	</div>
</div>

<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

        
		

