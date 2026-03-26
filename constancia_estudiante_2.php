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

    if (date("n") == "12") {

        $anio = intval(date("Y")) + 1;

    } else {

        $anio = intval(date("Y"));

    }

    $pdf = new FPDF();

    $pdf->AddPage();

    $ancho_util = $pdf->GetPageWidth() - $pdf->getx() * 2;
    $pdf->Image('imagenes/membrete_2026.png',$pdf->getx(),$pdf->gety() / 2,$ancho_util,0);
    $pdf->Ln(40);    

    $pdf->SetFont('Arial','BU',25);
    $titulo = "CONSTANCIA";
    $pdf->Cell(0,5,utf8_decode($titulo),0,1,"C");

    $pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
    
    $parrafo_1 = "      La Escuela de Ciclo Básico Común, dependiente de la Universidad Nacional del Sur, hace constar que " . $_POST["apellido_nombres"] . " (DNI: ". $_POST["dni"] .") se encuentra " . $situacion_2 . " para cursar el ciclo lectivo ". $anio ." en esta Institución.";
    $pdf->MultiCell(0,5,utf8_decode($parrafo_1),0,"J");

    $pdf->Ln(5);

    $parrafo_2 = "      A solicitud " . $solicitante . " y al solo efecto de ser presentada ante las autoridades que lo requieran, se extiende la presente constancia, en la ciudad de Bahía Blanca, el día " . date("d-m-Y") . ".";
    $pdf->MultiCell(0,5,utf8_decode($parrafo_2),0,"J");

    $pdf->Image('imagenes/firma_secretaria.png',$pdf->GetPageWidth() / 1.7,$pdf->gety(),60,0);

    $pdf->Output();

?>