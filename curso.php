<?php

    session_start();

?>

<?php

    require_once ("conexion.php");

    $selected = [
        "1" => "",
        "2" => "",
        "3" => "",
        "4" => "",
        "5" => "",
        "6" => "",
        "7" => "",
        "8" => "",
        "9" => "",
        "10" => "",
        "11" => "",
        "12" => "",
        "13" => "",
        "14" => "",
        "15" => "",
        "16" => "",
        "17" => "",
        "18" => "",
        "19" => "",
        "20" => "",
        "21" => "",
        "22" => "",
        "23" => "",
        "24" => "",
        "25" => "",
        "26" => "",
        "27" => "",
        "28" => "",
        "29" => "",
        "30" => ""
    ];

    if (isset($_POST["curso"])) {

        switch ($_POST["curso"]) {

            case 1:
                $anio = 1;
                $division = 1;
                $turno = 1;
                $selected["1"] = "selected";
                $curso = "1º A";
                break;
            case 2:
                $anio = 1;
                $division = 2;
                $turno = 1;
                $selected["2"] = "selected";
                $curso = "1º B";
                break;
            case 3:
                $anio = 1;
                $division = 3;
                $turno = 1;
                $selected["3"] = "selected";
                $curso = "1º C";
                break;
            case 4:
                $anio = 1;
                $division = 4;
                $turno = 1;
                $selected["4"] = "selected";
                $curso = "1º D";
                break;
            case 5:
                $anio = 1;
                $division = 5;
                $turno = 2;
                $selected["5"] = "selected";
                $curso = "1º E";
                break;
            case 6:
                $anio = 1;
                $division = 6;
                $turno = 2;
                $selected["6"] = "selected";
                $curso = "1º F";
                break;
            case 7:
                $anio = 1;
                $division = 7;
                $turno = 2;
                $selected["7"] = "selected";
                $curso = "1º G";
                break;
            case 8:
                $anio = 1;
                $division = 8;
                $turno = 2;
                $selected["8"] = "selected";
                $curso = "1º H";
                break;
            case 9:
                $anio = 1;
                $division = 9;
                $turno = 2;
                $selected["9"] = "selected";
                $curso = "1º I";
                break;
            case 10:
                $anio = 1;
                $division = 10;
                $turno = 1;
                $selected["10"] = "selected";
                $curso = "1º J";
                break;
            case 11:
                $anio = 2;
                $division = 1;
                $turno = 1;
                $selected["11"] = "selected";
                $curso = "2º A";
                break;
            case 12:
                $anio = 2;
                $division = 2;
                $turno = 1;
                $selected["12"] = "selected";
                $curso = "2º B";
                break;
            case 13:
                $anio = 2;
                $division = 3;
                $turno = 1;
                $selected["13"] = "selected";
                $curso = "2º C";
                break;
            case 14:
                $anio = 2;
                $division = 4;
                $turno = 1;
                $selected["14"] = "selected";
                $curso = "2º D";
                break;
            case 15:
                $anio = 2;
                $division = 5;
                $turno = 2;
                $selected["15"] = "selected";
                $curso = "2º E";
                break;
            case 16:
                $anio = 2;
                $division = 6;
                $turno = 2;
                $selected["16"] = "selected";
                $curso = "2º F";
                break;
            case 17:
                $anio = 2;
                $division = 7;
                $turno = 2;
                $selected["17"] = "selected";
                $curso = "2º G";
                break;
            case 18:
                $anio = 2;
                $division = 8;
                $turno = 2;
                $selected["18"] = "selected";
                $curso = "2º H";
                break;
            case 19:
                $anio = 2;
                $division = 9;
                $turno = 2;
                $selected["19"] = "selected";
                $curso = "2º I";
                break;
            case 20:
                $anio = 2;
                $division = 10;
                $turno = 1;
                $selected["20"] = "selected";
                $curso = "2º J";
                break;
            case 21:
                $anio = 3;
                $division = 1;
                $turno = 1;
                $selected["21"] = "selected";
                $curso = "3º A";
                break;
            case 22:
                $anio = 3;
                $division = 2;
                $turno = 1;
                $selected["22"] = "selected";
                $curso = "3º B";
                break;
            case 23:
                $anio = 3;
                $division = 3;
                $turno = 1;
                $selected["23"] = "selected";
                $curso = "3º C";
                break;
            case 24:
                $anio = 3;
                $division = 4;
                $turno = 1;
                $selected["24"] = "selected";
                $curso = "3º D";
                break;
            case 25:
                $anio = 3;
                $division = 5;
                $turno = 2;
                $selected["25"] = "selected";
                $curso = "3º E";
                break;
            case 26:
                $anio = 3;
                $division = 6;
                $turno = 2;
                $selected["26"] = "selected";
                $curso = "3º F";
                break;
            case 27:
                $anio = 3;
                $division = 7;
                $turno = 2;
                $selected["27"] = "selected";
                $curso = "3º G";
                break;
            case 28:
                $anio = 3;
                $division = 8;
                $turno = 2;
                $selected["28"] = "selected";
                $curso = "3º H";
                break;
            case 29:
                $anio = 3;
                $division = 9;
                $turno = 2;
                $selected["29"] = "selected";
                $curso = "3º I";
                break;
            case 30:
                $anio = 3;
                $division = 10;
                $turno = 1;
                $selected["30"] = "selected";
                $curso = "3º J";

        }

        $foco = $_POST["foco"];

        //echo($foco);

    } else {

        $anio = 1;
        $division = 1;
        $turno = 1;
        $curso = "1º A";
        $selected["1"] = "selected";
        $foco = "1a";

        //echo($foco);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="estilos.css">

    <style>

        body {
            font-family: calibri;
            margin-top: 0;
            margin-bottom: 0;
            background-color: rgb(212, 216, 221);
        }

        #caja_curso {
            margin_top: 0px
        }

        #caja_pestanias {
            display: flex; 
            flex-direction: row; 
            margin-bottom: 0px
        }

        #caja_contenido {            
            border-right: 1px solid black; 
            border-bottom: 1px solid black; 
            border-left: 1px solid black     
        }

        #tab_estudiantes {
            flex-basis: 10%; 
            background-color: <?php if($foco == "1a" or $foco == "1b" or $foco == "1c") {echo("aquamarine");} else {echo("rgb(97, 189, 158)");}?>;
            padding: 8px 0 8px 5px; 
            cursor: pointer; 
            border-top: 1px solid black; 
            border-right: 1px solid black;
            <?php if($foco == "1a" or $foco == "1b" or $foco == "1c") {echo("");} else {echo("border-bottom: 1px solid black");}?>;
            border-left: 1px solid black; 
            margin-right: -1px
        }

        #tab_docentes {
            flex-basis: 10%; 
            background-color: <?php if($foco == "2a") {echo("aquamarine");} else {echo("rgb(97, 189, 158)");}?>;
            padding: 8px 0 8px 5px; 
            cursor: pointer; 
            border-top: 1px solid black;
            border-right: 1px solid black;
            <?php if($foco == "2a") {echo("");} else {echo("border-bottom: 1px solid black");}?>;
            border-left: 1px solid black;
            margin-right: -1px
        }

        #tab_grilla {
            flex-basis: 10%; 
            background-color: <?php if($foco == "3a") {echo("aquamarine");} else {echo("rgb(97, 189, 158)");}?>;
            padding: 8px 0 8px 5px; 
            cursor: pointer; 
            border-top: 1px solid black;
            border-right: 1px solid black;
            <?php if($foco == "3a") {echo("");} else {echo("border-bottom: 1px solid black");}?>;
            border-left: 1px solid black;
        }

        #tab_vacio {
            flex-basis: 70%; 
            padding: 8px 0 8px 5px; 
            border-bottom: 1px solid black
        }

        #caja_estudiantes, #caja_docentes, #caja_grilla {
            background-color: aquamarine;
            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 10px;
            padding-right: 10px;
            overflow: scroll;
            height: 770px;
        }

        #caja_estudiantes {
            display: <?php if($foco == "1a" or $foco == "1b" or $foco == "1c") {echo("block;");} else {echo("none;");}?>;
        }

        #caja_docentes {
            display: <?php if($foco == "2a") {echo("block;");} else {echo("none;");}?>;
        }

        #barra_vistas{
            display: flex;
            flex-direction: row;
            background-color: rgb(233, 195, 129)
        }

        #barra_vistas div {
            flex:1
        }

        #tabla_estudiantes_1, #tabla_estudiantes_2, #tabla_estudiantes_3, #tabla_docentes {
            border: 1px solid black;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        #tabla_estudiantes_1, #barra_vistas {
            width: 500px;
        }

        #tabla_estudiantes_1 {
            display: <?php if($foco != "1b" && $foco != "1c") {echo("table");} else {echo("none");}?>;
        }

        #tabla_estudiantes_2 {
            width: 1499px;
            display: <?php if($foco == "1b") {echo("table");} else {echo("none");}?>;
        }

        #tabla_estudiantes_3 {
            width: 1860px;
            display: <?php if($foco == "1c") {echo("table");} else {echo("none");}?>;;
        }        

        #tabla_docentes {
            width: 1200px;
        }

        #tabla_docentes thead {
            background-color: gray;
            color: white;
        }

        #tabla_estudiantes_1 tr:hover, #tabla_estudiantes_2 tr:hover, #tabla_estudiantes_3 tr:hover {
            background-color: rgb(131, 125, 125)
        }

        #caja_grilla {
            display: <?php if($foco == "3a") {echo("block");} else {echo("none");}?>;
        }

        #grilla {
            display: flex; 
            flex-direction: row; 
            width: 1100px;
            background-color: white;
        }

        #hora {
            display: flex; 
            flex-direction: column; 
            flex-basis:10%; 
            text-align: center; 
            border: 1px solid black
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }        

        .columna_apellido {
            width: 400px;
            background-color: rgb(158, 186, 197);
        }

        .columna_dni {
            width: 100px;
            background-color: rgb(133, 175, 192);
        }

        .columna_telefonos, .columna_correos {
            width: 500px;
        }

        .columna_notas {
            width: 20px;
        }

        .materia_impar, .columna_telefonos {            
            background-color: rgb(185, 185, 189);
        }

        .materia_par, .columna_correos {            
            background-color: rgb(162, 158, 183);
        }

        .columna_materia {
            width: 20%;
            background-color: rgba(195, 195, 197, 1);
        }

        .columna_titular {
            width: 30%;
            background-color: white;
        }

        .columna_suplente {
            width: 50%;
            background-color: white;
        }        

        .columna_perfilada {
            padding-left: 8px;
        }

        .columna_centrada {
            text-align: center;
        }

        .dia {
            display: flex; 
            flex-direction: column; 
            flex-basis:18%; 
            border: 1px solid black
        }        

        .veintena {
            height: 40px;
        }

        .hora {
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-top: 1px solid transparent;
            border-bottom: 1px solid transparent;
            margin: -1px;
            display: flex; flex-direction: column
        }

        #hora .hora{
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        #hora, .dia_titulo {
            text-align: center;
            background-color: gray;
            color: white;
        }

        .bloque_impar {
            background-color: lightblue;
        }

        .bloque_par {
            background-color: orange;
        }

        .bloque_nulo {
            background-color: rgb(247,245,238);
        }

    </style>    

    <script type="text/javascript">

        color_inicial = "rgb(97, 189, 158)"
        color_cambiado = "aquamarine"

        function intercambiar (param1, param2, param3) {

            document.getElementById(param1).style.display = "block"
            document.getElementById(param2).style.display = "none"
            document.getElementById(param3).style.display = "none"

            document.getElementById("tab_estudiantes").style.backgroundColor = color_inicial
            document.getElementById("tab_docentes").style.backgroundColor = color_inicial
            document.getElementById("tab_grilla").style.backgroundColor = color_inicial

            document.getElementById("tab_estudiantes").style.border = "1px solid black"
            document.getElementById("tab_docentes").style.border = "1px solid black"
            document.getElementById("tab_grilla").style.border = "1px solid black"

            event.target.style.backgroundColor = color_cambiado
            event.target.style.borderBottomWidth = "0px"

            switch (param1) {

                case "caja_estudiantes":

                    if (document.getElementById("vista_basica").checked) {

                        document.getElementById("foco_actual").value = "1a"

                    }

                    if (document.getElementById("vista_datos").checked) {

                        document.getElementById("foco_actual").value = "1b"

                    }

                    if (document.getElementById("vista_notas").checked) {

                        document.getElementById("foco_actual").value = "1c"

                    }                    

                    break
                case "caja_docentes":
                    document.getElementById("foco_actual").value = "2a"
                    break
                case "caja_grilla":
                    document.getElementById("foco_actual").value = "3a"
                    break

            }

        }

        function intercambiar_vista_alumnos() {

            document.getElementById("tabla_estudiantes_1").style.display = "none"
            document.getElementById("tabla_estudiantes_2").style.display = "none"
            document.getElementById("tabla_estudiantes_3").style.display = "none"

            switch (event.target.id) {

                case "vista_basica":
                    document.getElementById("tabla_estudiantes_1").style.display = "table"
                    document.getElementById("foco_actual").value = "1a"
                    break
                case "vista_datos":
                    document.getElementById("tabla_estudiantes_2").style.display = "table"
                    document.getElementById("foco_actual").value = "1b"
                    break
                case "vista_notas":
                    document.getElementById("tabla_estudiantes_3").style.display = "table"
                    document.getElementById("foco_actual").value = "1c"
                    break
            }

        }

        function cargar () {

            let cerrar_evento_entrada = false

            document.getElementById("tab_estudiantes").addEventListener("click",function () {intercambiar('caja_estudiantes','caja_docentes','caja_grilla')})
            document.getElementById("tab_docentes").addEventListener("click",function () {intercambiar('caja_docentes','caja_grilla','caja_estudiantes')})
            document.getElementById("tab_grilla").addEventListener("click",function () {intercambiar('caja_grilla','caja_estudiantes','caja_docentes')})
            
            document.getElementById("vista_basica").addEventListener("change",intercambiar_vista_alumnos)
            document.getElementById("vista_datos").addEventListener("change",intercambiar_vista_alumnos)
            document.getElementById("vista_notas").addEventListener("change",intercambiar_vista_alumnos)

            //- evento de la carga del curso elegido en el menú desplegable

            document.getElementById("menu_curso").addEventListener("change",function(){ document.getElementById("formulario").submit() })

            //-

            // Se cargan los eventos onmouseover de los bloques diarios de la grilla horaria

            for (let dia = 1; dia <=5; dia ++) {

                for (let bloque = 1; bloque <= 6; bloque ++) {

                    let elementos = document.querySelectorAll(".bloque_" + dia + "_" + bloque)

                    for (let veintena = 0; veintena < elementos.length; veintena ++ ) {

                        // se agrega el evento onmouseover
                        
                        elementos[veintena].addEventListener("mouseover", function () {
                            
                            const nombre_clase = event.target.classList

                            const clase_bloque = "." + nombre_clase[1]
                                                        
                            if (cerrar_evento_entrada == false) {

                                for ( let i = 0; i < document.querySelectorAll(clase_bloque).length; i ++ ) {

                                    if (document.querySelectorAll(clase_bloque)[i].dataset.evento == "1") {

                                        document.querySelectorAll(clase_bloque)[i].style.cursor = "pointer"
                                        document.querySelectorAll(clase_bloque)[i].style.opacity = "0.5"

                                    }

                                }

                                cerrar_evento_entrada = true

                            }
                            
                        })

                        // se agrega el evento onmouseout

                        elementos[veintena].addEventListener("mouseout", function () {
                            
                            cerrar_evento_entrada = false
                            
                            const nombre_clase = event.target.classList

                            const clase_bloque = "." + nombre_clase[1]

                            for ( let i = 0; i < document.querySelectorAll(clase_bloque).length; i ++ ) {

                                document.querySelectorAll(clase_bloque)[i].style.opacity = "1.0"

                            }
                            
                        })                        

                    }

                }

            }

        }

    </script>


