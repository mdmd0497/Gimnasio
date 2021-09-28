<?php
$cliente = new Cliente($_SESSION["id"]);
$cliente->consultar();

$cliente = new Cliente();
$idcliente = $_SESSION["id"];
$clienteMedidas = $cliente->consultarMedidas($idcliente);

?>

<header>
    <?php
    include 'navcliente.php';
    ?>
</header>


<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso IMC
        <div class="card-body">
            <div id="Analisis-IMC" style="height: 300px;"></div>
            <?php
            $IMC = 0;
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteMedidas); $i++) {
                if($clienteMedidas[$i][0] != null && $clienteMedidas[$i][1] != 0 ){
                    $IMC = ($clienteMedidas[$i][1]/pow($clienteMedidas[$i][0]/100, 2));
                }
                
                $json .= "[\"" . $clienteMedidas[$i][2] . "\", " .  $IMC . "],";
            }
            $json .= "]";
            echo "new Chartkick.LineChart(\"Analisis-IMC\", " . $json . ")";
            echo "</script>";
            ?>

        </div>
    </div>
</div>