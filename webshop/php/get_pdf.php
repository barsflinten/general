<?php


require('../library/fpdf.php');
$pfad="../diagramme/Gehaltsabrechnung.png";
$var="Gehaltsabrechnung";
$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'this is a PDF');
$pdf-> Image($pfad,10,10,160,160);

$pdf->output();


?>