</head>

<body onload="cargar()">

    <?php 
    
        require_once "cabecera.php";

        imprimir_cabecera(3);

    ?>

    <div>

        <div id="caja_curso" style="display: flex; height: 40px; background-color: rgb(90, 129, 179); margin-bottom: 10px;">


            
            <div style="display: flex; flex-direction: row; gap: 10px">

                <div style="padding: 3px 3px 0 4px; color: white; font-size: 26px;">
                    Seleccione un curso: 
                </div>

                <div>

                    <form id="formulario" action="curso.php" method="post" style="height: 100%">

                        <select name="curso" id="menu_curso" style="height: 100%; width: 60px;">
                            <option value="1" <?php echo($selected["1"]);?>>1º A</option>
                            <option value="2" <?php echo($selected["2"]);?>>1º B</option>
                            <option value="3" <?php echo($selected["3"]);?>>1º C</option>
                            <option value="4" <?php echo($selected["4"]);?>>1º D</option>
                            <option value="5" <?php echo($selected["5"]);?>>1º E</option>
                            <option value="6" <?php echo($selected["6"]);?>>1º F</option>
                            <option value="7" <?php echo($selected["7"]);?>>1º G</option>
                            <option value="8" <?php echo($selected["8"]);?>>1º H</option>
                            <option value="9" <?php echo($selected["9"]);?>>1º I</option>
                            <option value="10" <?php echo($selected["10"]);?>>1º J</option>
                            <option value="11" <?php echo($selected["11"]);?>>2º A</option>
                            <option value="12" <?php echo($selected["12"]);?>>2º B</option>
                            <option value="13" <?php echo($selected["13"]);?>>2º C</option>
                            <option value="14" <?php echo($selected["14"]);?>>2º D</option>
                            <option value="15" <?php echo($selected["15"]);?>>2º E</option>
                            <option value="16" <?php echo($selected["16"]);?>>2º F</option>
                            <option value="17" <?php echo($selected["17"]);?>>2º G</option>
                            <option value="18" <?php echo($selected["18"]);?>>2º H</option>
                            <option value="19" <?php echo($selected["19"]);?>>2º I</option>
                            <option value="20" <?php echo($selected["20"]);?>>2º J</option>
                            <option value="21" <?php echo($selected["21"]);?>>3º A</option>
                            <option value="22" <?php echo($selected["22"]);?>>3º B</option>
                            <option value="23" <?php echo($selected["23"]);?>>3º C</option>
                            <option value="24" <?php echo($selected["24"]);?>>3º D</option>
                            <option value="25" <?php echo($selected["25"]);?>>3º E</option>
                            <option value="26" <?php echo($selected["26"]);?>>3º F</option>
                            <option value="27" <?php echo($selected["27"]);?>>3º G</option>
                            <option value="28" <?php echo($selected["28"]);?>>3º H</option>
                            <option value="29" <?php echo($selected["29"]);?>>3º I</option>
                            <option value="30" <?php echo($selected["30"]);?>>3º J</option>
                        </select>

                        <input type="hidden" id="foco_actual" name="foco" value="<?php echo($foco);?>">

                    </form>

                </div>

            </div>
            <div>

            </div>

        </div>

        <div id="caja_pestanias">
            <div id="tab_estudiantes">ESTUDIANTES</div>
            <div id="tab_docentes">DOCENTES</div>
            <div id="tab_grilla">GRILLA HORARIA</div>
            <div id="tab_vacio"></div>
        </div>
        <div id="caja_contenido">

            <div id="caja_estudiantes">

                <div id="barra_vistas">
                    <div><label><input type="radio" name="vista" id="vista_basica" <?php if($foco != "1b" && $foco != "1c") {echo("checked");} else {echo("");}?>> vista básica</label></div>
                    <div><label><input type="radio" name="vista" id="vista_datos" <?php if($foco == "1b") {echo("checked");} else {echo("");}?>> vista datos</label></div>
                    <div><label><input type="radio" name="vista" id="vista_notas" <?php if($foco == "1c") {echo("checked");} else {echo("");}?>> vista notas</label></div>
                </div>                            

                <table id="tabla_estudiantes_1">

                    <colgroup>
                        <col class="columna_apellido">
                        <col class="columna_dni">
                    </colgroup>
                    
                    <thead>
                        <tr><th>APELLIDO y NOMBRE</th><th>DNI</th></tr>
                    </thead>

                    <tbody>

                    <?php 
                    
                        require_once("estudiantes_curso.php");

                        for ($fila = 1; $fila <= $cantidad_filas; $fila ++) {

                    ?>

                        <tr><td class="columna_perfilada"><?php echo($estudiante[$fila . "nombre"]);?></td><td class="columna_centrada"><?php echo($estudiante[$fila . "dni"]);?></td></tr>

                    <?php

                        }                        

                    ?>
                        
                    </tbody>
                </table>

                <table id="tabla_estudiantes_2">

                    <colgroup>
                        <col class="columna_apellido">
                        <col class="columna_dni">
                        <col class="columna_telefonos">
                        <col class="columna_correos">
                    </colgroup>
                    
                    <thead>
                        <tr><th>APELLIDO y NOMBRE</th><th>DNI</th><th>TELÉFONOS</th><th>EMAILS</th></tr>
                    </thead>

                    <tbody>

                    <?php 
                    
                        //require_once("estudiantes_curso.php");

                        for ($fila = 1; $fila <= $cantidad_filas; $fila ++) {

                    ?>

                        <tr><td class="columna_perfilada"><?php echo($estudiante[$fila . "nombre"]);?></td><td class="columna_centrada"><?php echo($estudiante[$fila . "dni"]);?></td><td class="columna_centrada"><?php echo($telefono[$estudiante[$fila . "dni"]]);?></td><td class="columna_centrada">DNI</td></tr>

                    <?php

                        }

                    ?>

                    </tbody>
                </table>

                <table id="tabla_estudiantes_3">

                    <colgroup>
                        <col class="columna_apellido">
                        <col class="columna_dni">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_par">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                        <col class="columna_notas, materia_impar">
                    </colgroup>
                    
                    <thead>
                        <tr>
                            <th>APELLIDO y NOMBRE</th>
                            <th>DNI</th>
                            <th colspan="3">A. PLÁSTICAS</th>
                            <th colspan="3">CS. NATURALES</th>
                            <th colspan="3">CS. SOCIALES</th>
                            <th colspan="3">C. MUSCIAL</th>
                            <th colspan="3">ED. FÍSICA</th>
                            <th colspan="3">E.A.</th>
                            <th colspan="3">INFORMÁTICA</th>
                            <th colspan="3">INGLÉS</th>
                            <th colspan="3">LENGUA Y LIT.</th>
                            <th colspan="3">MATEMÁTICA</th>
                            <th colspan="3">R.H.</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php 
                    
                        //require_once("estudiantes_curso.php");

                        for ($fila = 1; $fila <= $cantidad_filas; $fila ++) {

                    ?>

                        <tr>
                            <td class="columna_perfilada"><?php echo($estudiante[$fila . "nombre"]);?></td>
                            <td class="columna_centrada"><?php echo($estudiante[$fila . "dni"]);?></td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                            <td class="columna_centrada">DNI</td>
                        </tr>

                    <?php

                        }

                    ?>                    

                    </tbody>
                </table>                

                <div id="caja_menu_anio">
                    <select name="menu_anio" id="menu_anio">
                        <option value="2025">2025</option>
                    </select>
                </div>

            </div>

            <div id="caja_docentes">

                <?php
                
                    require_once ("docentes_curso.php");
                
                ?>

                <table id="tabla_docentes">

                    <colgroup>
                        <col class="columna_materia">
                        <col class="columna_titular">
                        <col class="columna_suplente">
                    </colgroup>

                    <thead>
                        <tr><th>ASIGNATURA</th><th>TITULAR/INTERIN@</th><th>SUPLENTE/S</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ARTES PLÁSTICA</td>
                            <td <?php echo($fondo_titular[1])?>>
                                <?php echo($docente["1_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["1_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio <> 3) { echo('style="display:none;"'); }?>>
                            <td>BIOLOGÍA</td>
                            <td <?php echo($fondo_titular[2])?>>
                                <?php echo($docente["2_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["2_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio == 3) { echo('style="display:none;"'); }?>>
                            <td>CIENCIAS NATURALES</td>
                            <td <?php echo($fondo_titular[3])?>>
                                <?php echo($docente["3_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["3_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio == 3) { echo('style="display:none;"'); }?>>
                            <td>CIENCIAS SOCIALES</td>
                            <td <?php echo($fondo_titular[4])?>>
                                <?php echo($docente["4_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["4_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>CULTURA MUSICAL</td>
                            <td <?php echo($fondo_titular[5])?>>
                                <?php echo($docente["5_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["5_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>EDUCACIÓN FÍSICA</td>
                            <td <?php echo($fondo_titular[6])?>>
                                <?php echo($docente["6_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["6_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio == 3) { echo('style="display:none;"'); }?>>
                            <td>ESTRATEGIAS DE APRENDIZAJE</td>
                            <td <?php echo($fondo_titular[7])?>>
                                <?php echo($docente["7_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["7_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio <> 3) { echo('style="display:none;"'); }?>>
                            <td>GEOGRAFÍA ARGENTINA</td>
                            <td <?php echo($fondo_titular[8])?>>
                                <?php echo($docente["8_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["8_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio <> 3) { echo('style="display:none;"'); }?>>
                            <td>HISTORIA ARGENTINA</td>
                            <td <?php echo($fondo_titular[9])?>>
                                <?php echo($docente["9_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["9_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>INFORMÁTICA</td>
                            <td <?php echo($fondo_titular[10])?>>
                                <?php echo($docente["10_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["10_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>INGLÉS</td>
                            <td <?php echo($fondo_titular[11])?>>
                                <?php echo($docente["11_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["11_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio <> 3) { echo('style="display:none;"'); }?>>
                            <td>I.A.C.</td>
                            <td <?php echo($fondo_titular[12])?>>
                                <?php echo($docente["12_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["12_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>LENGUA Y LITERATURA</td>
                            <td <?php echo($fondo_titular[13])?>>
                                <?php echo($docente["13_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["13_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>MATEMÁTICA</td>
                            <td <?php echo($fondo_titular[14])?>>
                                <?php echo($docente["14_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["14_suplente"])?>
                            </td>
                        </tr>
                        <tr <?php if ($anio <> 3) { echo('style="display:none;"'); }?>>
                            <td>QUÍMICA</td>
                            <td <?php echo($fondo_titular[16])?>>
                                <?php echo($docente["16_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["16_suplente"])?>
                            </td>
                        </tr>
                        <tr>
                            <td>RELACIONES HUMANAS</td>
                            <td <?php echo($fondo_titular[17])?>>
                                <?php echo($docente["17_titular"])?>
                            </td>
                            <td>
                                <?php echo($docente["17_suplente"])?>
                            </td>
                        </tr>
                    </tbody>
                </table>                

            </div>

            <div id="caja_grilla">

                <?php
                
                    require_once ("materias_grilla.php");
                
                ?>

                <div id="grilla">
                    <div id="hora">
                        <div id="hora_titulo">HORA</div>
                        <div id="hora_1" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">1</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_1"]);} else {echo($franja_horaria["tarde_1"]);}?></div>
                        </div>
                        <div id="hora_2" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">2</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_2"]);} else {echo($franja_horaria["tarde_2"]);}?></div>
                        </div>
                        <div id="hora_3" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">3</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_3"]);} else {echo($franja_horaria["tarde_3"]);}?></div>
                        </div>
                        <div id="hora_4" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">4</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_4"]);} else {echo($franja_horaria["tarde_4"]);}?></div>
                        </div>
                        <div id="hora_5" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">5</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_5"]);} else {echo($franja_horaria["tarde_5"]);}?></div>
                        </div>
                        <div id="hora_6" class="hora">
                            <div class="veintena">&nbsp;</div>
                            <div class="veintena" style="font-size: 30px;">6</div>
                            <div class="veintena"><?php if($turno == 1) {echo($franja_horaria["mañana_6"]);} else {echo($franja_horaria["tarde_6"]);}?></div>
                        </div>
                        <div id="hora_salida">SALIDA</div>
                    </div>
                    <div id="lunes" class="dia">
                        <div id="lunes_titulo" class="dia_titulo">LUNES</div>
                        <div id="lunes_1" class="hora">
                            <div id="lunes_1_1" class="veintena <?php if ( isset($info_bloque["1_1_1"]) ) { echo($info_bloque["1_1_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_1_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_1_1"]) ) { echo($materia["1_1_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_1_2" class="veintena <?php if ( isset($info_bloque["1_1_2"]) ) { echo($info_bloque["1_1_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_1_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_1_2"]) ) { echo($materia["1_1_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_1_3" class="veintena <?php if ( isset($info_bloque["1_1_3"]) ) { echo($info_bloque["1_1_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_1_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_1_3"]) ) { echo($materia["1_1_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_2" class="hora">
                            <div id="lunes_2_1" class="veintena <?php if ( isset($info_bloque["1_2_1"]) ) { echo($info_bloque["1_2_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_2_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_2_1"]) ) { echo($materia["1_2_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_2_2" class="veintena <?php if ( isset($info_bloque["1_2_2"]) ) { echo($info_bloque["1_2_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_2_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_2_2"]) ) { echo($materia["1_2_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_2_3" class="veintena <?php if ( isset($info_bloque["1_2_3"]) ) { echo($info_bloque["1_2_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_2_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_2_3"]) ) { echo($materia["1_2_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_3" class="hora">
                            <div id="lunes_3_1" class="veintena <?php if ( isset($info_bloque["1_3_1"]) ) { echo($info_bloque["1_3_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_3_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_3_1"]) ) { echo($materia["1_3_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_3_2" class="veintena <?php if ( isset($info_bloque["1_3_2"]) ) { echo($info_bloque["1_3_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_3_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_3_2"]) ) { echo($materia["1_3_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_3_3" class="veintena <?php if ( isset($info_bloque["1_3_3"]) ) { echo($info_bloque["1_3_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_3_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_3_3"]) ) { echo($materia["1_3_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_4" class="hora">
                            <div id="lunes_4_1" class="veintena <?php if ( isset($info_bloque["1_4_1"]) ) { echo($info_bloque["1_4_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_4_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_4_1"]) ) { echo($materia["1_4_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_4_2" class="veintena <?php if ( isset($info_bloque["1_4_2"]) ) { echo($info_bloque["1_4_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_4_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_4_2"]) ) { echo($materia["1_4_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_4_3" class="veintena <?php if ( isset($info_bloque["1_4_3"]) ) { echo($info_bloque["1_4_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_4_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_4_3"]) ) { echo($materia["1_4_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_5" class="hora">
                            <div id="lunes_5_1" class="veintena <?php if ( isset($info_bloque["1_5_1"]) ) { echo($info_bloque["1_5_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_5_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_5_1"]) ) { echo($materia["1_5_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_5_2" class="veintena <?php if ( isset($info_bloque["1_5_2"]) ) { echo($info_bloque["1_5_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_5_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_5_2"]) ) { echo($materia["1_5_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_5_3" class="veintena <?php if ( isset($info_bloque["1_5_3"]) ) { echo($info_bloque["1_5_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_5_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_5_3"]) ) { echo($materia["1_5_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_6" class="hora">
                            <div id="lunes_6_1" class="veintena <?php if ( isset($info_bloque["1_6_1"]) ) { echo($info_bloque["1_6_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_6_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_6_1"]) ) { echo($materia["1_6_1"]); } else { echo(""); } ?></div>
                            <div id="lunes_6_2" class="veintena <?php if ( isset($info_bloque["1_6_2"]) ) { echo($info_bloque["1_6_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_6_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_6_2"]) ) { echo($materia["1_6_2"]); } else { echo(""); } ?></div>
                            <div id="lunes_6_3" class="veintena <?php if ( isset($info_bloque["1_6_3"]) ) { echo($info_bloque["1_6_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["1_6_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["1_6_3"]) ) { echo($materia["1_6_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="lunes_salida" class="dia_titulo"><?php echo($salida_lunes);?></div>
                    </div>
                    <div id="martes" class="dia">
                        <div id="martes_titulo" class="dia_titulo">MARTES</div>
                        <div id="martes_1" class="hora">
                            <div id="martes_1_1" class="veintena <?php if ( isset($info_bloque["2_1_1"]) ) { echo($info_bloque["2_1_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_1_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_1_1"]) ) { echo($materia["2_1_1"]); } else { echo(""); } ?></div>
                            <div id="martes_1_2" class="veintena <?php if ( isset($info_bloque["2_1_2"]) ) { echo($info_bloque["2_1_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_1_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_1_2"]) ) { echo($materia["2_1_2"]); } else { echo(""); } ?></div>
                            <div id="martes_1_3" class="veintena <?php if ( isset($info_bloque["2_1_3"]) ) { echo($info_bloque["2_1_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_1_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_1_3"]) ) { echo($materia["2_1_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_2" class="hora">
                            <div id="martes_2_1" class="veintena <?php if ( isset($info_bloque["2_2_1"]) ) { echo($info_bloque["2_2_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_2_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_2_1"]) ) { echo($materia["2_2_1"]); } else { echo(""); } ?></div>
                            <div id="martes_2_2" class="veintena <?php if ( isset($info_bloque["2_2_2"]) ) { echo($info_bloque["2_2_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_2_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_2_2"]) ) { echo($materia["2_2_2"]); } else { echo(""); } ?></div>
                            <div id="martes_2_3" class="veintena <?php if ( isset($info_bloque["2_2_3"]) ) { echo($info_bloque["2_2_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_2_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_2_3"]) ) { echo($materia["2_2_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_3" class="hora">
                            <div id="martes_3_1" class="veintena <?php if ( isset($info_bloque["2_3_1"]) ) { echo($info_bloque["2_3_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_3_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_3_1"]) ) { echo($materia["2_3_1"]); } else { echo(""); } ?></div>
                            <div id="martes_3_2" class="veintena <?php if ( isset($info_bloque["2_3_2"]) ) { echo($info_bloque["2_3_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_3_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_3_2"]) ) { echo($materia["2_3_2"]); } else { echo(""); } ?></div>
                            <div id="martes_3_3" class="veintena <?php if ( isset($info_bloque["2_3_3"]) ) { echo($info_bloque["2_3_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_3_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_3_3"]) ) { echo($materia["2_3_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_4" class="hora">
                            <div id="martes_4_1" class="veintena <?php if ( isset($info_bloque["2_4_1"]) ) { echo($info_bloque["2_4_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_4_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_4_1"]) ) { echo($materia["2_4_1"]); } else { echo(""); } ?></div>
                            <div id="martes_4_2" class="veintena <?php if ( isset($info_bloque["2_4_2"]) ) { echo($info_bloque["2_4_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_4_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_4_2"]) ) { echo($materia["2_4_2"]); } else { echo(""); } ?></div>
                            <div id="martes_4_3" class="veintena <?php if ( isset($info_bloque["2_4_3"]) ) { echo($info_bloque["2_4_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_4_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_4_3"]) ) { echo($materia["2_4_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_5" class="hora">
                            <div id="martes_5_1" class="veintena <?php if ( isset($info_bloque["2_5_1"]) ) { echo($info_bloque["2_5_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_5_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_5_1"]) ) { echo($materia["2_5_1"]); } else { echo(""); } ?></div>
                            <div id="martes_5_2" class="veintena <?php if ( isset($info_bloque["2_5_2"]) ) { echo($info_bloque["2_5_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_5_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_5_2"]) ) { echo($materia["2_5_2"]); } else { echo(""); } ?></div>
                            <div id="martes_5_3" class="veintena <?php if ( isset($info_bloque["2_5_3"]) ) { echo($info_bloque["2_5_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_5_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_5_3"]) ) { echo($materia["2_5_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_6" class="hora">
                            <div id="martes_6_1" class="veintena <?php if ( isset($info_bloque["2_6_1"]) ) { echo($info_bloque["2_6_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_6_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_6_1"]) ) { echo($materia["2_6_1"]); } else { echo(""); } ?></div>
                            <div id="martes_6_2" class="veintena <?php if ( isset($info_bloque["2_6_2"]) ) { echo($info_bloque["2_6_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_6_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_6_2"]) ) { echo($materia["2_6_2"]); } else { echo(""); } ?></div>
                            <div id="martes_6_3" class="veintena <?php if ( isset($info_bloque["2_6_3"]) ) { echo($info_bloque["2_6_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["2_6_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["2_6_3"]) ) { echo($materia["2_6_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="martes_salida" class="dia_titulo"><?php echo($salida_martes);?></div>                        
                    </div>
                    <div id="miercoles" class="dia">
                        <div id="miercoles_titulo" class="dia_titulo">MIÉRCOLES</div>
                        <div id="miercoles_1" class="hora">
                            <div id="miercoles_1_1" class="veintena <?php if ( isset($info_bloque["3_1_1"]) ) { echo($info_bloque["3_1_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_1_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_1_1"]) ) { echo($materia["3_1_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_1_2" class="veintena <?php if ( isset($info_bloque["3_1_2"]) ) { echo($info_bloque["3_1_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_1_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_1_2"]) ) { echo($materia["3_1_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_1_3" class="veintena <?php if ( isset($info_bloque["3_1_3"]) ) { echo($info_bloque["3_1_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_1_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_1_3"]) ) { echo($materia["3_1_3"]); } else { echo(""); } ?></div>                          
                        </div>
                        <div id="miercoles_2" class="hora">
                            <div id="miercoles_2_1" class="veintena <?php if ( isset($info_bloque["3_2_1"]) ) { echo($info_bloque["3_2_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_2_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_2_1"]) ) { echo($materia["3_2_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_2_2" class="veintena <?php if ( isset($info_bloque["3_2_2"]) ) { echo($info_bloque["3_2_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_2_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_2_2"]) ) { echo($materia["3_2_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_2_3" class="veintena <?php if ( isset($info_bloque["3_2_3"]) ) { echo($info_bloque["3_2_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_2_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_2_3"]) ) { echo($materia["3_2_3"]); } else { echo(""); } ?></div>                            
                        </div>
                        <div id="miercoles_3" class="hora">
                            <div id="miercoles_3_1" class="veintena <?php if ( isset($info_bloque["3_3_1"]) ) { echo($info_bloque["3_3_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_3_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_3_1"]) ) { echo($materia["3_3_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_3_2" class="veintena <?php if ( isset($info_bloque["3_3_2"]) ) { echo($info_bloque["3_3_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_3_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_3_2"]) ) { echo($materia["3_3_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_3_3" class="veintena <?php if ( isset($info_bloque["3_3_3"]) ) { echo($info_bloque["3_3_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_3_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_3_3"]) ) { echo($materia["3_3_3"]); } else { echo(""); } ?></div>                            
                        </div>
                        <div id="miercoles_4" class="hora">
                            <div id="miercoles_4_1" class="veintena <?php if ( isset($info_bloque["3_4_1"]) ) { echo($info_bloque["3_4_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_4_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_4_1"]) ) { echo($materia["3_4_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_4_2" class="veintena <?php if ( isset($info_bloque["3_4_2"]) ) { echo($info_bloque["3_4_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_4_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_4_2"]) ) { echo($materia["3_4_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_4_3" class="veintena <?php if ( isset($info_bloque["3_4_3"]) ) { echo($info_bloque["3_4_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_4_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_4_3"]) ) { echo($materia["3_4_3"]); } else { echo(""); } ?></div>                            
                        </div>
                        <div id="miercoles_5" class="hora">
                            <div id="miercoles_5_1" class="veintena <?php if ( isset($info_bloque["3_5_1"]) ) { echo($info_bloque["3_5_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_5_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_5_1"]) ) { echo($materia["3_5_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_5_2" class="veintena <?php if ( isset($info_bloque["3_5_2"]) ) { echo($info_bloque["3_5_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_5_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_5_2"]) ) { echo($materia["3_5_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_5_3" class="veintena <?php if ( isset($info_bloque["3_5_3"]) ) { echo($info_bloque["3_5_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_5_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_5_3"]) ) { echo($materia["3_5_3"]); } else { echo(""); } ?></div>                            
                        </div>
                        <div id="miercoles_6" class="hora">
                            <div id="miercoles_6_1" class="veintena <?php if ( isset($info_bloque["3_6_1"]) ) { echo($info_bloque["3_6_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_6_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_6_1"]) ) { echo($materia["3_6_1"]); } else { echo(""); } ?></div>
                            <div id="miercoles_6_2" class="veintena <?php if ( isset($info_bloque["3_6_2"]) ) { echo($info_bloque["3_6_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_6_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_6_2"]) ) { echo($materia["3_6_2"]); } else { echo(""); } ?></div>
                            <div id="miercoles_6_3" class="veintena <?php if ( isset($info_bloque["3_6_3"]) ) { echo($info_bloque["3_6_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["3_6_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["3_6_3"]) ) { echo($materia["3_6_3"]); } else { echo(""); } ?></div>                            
                        </div>
                        <div id="miercoles_salida" class="dia_titulo"><?php echo($salida_miercoles);?></div>                        
                    </div>
                    <div id="jueves" class="dia">
                        <div id="jueves_titulo" class="dia_titulo">JUEVES</div>
                        <div id="jueves_1" class="hora">
                            <div id="jueves_1_1" class="veintena <?php if ( isset($info_bloque["4_1_1"]) ) { echo($info_bloque["4_1_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_1_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_1_1"]) ) { echo($materia["4_1_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_1_2" class="veintena <?php if ( isset($info_bloque["4_1_2"]) ) { echo($info_bloque["4_1_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_1_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_1_2"]) ) { echo($materia["4_1_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_1_3" class="veintena <?php if ( isset($info_bloque["4_1_3"]) ) { echo($info_bloque["4_1_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_1_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_1_3"]) ) { echo($materia["4_1_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_2" class="hora">
                            <div id="jueves_2_1" class="veintena <?php if ( isset($info_bloque["4_2_1"]) ) { echo($info_bloque["4_2_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_2_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_2_1"]) ) { echo($materia["4_2_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_2_2" class="veintena <?php if ( isset($info_bloque["4_2_2"]) ) { echo($info_bloque["4_2_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_2_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_2_2"]) ) { echo($materia["4_2_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_2_3" class="veintena <?php if ( isset($info_bloque["4_2_3"]) ) { echo($info_bloque["4_2_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_2_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_2_3"]) ) { echo($materia["4_2_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_3" class="hora">
                            <div id="jueves_3_1" class="veintena <?php if ( isset($info_bloque["4_3_1"]) ) { echo($info_bloque["4_3_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_3_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_3_1"]) ) { echo($materia["4_3_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_3_2" class="veintena <?php if ( isset($info_bloque["4_3_2"]) ) { echo($info_bloque["4_3_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_3_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_3_2"]) ) { echo($materia["4_3_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_3_3" class="veintena <?php if ( isset($info_bloque["4_3_3"]) ) { echo($info_bloque["4_3_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_3_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_3_3"]) ) { echo($materia["4_3_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_4" class="hora">
                            <div id="jueves_4_1" class="veintena <?php if ( isset($info_bloque["4_4_1"]) ) { echo($info_bloque["4_4_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_4_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_4_1"]) ) { echo($materia["4_4_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_4_2" class="veintena <?php if ( isset($info_bloque["4_4_2"]) ) { echo($info_bloque["4_4_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_4_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_4_2"]) ) { echo($materia["4_4_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_4_3" class="veintena <?php if ( isset($info_bloque["4_4_3"]) ) { echo($info_bloque["4_4_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_4_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_4_3"]) ) { echo($materia["4_4_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_5" class="hora">
                            <div id="jueves_5_1" class="veintena <?php if ( isset($info_bloque["4_5_1"]) ) { echo($info_bloque["4_5_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_5_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_5_1"]) ) { echo($materia["4_5_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_5_2" class="veintena <?php if ( isset($info_bloque["4_5_2"]) ) { echo($info_bloque["4_5_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_5_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_5_2"]) ) { echo($materia["4_5_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_5_3" class="veintena <?php if ( isset($info_bloque["4_5_3"]) ) { echo($info_bloque["4_5_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_5_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_5_3"]) ) { echo($materia["4_5_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_6" class="hora">
                            <div id="jueves_6_1" class="veintena <?php if ( isset($info_bloque["4_6_1"]) ) { echo($info_bloque["4_6_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_6_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_6_1"]) ) { echo($materia["4_6_1"]); } else { echo(""); } ?></div>
                            <div id="jueves_6_2" class="veintena <?php if ( isset($info_bloque["4_6_2"]) ) { echo($info_bloque["4_6_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_6_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_6_2"]) ) { echo($materia["4_6_2"]); } else { echo(""); } ?></div>
                            <div id="jueves_6_3" class="veintena <?php if ( isset($info_bloque["4_6_3"]) ) { echo($info_bloque["4_6_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["4_6_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["4_6_3"]) ) { echo($materia["4_6_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="jueves_salida" class="dia_titulo"><?php echo($salida_jueves);?></div>                        
                    </div>
                    <div id="viernes" class="dia">
                        <div id="viernes_titulo" class="dia_titulo">VIERNES</div>
                        <div id="viernes_1" class="hora">
                            <div id="viernes_1_1" class="veintena <?php if ( isset($info_bloque["5_1_1"]) ) { echo($info_bloque["5_1_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_1_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_1_1"]) ) { echo($materia["5_1_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_1_2" class="veintena <?php if ( isset($info_bloque["5_1_2"]) ) { echo($info_bloque["5_1_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_1_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_1_2"]) ) { echo($materia["5_1_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_1_3" class="veintena <?php if ( isset($info_bloque["5_1_3"]) ) { echo($info_bloque["5_1_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_1_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_1_3"]) ) { echo($materia["5_1_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_2" class="hora">
                            <div id="viernes_2_1" class="veintena <?php if ( isset($info_bloque["5_2_1"]) ) { echo($info_bloque["5_2_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_2_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_2_1"]) ) { echo($materia["5_2_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_2_2" class="veintena <?php if ( isset($info_bloque["5_2_2"]) ) { echo($info_bloque["5_2_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_2_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_2_2"]) ) { echo($materia["5_2_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_2_3" class="veintena <?php if ( isset($info_bloque["5_2_3"]) ) { echo($info_bloque["5_2_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_2_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_2_3"]) ) { echo($materia["5_2_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_3" class="hora">
                            <div id="viernes_3_1" class="veintena <?php if ( isset($info_bloque["5_3_1"]) ) { echo($info_bloque["5_3_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_3_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_3_1"]) ) { echo($materia["5_3_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_3_2" class="veintena <?php if ( isset($info_bloque["5_3_2"]) ) { echo($info_bloque["5_3_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_3_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_3_2"]) ) { echo($materia["5_3_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_3_3" class="veintena <?php if ( isset($info_bloque["5_3_3"]) ) { echo($info_bloque["5_3_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_3_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_3_3"]) ) { echo($materia["5_3_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_4" class="hora">
                            <div id="viernes_4_1" class="veintena <?php if ( isset($info_bloque["5_4_1"]) ) { echo($info_bloque["5_4_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_4_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_4_1"]) ) { echo($materia["5_4_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_4_2" class="veintena <?php if ( isset($info_bloque["5_4_2"]) ) { echo($info_bloque["5_4_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_4_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_4_2"]) ) { echo($materia["5_4_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_4_3" class="veintena <?php if ( isset($info_bloque["5_4_3"]) ) { echo($info_bloque["5_4_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_4_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_4_3"]) ) { echo($materia["5_4_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_5" class="hora">
                            <div id="viernes_5_1" class="veintena <?php if ( isset($info_bloque["5_5_1"]) ) { echo($info_bloque["5_5_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_5_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_5_1"]) ) { echo($materia["5_5_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_5_2" class="veintena <?php if ( isset($info_bloque["5_5_2"]) ) { echo($info_bloque["5_5_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_5_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_5_2"]) ) { echo($materia["5_5_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_5_3" class="veintena <?php if ( isset($info_bloque["5_5_3"]) ) { echo($info_bloque["5_5_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_5_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_5_3"]) ) { echo($materia["5_5_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_6" class="hora">
                            <div id="viernes_6_1" class="veintena <?php if ( isset($info_bloque["5_6_1"]) ) { echo($info_bloque["5_6_1"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_6_1"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_6_1"]) ) { echo($materia["5_6_1"]); } else { echo(""); } ?></div>
                            <div id="viernes_6_2" class="veintena <?php if ( isset($info_bloque["5_6_2"]) ) { echo($info_bloque["5_6_2"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_6_2"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_6_2"]) ) { echo($materia["5_6_2"]); } else { echo(""); } ?></div>
                            <div id="viernes_6_3" class="veintena <?php if ( isset($info_bloque["5_6_3"]) ) { echo($info_bloque["5_6_3"]); } else { echo("bloque_nulo"); } ?>" data-evento=<?php if ( isset($materia["5_6_3"]) ) { echo("'1'"); } else { echo("'0'"); } ?>><?php if ( isset($materia["5_6_3"]) ) { echo($materia["5_6_3"]); } else { echo(""); } ?></div>
                        </div>
                        <div id="viernes_salida" class="dia_titulo"><?php echo($salida_viernes);?></div>                        
                    </div>
                </div>

            </div>

        </div>
    
    
    </div>

    <?php 
    
        require_once ("desconexion.php");

    ?>

    <?php 
    
        require_once ("pie.php");

    ?>

    <?php
    
        if (isset($_SESSION["nombre"])) {

            require_once ("info_sesion.php");

        }
    
    ?>
    
</body>
</html>