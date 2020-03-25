<?php
require_once 'logica/Rutina.php';
require_once 'persistencia/RutinaDAO.php';
require_once 'librerias/fpdf/fpdf.php';
$rutina = new Rutina($_GET["idRutina"]);
$rutina->consultar();
if($rutina->getIdCliente() != $_SESSION["id"]){
    header("Location: 404.php");
    exit();
}?>

<?php
$cliente = new Cliente($rutina->getIdCliente());
$cliente->consultar();
date_default_timezone_set('America/Bogota');
$pdf = new FPDF("L", "cm", "A4");
// cd D:\xampp\htdocs\proyGym\librerias\fpdf\font
//php D:\xampp\htdocs\proyGym\librerias\fpdf\makefont\makefont.php Montserrat-Regular.ttf

class MyPdf extends FPDF{
    function Header() {
        $rutina = new Rutina($_GET["idRutina"]);
        $rutina->consultar();
        $cliente = new Cliente($rutina->getIdCliente());
        $cliente->consultar();
        // 275 in mm
        $this->AddFont('Comfortaa', "", 'Comfortaa-Regular.php');
        $this->SetFont('Comfortaa',"", 16);
        $this->Cell(275, 21, $this->Image("img/icon/logo.jpg", (300-70)/2, $this->y, 70, 21), 0, 1);
        $this->Cell(275,5,"Sistema de Gestion de Gimnasios",0,0,"C");
        $this->Cell(275,5,"SGG",0,0,"C");
        $this->Ln();

        $this->Ln();
        $this->SetTextColor(255, 0, 0);
        $this->Cell(275, 5, "Informe de rutinas para cliente " .  $cliente->getNombre() . " " . $cliente->getApellido(), 0, 0, "C" );
        $this->Ln();
        $this->Ln();
        $this->SetTextColor(0, 0, 0);
        $this->Cell(276, 5, date("d/m/yy") . "  " .  date("g:i A"), 0, 0, "C");
        $this->Ln(20);
    }

    function Footer() {
        $this->SetY(-15);
        $this->Cell(0, 10, $this->PageNo() . '/{nb}', 0, 0, "R");
        $this->AliasNbPages();
    }

    function headerTable() {
        $rutina = new Rutina($_GET["idRutina"]);
        $rutina->consultar();
        $this->Cell(275, 60, $this->MultiCell(275, 5, $rutina->getDescripcion()));

    }

    function viewTable() {

    }


}

$pdf = new MyPdf("L");


$pdf->AddPage();

$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
$pdf->AddPage();
$pdf->Output();
?>

