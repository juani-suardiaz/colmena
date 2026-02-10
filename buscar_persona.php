<?php

    session_start();

?>

<html>

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Ficha personal</title>

        <link rel="stylesheet" href="estilos.css">

        <style>

            body {
                font-family: calibri;
                margin-top: 0;
                margin-bottom: 0;
                background-color: rgb(212, 216, 221);
            }

            /* Encabezado */
            .header {
                background-color: #ff781f;
                color: #fff;
                padding: 10px 15px;
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 20px;
            }

            /* Contenedor de resultados */
            .resultados {
                display: flex;
                flex-direction: column;
                gap: 5px;
                width: 800px;
            }

            .resultado_estudiante, .resultado_docente {
                display: flex;
                align-items: center;
                padding: 4px;
            }

            .resultado_estudiante {
                background-color: LightSteelBlue;
            }

            .resultado_docente {
                background-color: Turquoise;
            }

            .resultado_estudiante:hover, .resultado_docente:hover {
                opacity: 0.6;
                cursor: pointer;
            }

            /* Nombre */
            .nombre {
                flex-grow: 1;
                padding: 6px 10px;
                margin-top: 0px;
            }

            /* Rol */
            .rol {
                border: 1px solid black;
                padding: 6px 12px;
                font-weight: bold;
                color: #4d4a49;
                text-align: center;
                min-width: 100px;
                margin-left: 10px;
            }

        </style>

        <script>

            function dni_valido (dni) {

                for (var i = 0; i < dni.length; i++) {

                    if (dni[i] != "0" && dni[i] != "1" && dni[i] != "2" && dni[i] != "3" && dni[i] != "4" && dni[i] != "5" && dni[i] != "6" && dni[i] != "7" && dni[i] != "8" && dni[i] != "9")  {

                        return false

                    }

                }

                return true

            }

            function enviar_formulario () {

                var apellido = document.getElementById("campo_apellido").value
                var nombre = document.getElementById("campo_nombre").value
                var dni = document.getElementById("campo_dni").value

                if (apellido == "" && nombre == "" && dni == "") {

                    alert("Introduzca algún dato para la búsqueda")

                } else {

                    if (dni_valido(dni) == false ) {

                        alert("El DNI sólo puede contener números.")

                    } else {

                        document.getElementById("formulario").submit()

                    }

                }

            }            

            function enviar_formulario_2 () {

                document.getElementById("formulario_2").submit()

            }

            borrado = false

            function resetear_campos(elemento) {

                if (borrado == false) {

                    switch (elemento) {

                        case 1:
                            document.getElementById("campo_nombre").value = "";
                            document.getElementById("campo_dni").value = "";
                            break;
                        case 2:
                            document.getElementById("campo_apellido").value = "";
                            document.getElementById("campo_dni").value = "";
                            break;
                        case 3:
                            document.getElementById("campo_apellido").value = "";
                            document.getElementById("campo_nombre").value = "";
                            break;

                    }

                    borrado = true

                }

            }

            function testear_tecla (evento) {

                if (evento.key === "Enter") {

                    enviar_formulario();

                }

            }

            function cargar_eventos() {

                // Se cargan los evantos de tecla ENTER en los campos de búsqueda

                document.getElementById("campo_apellido").addEventListener("keypress", function(evento){ testear_tecla(evento) });
                document.getElementById("campo_nombre").addEventListener("keypress", function(evento){ testear_tecla(evento) });
                document.getElementById("campo_dni").addEventListener("keypress", function(evento){ testear_tecla(evento) });

                // Se cargan los eventos onlick en las fila del resultado de búsqueda

                let registro = document.querySelectorAll(".resultado_estudiante, .resultado_docente");

                for (let i = 0; i < registro.length; i++) {

                    registro[i].addEventListener("click", function (evento) {

                        document.getElementById("dni").value = evento.currentTarget.id;

                        enviar_formulario_2();

                    });

                }

            }

        </script>

    </head>

    <body onload="cargar_eventos()">

        <?php 
        
            require_once ("cabecera.php");

            imprimir_cabecera(2);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

            <div class="header">

                Inserte los datos para la búsqueda

            </div>

            <?php 
            
                if (isset($_POST['apellido']) == false) {

                    $valor_apellido = "";
                    $valor_nombre = "";
                    $valor_dni = "";

                } else {

                    $valor_apellido = $_POST['apellido'];
                    $valor_nombre = $_POST['nombre'];
                    $valor_dni = $_POST['dni'];

                }
            
            ?>

            <form id="formulario"  method="post" action="buscar_persona.php">

                <div style="display: flex; flex-direction: row;">

                    <div style="flex: 1; display: flex; flex-direction: column;">
                        <label for="campo_apellido" style="flex: 1;">APELLIDO</label>
                        <input type="text" id="campo_apellido" name="apellido" style="flex: 1; margin-right: 30px;" value="<?php echo($valor_apellido);?>" oninput="resetear_campos(1);">
                    </div>

                    <div style="flex: 1; display: flex; flex-direction: column;">
                        <label for="campo_nombre" style="flex: 1;">NOMBRE</label>
                        <input type="text" id="campo_nombre" name="nombre" style="flex: 1; margin-right: 30px;" value="<?php echo($valor_nombre);?>" oninput="resetear_campos(2);">
                    </div>
                    
                    <div style="flex: 1; display: flex; flex-direction: column;">
                        <label for="campo_dni" style="flex: 1;">DNI</label>
                        <input type="text" id="campo_dni" name="dni" style="flex: 1; margin-right: 30px;" value="<?php echo($valor_dni);?>"  oninput="resetear_campos(3);">
                    </div>
                    
                    <div style="flex: 1;">
                        <div style="color: white">&nbsp;</div>
                        <input type="button" value="BUSCAR" onclick="enviar_formulario();">
                    </div>                  

                </div>

            </form>

            <!-- Encabezado -->
            <div class="header">
                Resultado de la búsqueda
            </div>

            <?php

                if (isset($_POST['apellido']) == false) {

                    echo("<p></p>");

                } else {
                
                    // establecemos la conexión
                    
                    require_once ("conexion.php");

                    // recuperamos y mostramos los datos

                    $apellido = $_POST["apellido"];
                    $nombre = $_POST["nombre"];        
                    $dni =  $_POST["dni"];

                    $instruccion = "SELECT * FROM persona WHERE";

                    $primero = true;

                    if ($dni != "") {

                        $instruccion = $instruccion . " dni = " . $dni;

                        $primero = false;

                    }

                    if ($apellido != "") {

                        if ($primero == false) {

                            $instruccion = $instruccion . " AND";

                        } else {

                            $primero = false;

                        }

                        $instruccion = $instruccion . " apellido LIKE '%" . $apellido . "%'";

                    }

                    if ($nombre != "") {

                        if ($primero == false) {

                            $instruccion = $instruccion . " AND";

                        } else {

                            $primero = false;

                        }

                        $instruccion = $instruccion . " nombre LIKE '%" . $nombre . "%'";

                    }

                    $instruccion = $instruccion . " ORDER BY apellido;";

                    // echo $instruccion;

                    $resultado = mysqli_query($conexion, $instruccion);

                    $persona = mysqli_fetch_assoc($resultado);

                    if ($persona) {

            ?>

                        <form id="formulario_2" class="resultados" method="post" action="ficha_persona.php">

                            <!-- Lista de resultados -->

            <?php

                        while ($persona) {
            
            ?>

                            <div class="<?php echo ($persona["ACTUACION"]==0?"resultado_docente":"resultado_estudiante")?>" id="<?php echo ($persona["DNI"]);?>">
                                
                                <div class="nombre"><?php echo ($persona["APELLIDO"] . ", " . $persona["NOMBRE"] . " (" . $persona["DNI"] .")")?></div>
                                <div class="rol"><?php echo ($persona["ACTUACION"]==0?"DOCENTE":"ESTUDIANTE")?></div>
                                
                            </div>

            <?php

                            $persona = mysqli_fetch_assoc($resultado);

                        }

                    } else {

                        echo("<p>No existen personas con esos datos.</p>");

                    }

            ?>

                            <input type="hidden" name="id_persona" id="dni">
                            <input type="hidden" name="apellido_busqueda" value="<?php echo($apellido);?>">
                            <input type="hidden" name="nombre_busqueda" value="<?php echo($nombre);?>">
                            <input type="hidden" name="dni_busqueda" value="<?php echo($dni);?>">

                        </form>        

            <!-- CERRAMOS LA CONEXIÓN -->

            <?php

                // cerramos la conexión

                require_once("desconexion.php");

            }

            ?>

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