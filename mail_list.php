<?php

    session_start();

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Colmena ECBC</title>

        <link rel="stylesheet" href="estilos.css">

        <link rel="icon" href="imagenes/emoji.svg" type="image/svg+xml">

        <style>

            body {
                font-family: calibri;
                margin-top: 0;
                margin-bottom: 0;
                background-color: rgb(212, 216, 221);
            }

            #boton_generar {
                height: 100%;
            }

            #tabla_correos {
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid black;
                padding: 0 5px 0 5px;
            }

            #celda_boton{
                padding-top: 5px;
                padding-bottom: 5px;
            }

        </style>

        <script>

            function enviar_formulario () {

                if (confirm("Confirma la carga del listado de correos?")) {

                    document.getElementById("formulario").submit();

                }

            }

            function seleccionar_tabla () {

                const tabla = document.getElementById("tabla_correos");

                const rango = document.createRange();
                rango.selectNodeContents(tabla);

                const seleccion = window.getSelection();
                seleccion.removeAllRanges();
                seleccion.addRange(rango);

            }            

            function cargar_eventos () {

                document.getElementById("boton_generar").addEventListener("click", enviar_formulario);

                document.getElementById("boton_seleccionar").addEventListener("click", seleccionar_tabla);

            }

        </script>

    </head>

    <body onload="cargar_eventos()">

        <?php 

            require_once "cabecera.php";

            imprimir_cabecera(5);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

            <div id="caja_generar_listado" style="display: flex; height: 40px; background-color: DarkSalmon; margin-bottom: 10px;">
                
                <div style="display: flex; flex-direction: row; gap: 10px">

                    <div style="padding: 3px 3px 0 4px; color: white; font-size: 26px;">
                        Lista de correos docentes
                    </div>

                    <div>

                        <form id="formulario" action="mail_list.php" method="post" style="height: 100%">

                            <input type="hidden" name="generar" value="true">
                        
                            <input type="button" id="boton_generar" value="GENERAR LISTADO">

                        </form>

                    </div>

                </div>
                <div>

                </div>

            </div>

            <div id="caja_listado">

                <?php

                    if (isset($_POST["generar"])) {

                ?>

                <table id="tabla_correos">

                    <thead>
                        <tr>
                            <th id="celda_boton" style="text-align:right;" colspan="2">
                                <button id="boton_seleccionar">SELECCIONAR TODO</button>                                
                            </th>
                        </tr>
                        <tr>
                            <th>DOCENTE</th>
                            <th>CORREOS</th>                            
                        </tr>
                    </thead>
                    <tbody>

                <?php

                        require_once ("conexion.php");

                        $instruccion = "SELECT DNI, DOCENTE, EMAIL FROM mail_list_alfa ORDER BY DOCENTE, EMAIL;";

                        $resultado = mysqli_query($conexion, $instruccion);

                        $registro = mysqli_fetch_assoc($resultado);

                        $primero = true;

                        $cont = 0;

                        $renglon = [];

                        while ($registro) {

                            if ($primero) {

                                $cont++;

                                $renglon[$cont . "_DOCENTE"] = $registro["DOCENTE"];
                                $renglon[$cont . "_EMAIL"] = $registro["EMAIL"] . ";";

                            } else {

                                if ($registro["DNI"] == $registro_anterior["DNI"]) {

                                    $renglon[$cont . "_EMAIL"] = $renglon[$cont . "_EMAIL"] . " " . $registro["EMAIL"] . ";";

                                } else {

                                    $cont++;

                                    $renglon[$cont . "_DOCENTE"] = $registro["DOCENTE"];
                                    $renglon[$cont . "_EMAIL"] = $registro["EMAIL"] . ";";

                                }

                            }

                            $registro_anterior = $registro;

                            $registro = mysqli_fetch_assoc($resultado);

                            $primero = false;

                        }

                        for ($i = 1; $i <= $cont; $i++) {

                ?>

                        <tr>
                            <td><?php echo($renglon[$i . "_DOCENTE"]); ?></td>
                            <td><?php echo($renglon[$i . "_EMAIL"]); ?></td>
                        </tr>                

                <?php

                        }

                ?>

                    </tbody>

                </table>

                <?php

                        require_once ("desconexion.php");

                    }

                ?>
            
            </div>

        </div>

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