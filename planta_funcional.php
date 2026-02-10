<?php

    session_start();

?>

<?php

    //require_once ("conexion.php");

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

    if (isset($_POST["materia_cargo"])) {

        switch ($_POST["materia_cargo"]) {

            case "1-1":
                $rol = 1;
                $funcion = 1;
                $selected["18"] = "selected";
                break;
            case "1-2":
                $rol = 1;
                $funcion = 2;
                $selected["19"] = "selected";
                break;
            case "1-3":
                $rol = 1;
                $funcion = 3;
                $selected["20"] = "selected";
                break;
            case "1-4":
                $rol = 1;
                $funcion = 4;
                $selected["21"] = "selected";
                break;
            case "1-5":
                $rol = 1;
                $funcion = 5;
                $selected["22"] = "selected";
                break;
            case "1-6":
                $rol = 1;
                $funcion = 6;
                $selected["23"] = "selected";
                break;
            case "1-7":
                $rol = 1;
                $funcion = 7;
                $selected["24"] = "selected";
                break;
            case "1-8":
                $rol = 1;
                $funcion = 8;
                $selected["25"] = "selected";
                break;
            case "2-1":
                $rol = 2;
                $funcion = 1;
                $selected["1"] = "selected";
                break;
            case "2-2":
                $rol = 2;
                $funcion = 2;
                $selected["2"] = "selected";
                break;
            case "2-3":
                $rol = 2;
                $funcion = 3;
                $selected["3"] = "selected";
                break;
            case "2-4":
                $rol = 2;
                $funcion = 4;
                $selected["4"] = "selected";
                break;
            case "2-5":
                $rol = 2;
                $funcion = 5;
                $selected["5"] = "selected";
                break;
            case "2-6":
                $rol = 2;
                $funcion = 6;
                $selected["6"] = "selected";
                break;
            case "2-7":
                $rol = 2;
                $funcion = 7;
                $selected["7"] = "selected";
                break;
            case "2-8":
                $rol = 2;
                $funcion = 8;
                $selected["8"] = "selected";
                break;
            case "2-9":
                $rol = 2;
                $funcion = 9;
                $selected["9"] = "selected";
                break;
            case "2-10":
                $rol = 2;
                $funcion = 10;
                $selected["10"] = "selected";
                break;
            case "2-11":
                $rol = 2;
                $funcion = 11;
                $selected["11"] = "selected";
                break;
            case "2-12":
                $rol = 2;
                $funcion = 12;
                $selected["12"] = "selected";
                break;
            case "2-13":
                $rol = 2;
                $funcion = 13;
                $selected["13"] = "selected";
                break;
            case "2-14":
                $rol = 2;
                $funcion = 14;
                $selected["14"] = "selected";
                break;
            case "2-16":
                $rol = 2;
                $funcion = 16;
                $selected["15"] = "selected";
                break;
            case "2-17":
                $rol = 2;
                $funcion = 17;
                $selected["16"] = "selected";
                break;
            case "3-0":
                $rol = 3;
                $funcion = null;
                $selected["17"] = "selected";
                break;
            case "4-0":
                $rol = 4;
                $funcion = null;
                $selected["26"] = "selected";
                break;
            case "5-0":
                $rol = 5;
                $funcion = null;
                $selected["27"] = "selected";
                break;
            case "6-0":
                $rol = 6;
                $funcion = null;
                $selected["28"] = "selected";
                break;

        }

        //$foco = $_POST["foco"];

        //echo($foco);

    } else {

        $rol = 2;
        $funcion = 1;
        $selected["1"] = "selected";
        //$foco = "1a";

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

            #tabla_cargo_materia {
                width: 1600px;
                border: 1px solid red;
                border-collapse: collapse;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            #tabla_cargo_materia thead {
                background-color: gray;
                color: white;
            }

            .columna_curso {
                width: 60px;
            }

            .columna_docentes {
                width: 1040px;
            }

            .columna_observacion {
                width: 500px;
            }

            th, td {
                border: 1px solid black;
            }

            tr:hover {
                background-color: beige;
            }

            .columna_curso {
                text-align: center; 
                font-weight: bold;                
            }

            .columna_info {
                padding: 2px 0 2px 5px;
            }

        </style>

        <script>

            function cargar () {

                //- evento de la carga de la materia_cargo elegido en el menú desplegable

                document.getElementById("menu_materia_cargo").addEventListener("change",function(){ document.getElementById("formulario").submit() })
                
                //-

            }

        </script>

    </head>

    <body onload="cargar();">

        <?php 

            require_once "cabecera.php";

            imprimir_cabecera(4);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

            <div id="caja_materia_cargo" style="display: flex; height: 40px; background-color: rgb(91, 146, 99); margin-bottom: 10px;">
                
                <div style="display: flex; flex-direction: row; gap: 10px">

                    <div style="padding: 3px 3px 0 4px; color: white; font-size: 26px;">
                        Seleccione una materia o cargo: 
                    </div>

                    <div>

                        <form id="formulario" action="planta_funcional.php" method="post" style="height: 100%">

                            <select name="materia_cargo" id="menu_materia_cargo" style="height: 100%; width: 260px;">
                                <optgroup label="MATERIAS">
                                    <option value="2-1" <?php echo($selected["1"]);?>>ARTES PLÁSTICAS</option>
                                    <option value="2-2" <?php echo($selected["2"]);?>>BIOLOGÍA</option>
                                    <option value="2-3" <?php echo($selected["3"]);?>>CIENCIAS NATURALES</option>
                                    <option value="2-4" <?php echo($selected["4"]);?>>CIENCIAS SOCIALES</option>
                                    <option value="2-5" <?php echo($selected["5"]);?>>CULTURA MUSICAL</option>
                                    <option value="2-6" <?php echo($selected["6"]);?>>EDUCACIÓN FÍSICA</option>
                                    <option value="2-7" <?php echo($selected["7"]);?>>ESTRATEGIAS DE APRENDIZAJE</option>
                                    <option value="2-8" <?php echo($selected["8"]);?>>GEOGRAFÍA ARGENTINA</option>
                                    <option value="2-9" <?php echo($selected["9"]);?>>HISTORIA ARGENTINA</option>
                                    <option value="2-10" <?php echo($selected["10"]);?>>INFORMÁTICA</option>
                                    <option value="2-11" <?php echo($selected["11"]);?>>INGLÉS</option>
                                    <option value="2-12" <?php echo($selected["12"]);?>>IAC</option>
                                    <option value="2-13" <?php echo($selected["13"]);?>>LENGUA Y LITERATURA</option>
                                    <option value="2-14" <?php echo($selected["14"]);?>>MATEMÁTICA</option>
                                    <option value="2-16" <?php echo($selected["15"]);?>>QUÍMICA</option>
                                    <option value="2-17" <?php echo($selected["16"]);?>>RELACIONES HUMANAS</option>
                                    <option value="3-0" <?php echo($selected["17"]);?>>TALLER OPTATIVO</option>
                                </optgroup>
                                <optgroup label="CARGOS">
                                    <option value="1-1" <?php echo($selected["18"]);?>>AUXILIAR DOCENTE (PRECEPTOR/A)</option>
                                    <option value="1-2" <?php echo($selected["19"]);?>>AYUDANTE DE CLASES PRÁCTICAS</option>
                                    <option value="1-3" <?php echo($selected["20"]);?>>DIRECTOR/A</option>
                                    <option value="1-4" <?php echo($selected["21"]);?>>JEFE/A DE AUXILIARES DOCENTES</option>
                                    <option value="1-5" <?php echo($selected["22"]);?>>MAESTRO/A COORDINADOR/A</option>
                                    <option value="1-6" <?php echo($selected["23"]);?>>PROSECRETARIO/A</option>
                                    <option value="1-7" <?php echo($selected["24"]);?>>SECRETARIO/A</option>
                                    <option value="1-8" <?php echo($selected["25"]);?>>VICEDIRECTOR/A</option>
                                </optgroup>
                                <optgroup label="OTROS">
                                    <option value="4-0" <?php echo($selected["26"]);?>>ESPACIOS NO CURRICULARES</option>
                                    <option value="5-0" <?php echo($selected["27"]);?>>INGRESO A PRIMER AÑO</option>
                                    <option value="6-0" <?php echo($selected["28"]);?>>TAREAS PASIVAS</option>
                                </optgroup>                                
                            </select>

                            <!-- <input type="hidden" id="foco_actual" name="foco" value="<?//php echo($foco);?>"> -->

                        </form>

                    </div>

                </div>
                <div>

                </div>

            </div>

            <?php

                require_once ("conexion.php");

            ?>

            <!-- ACÁ EMPIEZA EL BLOQUE A MODULAR -->

            <table id="tabla_cargo_materia">

                <colgroup>
                    <col class="columna_curso">
                    <col class="columna_docentes">
                    <col class="columna_observacion">
                </colgroup>

                <thead>
                    <tr>
                        <th>CURSO</th>
                        <th>DOCENTE</th>
                        <th>OBSERVACIÓN</th>                        
                    </tr>
                </thead>

                <tbody>

                    <?php 
                    
                        require_once("docentes_materia_cargo.php");

                        for ($fila = 1; $fila <= $cantidad_filas; $fila ++) {

                    ?>

                        <tr><td class="columna_curso"><?php echo($renglon[$fila . "_CURSO"]);?></td><td class="columna_info"><?php echo($renglon[$fila . "_DOCENTES"]=="<vacante>"?"vacante":$renglon[$fila . "_DOCENTES"]);?></td><td class="columna_info"><?php echo($renglon[$fila . "_OBSERVACION"]);?></td></tr>

                    <?php

                        }                        

                    ?>                    

                </tbody>

            </table>

            <!-- ACÁ TERMINA EL BLOQUE A MODULAR -->

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