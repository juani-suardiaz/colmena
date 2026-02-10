<?php

    session_start();

    if (isset($_POST["dni"]) == false) {

        header("Location: buscar_persona.php");

        exit();

    }

?>

<?php

    require('fpdf/fpdf.php');

    require_once("setear_genero.php");

    $pdf = new FPDF();

    $pdf->AddPage();

    $ancho_util = $pdf->GetPageWidth() - $pdf->getx() * 2;
    $pdf->Image('imagenes/membrete_2025.png',$pdf->getx(),$pdf->gety() / 2,$ancho_util,0);
    $pdf->Ln(40);    

    $pdf->SetFont('Arial','BU',25);
    $titulo = "CONSTANCIA";
    $pdf->Cell(0,5,utf8_decode($titulo),0,1,"C");

    $pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
    
    $parrafo_1 = "      La Escuela de Ciclo Básico Común, dependiente de la Universiad Nacional del Sur, hace constar que " . $articulo . " Prof. " . $_POST["apellido_nombres"] . " (DNI: ". $_POST["dni"] .") pertenece al personal docente de esta Institución.";
    $pdf->MultiCell(0,5,utf8_decode($parrafo_1),0,"J");

    $pdf->Ln(5);

    $parrafo_2 = "      A solicitud " . $solicitante . " y al solo efecto de ser presentada ante las autoridades que lo requieran, se extiende la presente constancia, en la ciudad de Bahía Blanca, el día " . date("d-m-Y") . ".";
    $pdf->MultiCell(0,5,utf8_decode($parrafo_2),0,"J");

    $pdf->Output();

?>