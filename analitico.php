<?php

    if (isset($_POST["dni_2"]) == false) {

        header("Location: buscar_persona.php");

        exit();

    }

    //------

    // establecemos la conexión
    
    require_once ("conexion.php");    

    // SQL

    // DATOS PERSONALES

    $dni = $_POST["dni_2"];

    $instruccion = "SELECT * " .
                    "FROM persona " .
                    //"WHERE dni = " . $_POST["id_persona"] . " ";
                    "WHERE dni = " . $dni . ";";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    if ($registro) {

        $persona["dni"] = $registro["DNI"];
        $persona["apellido"] = $registro["APELLIDO"];
        $persona["nombre"] = $registro["NOMBRE"];
        $persona["fecha_nacimiento"] = $registro["FECHA_NAC"];
        $persona["nacimiento"] = $registro["SEXO"]==0?"nacida":"nacido";
        $persona["articulo"] = $registro["SEXO"]==0?"La alumna":"El alumno";

    } else {

        $persona["dni"] = "XXX";
        $persona["apellido"] = "XXX";
        $persona["nombre"] = "XXX";
        $persona["fecha_nacimiento"] = "XXX";
        $persona["nacimiento"] = "nacido";
        $persona["articulo"] = "El alumno";    

    }

    // DATOS SOBRE EL ANALÍTICO

    $analitico["lugar_nacimiento"] = $_POST["lugar_nacimiento"] == ""? "Bahía Blanca": $_POST["lugar_nacimiento"];
    $analitico["escuela_procedencia"] = $_POST["escuela_procedencia"] == ""? "Escuela de Enseñanza Inicial y Primaria UNS de la ciudad de Bahía Blanca": $_POST["escuela_procedencia"];
    $analitico["escuela_destino"] = $_POST["escuela_destino"] == ""? "quien corresponda": "las autoridades educativas de " . $_POST["escuela_destino"];
    $analitico["fecha_inicio"] = $_POST["fecha_inicio"];
    $analitico["fecha_fin"] = $_POST["fecha_fin"];
    $analitico["fecha_presentacion"] = $_POST["fecha_presentacion"] == ""? date("d") . " días del mes de " . nombre_mes(date("m")) . " de " . date("Y"): 
                                                                           date("d", strtotime($_POST["fecha_presentacion"])) . " días del mes de " . nombre_mes(date("m", strtotime($_POST["fecha_presentacion"]))) . " de " . date("Y", strtotime($_POST["fecha_presentacion"]));

    // CALIFICACIONES

    $instruccion = "SELECT * FROM notas_finales WHERE dni = {$dni} AND estado = 1 AND nota_num <> 0 ORDER BY INDICE;";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $materia = [];

    while ($registro) {

        $materia['"'. $registro["INDICE"] . '_nota_numero"'] = $registro["NOTA_NUM"];
        //$materia['"'. $registro["INDICE"] . '_nota_letra"'] = $registro["NOTA_NUM"];
        $materia['"'. $registro["INDICE"] . '_fecha"'] = $registro["FECHA"];
        $materia['"'. $registro["INDICE"] . '_condicion"'] = $registro["CONDICION"];
        $materia['"'. $registro["INDICE"] . '_materia"'] = $registro["MATERIA"];

        $registro = mysqli_fetch_assoc($resultado);

    }

    //------

    $final_cursada = resultado_cursada($materia);

    //------

    require('fpdf/fpdf.php');

    // class MyFPDF extends FPDF {
    //     function SetCellMargin($margin) {
    //         $this->cMargin = $margin;
    //     }

    //     function GetCellMargin() {
    //         return $this->cMargin;
    //     }

    // }

    $pdf = new FPDF();

    $pdf->AddPage("p","Legal");

    $margen = 25;
    $ancho_pagina = $pdf->GetPageWidth();
    $ancho_utilizable = $ancho_pagina - $margen * 2;

    //$pdf->SetCellMargin(0.5);

    $pdf->SetLeftMargin($margen);
    $pdf->SetRightMargin($margen);

    // --- PRIMERA PÁGINA ---    

    // MARCA DE AGUA

    $pdf->Image('imagenes/logo_uns.png',$pdf->getx(),$pdf->GetPageHeight() / 4,$ancho_utilizable,0);

    // MEMBRETE

    $pdf->Image('imagenes/membrete_2026.png',$pdf->getx(),$pdf->gety() / 2,$ancho_utilizable,0);

    $pdf->Ln(30);

    // TÍTULO PRINCIPAL

    $pdf->SetFont('Arial', 'B', 12);    

    $pdf->Cell($ancho_utilizable,5,utf8_decode("CERTIFICADO ANALÍTICO PARCIAL"),0,null,"C");
    $pdf->Ln(10);

    // PRIMER PÁRRAFO

    $pdf->SetFont('Arial', null, 10);

    $parrafo = "    La Dirección de la Escuela de Ciclo Básico Común dependiente del Consejo de Enseñanza Media y Superior".
                " de la Universidad Nacional del Sur, C.U.E. N° 0622268-00, ubicada en calle 11 de Abril 445 de la ciudad de Bahía Blanca ".
                "- Provincia de Buenos Aires - certifica que {$persona['nombre']} {$persona['apellido']}, {$persona['nacimiento']} en ". $analitico["lugar_nacimiento"] .
                ", el día " . date("d", strtotime($persona["fecha_nacimiento"])) . " de " . nombre_mes(date("m", strtotime($persona["fecha_nacimiento"]))) . " de " . date("Y", strtotime($persona["fecha_nacimiento"])) . ", D.N.I. N° {$persona['dni']}, aprobó los espacios curriculares que con sus respectivas".
                " calificaciones a continuación se detallan:";
    
    $pdf->MultiCell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();

    // PRIMER AÑO

    // fila año

    $pdf->SetFont('Arial', 'B', 8);

    $pdf->Cell($ancho_utilizable,5,utf8_decode("Primer año"),1,null,"C");
    $pdf->Ln();

    // fila títulos

    $pdf->SetFont('Arial', 'B', 6);    

    $pdf->Cell($ancho_utilizable / 2,5,"ESPACIOS CURRICULARES",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CALIFICACIÓN"),1,null,"C");
    $pdf->Cell(20,5,"FECHA",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CONDICIÓN"),1,null,"C");
    $pdf->Cell(22.95,5,"ESTABLECIMIENTO",1,null,"C");
    
    $pdf->Ln();

    // renglones

    $pdf->SetFont('Arial',null, 6);

    for ($renglon = 1; $renglon <= 11; $renglon ++) {

        switch ($renglon) {

            case 1:
                $nombre_materia = "ARTES PLÁSTICAS";
                break;
            case 2:
                $nombre_materia = "CIENCIAS NATURALES";
                break;
            case 3:
                $nombre_materia = "CIENCIAS SOCIALES";
                break;
            case 4:
                $nombre_materia = "CULTURA MUSICAL";
                break;
            case 5:
                $nombre_materia = "EDUCACIÓN FÍSICA";
                break;
            case 6:
                $nombre_materia = "ESTRATEGIAS DE APRENDIZAJE";
                break;
            case 7:
                $nombre_materia = "INFORMÁTICA";
                break;
            case 8:
                $nombre_materia = "INGLÉS";
                break;
            case 9:
                $nombre_materia = "LENGUA Y LITERATURA";
                break;
            case 10:
                $nombre_materia = "MATEMÁTICA";
                break;
            case 11:
                $nombre_materia = "RELACIONES HUMANAS";
                break;                                                                                                                                                
        }

        $pdf->Cell($ancho_utilizable / 2,5,utf8_decode($nombre_materia),1);
        $pdf->Cell(10,5, isset($materia['"1_'. $renglon . '_nota_numero"'])? $materia['"1_'. $renglon . '_nota_numero"']:"" ,1,null,"C");
        $pdf->Cell(10,5, isset($materia['"1_'. $renglon . '_nota_numero"'])? numero_a_letra($materia['"1_'. $renglon . '_nota_numero"']):"" ,1,null,"C");
        $pdf->Cell(20,5, isset($materia['"1_'. $renglon . '_fecha"'])? date('d/m/Y', strtotime($materia['"1_'. $renglon . '_fecha"'])):"" ,1,null,"C");

        if ($final_cursada["desaprobado_1"]) {

            $pdf->Cell(20,5,"",1,null,"C");

        } else {

            $pdf->Cell(20,5, isset($materia['"1_'. $renglon . '_condicion"'])? $materia['"1_'. $renglon . '_condicion"']:"ADEUDA" ,1,null,"C");

        }
        
        $pdf->Cell(22.95,5, isset($materia['"1_'. $renglon . '_nota_numero"'])? "ECBC":"", 1,null,"C");
        $pdf->Ln();

    }

    // fila promedio

    $pdf->Cell($ancho_utilizable / 2,5,"PROMEDIO ANUAL",1);

    if ($final_cursada["desaprobado_1"]) {

        $pdf->Cell(10,5,"",1,null,"C");

    } else {

        $pdf->Cell(10,5,$final_cursada["promedio_1"]==0?"---":floor($final_cursada["promedio_1"] * 100) / 100,1,null,"C");

    }

    if ($final_cursada["desaprobado_1"]) {

        $pdf->Cell(72.95,5,"",1,null,"I");

    } else {

        $pdf->Cell(72.95,5,$final_cursada["promedio_1"]==0?"---":promedio_a_letra($final_cursada["promedio_1"]),1,null,"I");

    }

    $pdf->Ln();
    $pdf->Ln();

    // línea curso no aprobado

    if ($final_cursada["desaprobado_1"]) {

        $pdf->Image('imagenes/linea_1ro.png',$pdf->getx(), 320 / 4,$ancho_utilizable,0);

    }    

    // SEGUNDO AÑO

    // fila año

    $pdf->SetFont('Arial', 'B', 8);

    $pdf->Cell($ancho_utilizable,5,utf8_decode("Segundo año"),1,null,"C");
    $pdf->Ln();

    // fila títulos

    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell($ancho_utilizable / 2,5,"ESPACIOS CURRICULARES",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CALIFICACIÓN"),1,null,"C");
    $pdf->Cell(20,5,"FECHA",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CONDICIÓN"),1,null,"C");
    $pdf->Cell(22.95,5,"ESTABLECIMIENTO",1,null,"C");
    
    $pdf->Ln();

    // renglones

    $pdf->SetFont('Arial',null, 6);    

    for ($renglon = 1; $renglon <= 12; $renglon ++) {

        switch ($renglon) {

            case 1:
                $nombre_materia = "ARTES PLÁSTICAS";
                break;
            case 2:
                $nombre_materia = "CIENCIAS NATURALES";
                break;
            case 3:
                $nombre_materia = "CIENCIAS SOCIALES";
                break;
            case 4:
                $nombre_materia = "CULTURA MUSICAL";
                break;
            case 5:
                $nombre_materia = "EDUCACIÓN FÍSICA";
                break;
            case 6:
                $nombre_materia = "ESTRATEGIAS DE APRENDIZAJE";
                break;
            case 7:
                $nombre_materia = "INFORMÁTICA";
                break;
            case 8:
                $nombre_materia = "INGLÉS";
                break;
            case 9:
                $nombre_materia = "LENGUA Y LITERATURA";
                break;
            case 10:
                $nombre_materia = "MATEMÁTICA";
                break;
            case 11:
                $nombre_materia = "RELACIONES HUMANAS";
                break;
            case 12:
                $nombre_materia = "TALLER OPTATIVO";
                break;                
        }

        $pdf->Cell($ancho_utilizable / 2,5,utf8_decode($nombre_materia),1);
        $pdf->Cell(10,5, isset($materia['"2_'. $renglon . '_nota_numero"'])? $materia['"2_'. $renglon . '_nota_numero"']:"" ,1,null,"C");
        $pdf->Cell(10,5, isset($materia['"2_'. $renglon . '_nota_numero"'])? numero_a_letra($materia['"2_'. $renglon . '_nota_numero"']):"" ,1,null,"C");
        $pdf->Cell(20,5, isset($materia['"2_'. $renglon . '_fecha"'])? date('d/m/Y', strtotime($materia['"2_'. $renglon . '_fecha"'])):"" ,1,null,"C");

        if ($final_cursada["desaprobado_2"]) {

            $pdf->Cell(20,5,"",1,null,"C");

        } else {

            $pdf->Cell(20,5, isset($materia['"2_'. $renglon . '_condicion"'])? $materia['"2_'. $renglon . '_condicion"']:"ADEUDA" ,1,null,"C");

        }
        
        $pdf->Cell(22.95,5, isset($materia['"2_'. $renglon . '_nota_numero"'])? "ECBC":"" ,1,null,"C");
        $pdf->Ln();

    }

    // fila promedio

    $pdf->Cell($ancho_utilizable / 2,5,"PROMEDIO ANUAL",1);

    if ($final_cursada["desaprobado_2"]) {

        $pdf->Cell(10,5,"",1,null,"C");

    } else {

        $pdf->Cell(10,5,$final_cursada["promedio_2"]==0?"---":floor($final_cursada["promedio_2"] * 100) / 100,1,null,"C");

    }

    if ($final_cursada["desaprobado_2"]) {

        $pdf->Cell(72.95,5,"",1,null,"I");

    } else {

        $pdf->Cell(72.95,5,$final_cursada["promedio_2"]==0?"---":promedio_a_letra($final_cursada["promedio_2"]),1,null,"I");

    }

    $pdf->Ln();
    $pdf->Ln();

    // línea curso no aprobado

    if ($final_cursada["desaprobado_2"]) {

        $pdf->Image('imagenes/linea_2do.png',$pdf->getx(), 620 / 4,$ancho_utilizable,0);

    }

    // TERCER AÑO

    // fila año

        $pdf->SetFont('Arial', 'B', 8);

    $pdf->Cell($ancho_utilizable,5,utf8_decode("Tercer año"),1,null,"C");
    $pdf->Ln();

    // fila títulos

    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell($ancho_utilizable / 2,5,"ESPACIOS CURRICULARES",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CALIFICACIÓN"),1,null,"C");
    $pdf->Cell(20,5,"FECHA",1,null,"C");
    $pdf->Cell(20,5,utf8_decode("CONDICIÓN"),1,null,"C");
    $pdf->Cell(22.95,5,"ESTABLECIMIENTO",1,null,"C");
    
    $pdf->Ln();

    // renglones

    $pdf->SetFont('Arial',null, 6);    

    for ($renglon = 1; $renglon <= 13; $renglon ++) {

        switch ($renglon) {

            case 1:
                $nombre_materia = "ARTES PLÁSTICAS";
                break;
            case 2:
                $nombre_materia = "BIOLOGÍA";
                break;
            case 3:
                $nombre_materia = "CULTURA MUSICAL";
                break;
            case 4:
                $nombre_materia = "EDUCACIÓN FÍSICA";
                break;
            case 5:
                $nombre_materia = "GEOGRAFÍA ARGENTINA";
                break;
            case 6:
                $nombre_materia = "HISTORIA ARGENTINA";
                break;
            case 7:
                $nombre_materia = "INFORMÁTICA";
                break;
            case 8:
                $nombre_materia = "INGLÉS";
                break;
            case 9:
                $nombre_materia = "INTRODUCCIÓN A LAS ACTIVIDADES COMERCIALES";
                break;
            case 10:
                $nombre_materia = "LENGUA Y LITERATURA";
                break;
            case 11:
                $nombre_materia = "MATEMÁTICA";
                break;
            case 12:
                $nombre_materia = "QUÍMICA";
                break;
            case 13:
                $nombre_materia = "RELACIONES HUMANAS";
                break;                
        }

        $pdf->Cell($ancho_utilizable / 2,5,utf8_decode($nombre_materia),1);
        $pdf->Cell(10,5, isset($materia['"3_'. $renglon . '_nota_numero"'])? $materia['"3_'. $renglon . '_nota_numero"']:"" ,1,null,"C");
        $pdf->Cell(10,5, isset($materia['"3_'. $renglon . '_nota_numero"'])? numero_a_letra($materia['"3_'. $renglon . '_nota_numero"']):"" ,1,null,"C");
        $pdf->Cell(20,5, isset($materia['"3_'. $renglon . '_fecha"'])? date('d/m/Y', strtotime($materia['"3_'. $renglon . '_fecha"'])):"" ,1,null,"C");

        if ($final_cursada["desaprobado_3"]) {

            $pdf->Cell(20,5,"",1,null,"C");

        } else {

            $pdf->Cell(20,5, isset($materia['"3_'. $renglon . '_condicion"'])? $materia['"3_'. $renglon . '_condicion"']:"ADEUDA" ,1,null,"C");

        }
        
        $pdf->Cell(22.95,5, isset($materia['"3_'. $renglon . '_nota_numero"'])? "ECBC":"" ,1,null,"C");
        $pdf->Ln();

    }

    // fila promedio

    $pdf->Cell($ancho_utilizable / 2,5,"PROMEDIO ANUAL",1);

    if ($final_cursada["desaprobado_3"]) {

        $pdf->Cell(10,5,"",1,null,"C");

    } else {

        $pdf->Cell(10,5,$final_cursada["promedio_3"]==0?"---":floor($final_cursada["promedio_3"] * 100) / 100,1,null,"C");

    }

    if ($final_cursada["desaprobado_3"]) {

        $pdf->Cell(72.95,5,"",1,null,"I");

    } else {

        $pdf->Cell(72.95,5,$final_cursada["promedio_3"]==0?"---":promedio_a_letra($final_cursada["promedio_3"]),1,null,"I");

    }    

    $pdf->Ln();
    $pdf->Ln();

    // línea curso no aprobado

    if ($final_cursada["desaprobado_3"]) {

        $pdf->Image('imagenes/linea_3ro.png',$pdf->getx(), 940 / 4,$ancho_utilizable,0);

    }

    //$pdf->Cell($ancho_utilizable / 10,5,$ancho_utilizable,1);

    // --- SEGUNDA PÁGINA ---

    $pdf->AddPage("p","Legal");

    // MARCA DE AGUA

    $pdf->Image('imagenes/logo_uns.png',$pdf->getx(),$pdf->GetPageHeight() / 4,$ancho_utilizable,0);

    // MEMBRETE

    $pdf->Image('imagenes/membrete_2026.png',$pdf->getx(),$pdf->gety() / 2,$ancho_utilizable,0);

    $pdf->Ln(30);

    // PÁRRAFO PROMEDIO GENERAL

    $pdf->SetFont('Arial', null, 10);

    //$final_cursada = resultado_cursada($materia);

    $parrafo = "PROMEDIO GENERAL DEL CICLO BÁSICO: ";

    if ($final_cursada["promedio_total"] <> 0) {

        $parrafo .= floor($final_cursada["promedio_total"] * 100) / 100 . " (" . promedio_a_letra($final_cursada["promedio_total"]) .")";

    }
    
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();
    $pdf->Ln();

    // PÁRRAFO OBSERVACIONES

    $parrafo = "OBSERVACIONES: {$persona['articulo']} ingresó con certificado de estudios de Nivel Primario completo," . 
                " extendido por la ". $analitico["escuela_procedencia"] . ".";
    
    $pdf->MultiCell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();

    // PÁRRAFO APROBACIÓN

    $parrafo = "    {$persona['articulo']} {$persona['nombre']} {$persona['apellido']}, con tipo de documento D.N.I. Nº {$persona['dni']}" . 
                "{$final_cursada['texto_aprobado']}" . 
                "{$final_cursada["conector_parrafo"]} finalizar la Educación Secundaria debe aprobar {$final_cursada['texto_desaprobado']} 4º, 5º y 6º año del ciclo orientado.";
    
    $pdf->MultiCell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();

    // PÁRRAFO PLAN DE ESTUDIOS

    $parrafo = "PLAN DE ESTUDIOS aprobado por Resolución Consejo Superior Universitario N° 427/2019.";    
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();

    $parrafo = "VALIDEZ NACIONAL otorgada por: en trámite en el Ministerio de Educación de la Nación.";    
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();
    $pdf->Ln();

    // PÁRRAFO FECHA

    $parrafo = "FECHA DE INGRESO: " . date("d", strtotime($analitico["fecha_inicio"])) . " de " . nombre_mes(date("m", strtotime($analitico["fecha_inicio"]))) . " de " . date("Y", strtotime($analitico["fecha_inicio"]));
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();

    $parrafo = "FECHA DE TRASLADO: " . date("d", strtotime($analitico["fecha_fin"])) . " de " . nombre_mes(date("m", strtotime($analitico["fecha_fin"]))) . " de " . date("Y", strtotime($analitico["fecha_fin"]));
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln();
    $pdf->Ln();

    // ÚLTIMO PÁRRAFO

    $parrafo = "    Se extiende el presente CERTIFICADO ANALÍTICO PARCIAL sin raspaduras, ni enmiendas, en la ciudad de Bahía Blanca," . 
                " Provincia de Buenos Aires, República Argentina, a los " . $analitico["fecha_presentacion"] . 
                ", para presentar ante " . $analitico["escuela_destino"] . ".";
    
    $pdf->MultiCell($ancho_utilizable,5,utf8_decode($parrafo));
    $pdf->Ln(40);

    // FIRMA DIRECTORA

    $pdf->Cell($ancho_utilizable / 2,5,"",0,null,"C");
    $pdf->Cell($ancho_utilizable / 2,5,"....................................................",0,null,"C");
    $pdf->Ln();
    $pdf->Cell($ancho_utilizable / 2,5,"",0,null,"C");
    $pdf->Cell($ancho_utilizable / 2,5,"Directora",0,null,"C");

    $pdf->Ln(50);

    $parrafo = "CERTIFICO que la firma que antecede es auténtica.-----------------------------------------------------------------------";    
    $pdf->Cell($ancho_utilizable,5,utf8_decode($parrafo));

    // Se imprime el archivo PDF

    $pdf->Output(null, $persona["apellido"] . ", " . $persona["nombre"] . " (" . $persona["dni"] . ") - analítico parcial", true);

    // cerramos la conexión

    require_once("desconexion.php");

    // FUNCIÓN PARA OBTENER EL NOMBRE DEL MES

    function nombre_mes ($num_mes) {

        switch ($num_mes) {
            
            case 1:
                return "enero";
            case 2:
                return "febrero";
            case 3:
                return "marzo";
            case 4:
                return "abril";
            case 5:
                return "mayo";
            case 6:
                return "junio";
            case 7:
                return "julio";
            case 8:
                return "agosto";
            case 9:
                return "septiembre";
            case 10:
                return "octubre";
            case 11:
                return "noviembre";                                                                                                                
            case 12:
                return "diciembre";

        }

    }
    
    // FUNCIÓN PARA CONVERTIR LAS NOTAS NÚMERICAS EN LETRAS

    function numero_a_letra ($numero) {

        switch ($numero) {

            case 1:
                return "uno";
            case 2:
                return "dos";
            case 3:
                return "tres";
            case 4:
                return "cuatro";
            case 5:
                return "cinco";
            case 6:
                return "seis";
            case 7:
                return "siete";
            case 8:
                return "ocho";
            case 9:
                return "nueve";
            case 10:
                return "diez";                

        }

    }

    // FUNCIÓN PARA CONVERTIR EL PROMEDIO EN FORMATO "entero con ##/100"

    function promedio_a_letra ($promedio) {

        // averiguo si el parámetro pasado no es una cadena vavía

        if ($promedio == "") {

            // es una cadena vaciía

            return "";

        } else {

            // no es una cadena vacía

            // extraigo la parte entera

            $parte_entera = (int)$promedio;

            // extraigo la parte decimal

            $parte_decimal = floor($promedio * 100) / 100 - $parte_entera;

            // averiguo si hay parte decimal

            if ($parte_decimal > 0) {

                // hay parte decimal

                // convertimos la parte decimal a entero

                $parte_decimal = $parte_decimal * 100;

                // si la parte decimal es menor a diez, se le agrega un cero adelante

                if ($parte_decimal < 10) {

                    $parte_decimal = "0" . $parte_decimal;

                }

                // llamo a la función numero_a_letra definida arriba

                return numero_a_letra($parte_entera) . " con " . $parte_decimal . "/100";

            } else {

                // no hay parte decimal

                // llamo a la función numero_a_letra definida arriba

                return numero_a_letra($parte_entera);

            }

        }

    }

    // FUNCIÓN PARA AVERIGUAR LOS AÑOS APROBADOS

    function resultado_cursada (&$arreglo_materia) {

        $promedio_general = 0;
    
        // PRIMER AÑO

        $cant_aprobadas_1ro = 0;
        $cant_desaprobadas_1ro = 0;
        $aprobado_1ro = false;
        $desaprobado_1ro = false;
        $materias_desap_1ro = [];
        $promedio_1ro = 0;

        for ($i = 1; $i <= 11; $i++) {

            if (isset($arreglo_materia['"1_' . $i . '_nota_numero"']) == false) {

                $cant_desaprobadas_1ro ++;

                switch ($i) {

                    case 1:
                        $materias_desap_1ro[] = "ARTES PLÁSTICAS (1º), ";
                        break;
                    case 2:
                        $materias_desap_1ro[] = "CIENCIAS SOCIALES (1º), ";
                        break;
                    case 3:
                        $materias_desap_1ro[] = "CIENCIAS NATURALES (1º), ";
                        break;
                    case 4:
                        $materias_desap_1ro[] = "CULTURA MUSICAL (1º), ";
                        break;
                    case 5:
                        $materias_desap_1ro[] = "EDUCACIÓN FÍSICA (1º), ";
                        break;
                    case 6:
                        $materias_desap_1ro[] = "ESTRATEGIAS DE APRENDIZAJE (1º), ";
                        break;
                    case 7:
                        $materias_desap_1ro[] = "INFORMÁTICA (1º), ";
                        break;
                    case 8:
                        $materias_desap_1ro[] = "INGLÉS (1º), ";
                        break;
                    case 9:
                        $materias_desap_1ro[] = "LENGUA Y LITERATURA (1º), ";
                        break;
                    case 10:
                        $materias_desap_1ro[] = "MATEMÁTICA (1º), ";
                        break;
                    case 11:
                        $materias_desap_1ro[] = "RELACIONES HUMANAS (1º), ";
                        break;

                }

            } else {

                $cant_aprobadas_1ro ++;

                $promedio_1ro = $promedio_1ro + $arreglo_materia['"1_' . $i . '_nota_numero"'];

                $promedio_general = $promedio_general + $arreglo_materia['"1_' . $i . '_nota_numero"'];

            }

        }

        if ($cant_aprobadas_1ro == 11) {

            $aprobado_1ro = true;

            $promedio_1ro = $promedio_1ro / 11;

        } else {

            $promedio_1ro = 0;

        }

        if ($cant_desaprobadas_1ro == 11) {

            $desaprobado_1ro = true;

        }

        // SEGUNDO AÑO

        $cant_aprobadas_2do = 0;
        $cant_desaprobadas_2do = 0;
        $aprobado_2do = false;
        $desaprobado_2do = false;
        $materias_desap_2do = [];
        $promedio_2do = 0;

        for ($i = 1; $i <= 12; $i++) {

            if (isset($arreglo_materia['"2_' . $i . '_nota_numero"']) == false) {

                $cant_desaprobadas_2do ++;

                switch ($i) {

                    case 1:
                        $materias_desap_2do[] = "ARTES PLÁSTICAS (2º), ";
                        break;
                    case 2:
                        $materias_desap_2do[] = "CIENCIAS SOCIALES (2º), ";
                        break;
                    case 3:
                        $materias_desap_2do[] = "CIENCIAS NATURALES (2º), ";
                        break;
                    case 4:
                        $materias_desap_2do[] = "CULTURA MUSICAL (2º), ";
                        break;
                    case 5:
                        $materias_desap_2do[] = "EDUCACIÓN FÍSICA (2º), ";
                        break;
                    case 6:
                        $materias_desap_2do[] = "ESTRATEGIAS DE APRENDIZAJE (2º), ";
                        break;
                    case 7:
                        $materias_desap_2do[] = "INFORMÁTICA (2º), ";
                        break;
                    case 8:
                        $materias_desap_2do[] = "INGLÉS (2º), ";
                        break;
                    case 9:
                        $materias_desap_2do[] = "LENGUA Y LITERATURA (2º), ";
                        break;
                    case 10:
                        $materias_desap_2do[] = "MATEMÁTICA (2º), ";
                        break;
                    case 11:
                        $materias_desap_2do[] = "RELACIONES HUMANAS (2º), ";
                        break;
                    case 12:
                        $materias_desap_2do[] = "TALLER OPTATIVO (2º), ";
                        break;

                }

            } else {

                $cant_aprobadas_2do ++;

                $promedio_2do = $promedio_2do + $arreglo_materia['"2_' . $i . '_nota_numero"'];

                $promedio_general = $promedio_general + $arreglo_materia['"2_' . $i . '_nota_numero"'];

            }

        }

        if ($cant_aprobadas_2do == 12) {

            $aprobado_2do = true;

            $promedio_2do = $promedio_2do / 12;            

        } else {

            $promedio_2do = 0;

        }

        if ($cant_desaprobadas_2do == 12) {

            $desaprobado_2do = true;

        }

        // TERCER AÑO

        $cant_aprobadas_3ro = 0;
        $cant_desaprobadas_3ro = 0;
        $aprobado_3ro = false;
        $desaprobado_3ro = false;
        $materias_desap_3ro = [];
        $promedio_3ro = 0;

        for ($i = 1; $i <= 13; $i++) {

            if (isset($arreglo_materia['"3_' . $i . '_nota_numero"']) == false) {

                $cant_desaprobadas_3ro ++;

                switch ($i) {

                    case 1:
                        $materias_desap_3ro[] = "ARTES PLÁSTICAS (3º), ";
                        break;
                    case 2:
                        $materias_desap_3ro[] = "BIOLOGÍA (3º), ";
                        break;
                    case 3:
                        $materias_desap_3ro[] = "CULTURA MUSCIAL (3º), ";
                        break;
                    case 4:
                        $materias_desap_3ro[] = "EDUCACIÓN FÍSICA (3º), ";
                        break;
                    case 5:
                        $materias_desap_3ro[] = "GEOGRAFÍA ARGENTINA (3º), ";
                        break;
                    case 6:
                        $materias_desap_3ro[] = "HISTORIA ARGENTINA (3º), ";
                        break;                        
                    case 7:
                        $materias_desap_3ro[] = "INFORMÁTICA (3º), ";
                        break;
                    case 8:
                        $materias_desap_3ro[] = "INGLÉS (3º), ";
                        break;
                    case 9:
                        $materias_desap_3ro[] = "INTRODUCCIÓN A LAS ACTIVIDADES COMERCIALES (3º), ";
                        break;
                    case 10:
                        $materias_desap_3ro[] = "LENGUA Y LITERATURA (3º), ";
                        break;
                    case 11:
                        $materias_desap_3ro[] = "MATEMÁTICA (3º), ";
                        break;
                    case 12:
                        $materias_desap_3ro[] = "QUÍMICA (3º), ";
                        break;
                    case 13:
                        $materias_desap_3ro[] = "RELACIONES HUMANAS (3º), ";
                        break;

                }                

            } else {

                $cant_aprobadas_3ro ++;

                $promedio_3ro = $promedio_3ro + $arreglo_materia['"3_' . $i . '_nota_numero"'];

                $promedio_general = $promedio_general + $arreglo_materia['"3_' . $i . '_nota_numero"'];

            }

        }

        if ($cant_aprobadas_3ro == 13) {

            $aprobado_3ro = true;

            $promedio_3ro = $promedio_3ro / 13;            

        } else {

            $promedio_3ro = 0;

        }

        if ($cant_desaprobadas_3ro == 13) {

            $desaprobado_3ro = true;

        }

        // PROMEDIO GENERAL

        if ($aprobado_1ro && $aprobado_2do && $aprobado_3ro) {

            $promedio_general = $promedio_general / 36;

        } else {

            $promedio_general = 0;

        }

        //----------------------------------------------

        // TEXTO APROBADO y DESAPROBADO

        if ($aprobado_1ro && $aprobado_2do && $aprobado_3ro) {

            $texto_aprobado = ", aprobó los TRES años del CICLO BÁSICO de la Educación Secundaria, según Ley de Educación N° 26.206.";

            $conector_parrafo = " Para";
        
            $texto_desaprobado = "";

        } else {

            if ($desaprobado_1ro && $desaprobado_2do && $desaprobado_3ro) {

                $texto_aprobado = "";

                $conector_parrafo = ", para";

                $texto_desaprobado = "los TRES años del CICLO BÁSICO, ";

            } else {

                // TEXTO APROBADO

                $anios_aprobados = [];

                $texto_aprobado = ", aprobó ";

                if ($aprobado_1ro) {

                    $anios_aprobados[] = "PRIMER, ";

                }

                if ($aprobado_2do) {

                    $anios_aprobados[] = "SEGUNDO, ";

                }

                if ($aprobado_3ro) {

                    $anios_aprobados[] = "TERCER, ";

                }

                $cant_anios_aprobados = count($anios_aprobados);

                if ($cant_anios_aprobados > 0) {

                    for ($i = 1; $i <= $cant_anios_aprobados; $i++) {

                        if ($i == $cant_anios_aprobados && $i > 1) {

                            $texto_aprobado = substr($texto_aprobado, 0, strlen($texto_aprobado) - 2) . " y ";

                        }

                        $texto_aprobado .= $anios_aprobados[$i - 1];

                    }

                    $texto_aprobado = substr($texto_aprobado, 0, strlen($texto_aprobado) - 2) . " año del CICLO BÁSICO de la Educación Secundaria, según Ley de Educación N° 26.206.";

                    $conector_parrafo = " Para";

                } else {

                    $texto_aprobado = "";

                    $conector_parrafo = ", para";

                }

                // TEXTO DESAPROBADO

                $texto_desaprobado = "";

                $anio = false;

                if ($desaprobado_1ro) {

                    $texto_desaprobado .= "PRIMER AÑO, ";

                    $anio = true;

                } else {

                    if ($aprobado_1ro == false) {

                        foreach ($materias_desap_1ro as $fila) {

                            $texto_desaprobado.= $fila;

                        }                    

                    }

                }

                if ($desaprobado_2do) {

                    if ($anio) {

                        $texto_desaprobado = substr($texto_desaprobado, 0, strlen($texto_desaprobado) - 7) . " y ";

                    }

                    $texto_desaprobado .= "SEGUNDO AÑO, ";

                    $anio = true;

                } else {

                    if ($aprobado_2do == false) {

                        foreach ($materias_desap_2do as $fila) {

                            $texto_desaprobado.= $fila;

                        }                    

                    }

                }

                if ($desaprobado_3ro) {

                    if ($anio) {

                        $texto_desaprobado = substr($texto_desaprobado, 0, strlen($texto_desaprobado) - 7) . " y ";

                    }                

                    $texto_desaprobado .= "TERCER AÑO, ";

                } else {

                    if ($aprobado_3ro == false) {

                        foreach ($materias_desap_3ro as $fila) {

                            $texto_desaprobado.= $fila;

                        }                    

                    }

                }

                $texto_desaprobado = substr($texto_desaprobado, 0, strlen($texto_desaprobado) - 2) . " de la ECBC, ";

            }

        }

        //----------------------------------------------

        // VALOR DE RETORNO

        return ["texto_aprobado" => $texto_aprobado, 
                "texto_desaprobado" => $texto_desaprobado,
                "conector_parrafo" => $conector_parrafo,
                "promedio_1" => $promedio_1ro, 
                "promedio_2" => $promedio_2do, 
                "promedio_3" => $promedio_3ro,
                "aprobado_1" => $aprobado_1ro,
                "aprobado_2" => $aprobado_2do,
                "aprobado_3" => $aprobado_3ro,
                "desaprobado_1" => $desaprobado_1ro,
                "desaprobado_2" => $desaprobado_2do,
                "desaprobado_3" => $desaprobado_3ro,
                "promedio_total" => $promedio_general];

    }

?>