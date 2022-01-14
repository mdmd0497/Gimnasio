<?php
$cliente = new Cliente($_SESSION["id"]);
$cliente->consultar();

$cliente = new Cliente();
$idcliente = $_SESSION["id"];
$clienteMedidas = $cliente->consultarMedidas($idcliente);
$clienteCuello = $cliente->consultarCuello($idcliente);
$clienteHombros = $cliente->consultarHombros($idcliente);
$clientePecho = $cliente->consultarPecho($idcliente);
$clienteCintura = $cliente->consultarCintura($idcliente);
$clienteAntebrazos = $cliente->consultarAntebrazos($idcliente);
$clienteMuslo = $cliente->consultarMuslo($idcliente);
$clientePantorrillas = $cliente->consultarPantorrillas($idcliente);
$clienteBiceps = $cliente->consultarBiceps($idcliente);
$clienteCadera = $cliente->consultarCadera($idcliente);


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
                if ($clienteMedidas[$i][0] != null && $clienteMedidas[$i][1] != 0) {
                    $IMC = ($clienteMedidas[$i][1] / pow($clienteMedidas[$i][0] / 100, 2));
                }

                $json .= "[\"" . $clienteMedidas[$i][2] . "\", " . $IMC . "],";
            }
            $json .= "]";
            echo "new Chartkick.LineChart(\"Analisis-IMC\", " . $json . ")";
            echo "</script>";
            ?>
            <div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="table-secondary" scope="col">Clasificación</th>
                        <th class="table-secondary" scope="col">IMC</th>
                        <th class="table-secondary" scope="col">Riesgo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="table-success">Normal</th>
                        <td class="table-light">18.5 - 24.9</td>
                        <td class="table-light">Promedio</td>
                    </tr>
                    <tr>
                        <th class="table-warning">Sobrepeso</th>
                        <td class="table-light">25 - 29.9</td>
                        <td class="table-light">Aumentado</td>
                    </tr>
                    <tr>
                        <th class="table-danger">Obesidad Grado I</th>
                        <td class="table-light">30 - 34.9</td>
                        <td class="table-light">Moderado</td>
                    </tr>
                    <tr>
                        <th class="table-danger">Obesidad Grado II</th>
                        <td class="table-light">35 - 39.9</td>
                        <td class="table-light">Severo</td>
                    </tr>
                    <tr>
                        <th class="table-danger">Obesidad Grado III</th>
                        <td class="table-light">Más de 40</td>
                        <td class="table-light">Muy Severo</td>
                    </tr>
                    </tbody>
                </table>
                <p>Fuente: OMS (Organización Mundial de la Salud)</p>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Cuello
        <div class="card-body">
            <div id="Analisis-cuello" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteCuello); $i++) {
                $json .= "[\"" . $clienteCuello[$i][1] . "\", " . $clienteCuello[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-cuello\", " . $json . ",{colors: ['#dc631e', '#a61edc']})"; //a61edc

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Hombros
        <div class="card-body">
            <div id="Analisis-hombros" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteHombros); $i++) {
                $json .= "[\"" . $clienteHombros[$i][1] . "\", " . $clienteHombros[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-hombros\", " . $json . ",{colors: ['#d01313', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Pecho
        <div class="card-body">
            <div id="Analisis-pecho" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clientePecho); $i++) {
                $json .= "[\"" . $clientePecho[$i][1] . "\", " . $clientePecho[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-pecho\", " . $json . ",{colors: ['#3af215', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Cintura
        <div class="card-body">
            <div id="Analisis-cintura" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteCintura); $i++) {
                $json .= "[\"" . $clienteCintura[$i][1] . "\", " . $clienteCintura[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-cintura\", " . $json . ",{colors: ['#12d9df', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Antebrazos
        <div class="card-body">
            <div id="Analisis-antebrazos" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteAntebrazos); $i++) {
                $json .= "[\"" . $clienteAntebrazos[$i][1] . "\", " . $clienteAntebrazos[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-antebrazos\", " . $json . ",{colors: ['#1e12df', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Muslos
        <div class="card-body">
            <div id="Analisis-muslo" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteMuslo); $i++) {
                $json .= "[\"" . $clienteMuslo[$i][1] . "\", " . $clienteMuslo[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-muslo\", " . $json . ",{colors: ['#cb0ddb', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Pantorrillas
        <div class="card-body">
            <div id="Analisis-pantorrillas" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clientePantorrillas); $i++) {
                $json .= "[\"" . $clientePantorrillas[$i][1] . "\", " . $clientePantorrillas[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-pantorrillas\", " . $json . ",{colors: ['#432c99', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Biceps
        <div class="card-body">
            <div id="Analisis-biceps" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteBiceps); $i++) {
                $json .= "[\"" . $clienteBiceps[$i][1] . "\", " . $clienteBiceps[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-biceps\", " . $json . ",{colors: ['#5acf63', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-info text-white">
        Grafico De Progreso Medidas Cadera
        <div class="card-body">
            <div id="Analisis-cadera" style="height: 300px;"></div>
            <?php
            echo "<script>";
            $json = "[";
            for ($i = 0; $i < count($clienteCadera); $i++) {
                $json .= "[\"" . $clienteCadera[$i][1] . "\", " . $clienteCadera[$i][0] . "],";
            }
            $json .= "]";
            echo "new Chartkick.AreaChart(\"Analisis-cadera\", " . $json . ",{colors: ['#2b8bdc', '#a61edc']})";

            echo "</script>";
            ?>

        </div>
    </div>
</div>