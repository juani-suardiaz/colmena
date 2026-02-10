<?php

    session_start();

    if (isset($_POST["id_persona"]) == false) {

        header("Location: buscar_persona.php");

        exit();

    }

?>

<!DOCTYPE html>

<html lang="es">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ficha de la persona</title>

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
                padding: 4px;
                margin-bottom: 20px;
                color: #4d4a49;
                font-size: 40px;
                font-weight: bold;
                display: flex;
                flex-direction: row;
            }

            .persona {
                width: 85%;
            }

            .rol {
                width: 15%;
                border: 1px solid black;
                text-align: center;
            }

            .persona, .rol {
                padding: 6px 12px;
            }

            .resultado_estudiante {
                background-color: LightSteelBlue;
            }

            .resultado_docente {
                background-color: Turquoise;
            }

            #ficha_datos {
                display: flex;
                flex-direction: column;
                border-collapse: collapse;
                width: 1000px;
            }

            #ficha_estudiante {
                display: flex;
                flex-direction: column;
                border-collapse: collapse;
                width: 1000px;
            }

            #ficha_docente {
                display: flex;
                flex-direction: column;
                border-collapse: collapse;
                width: 1000px;
            }            

            /* Fila */
            .fila {
                display: flex;
                margin-bottom: 8px;
            }

            /* Columna etiqueta */
            .etiqueta {
                width: 200px;
                background-color: #a7a5a2;
                
                font-weight: bold;
                padding: 10px;
                min-width: 150px;
                text-transform: uppercase;
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }

            /* Columna valor */
            .valor {
                border: 1px solid #a7a5a2;
                padding: 10px;
                flex-grow: 1;
                
                width: 400px;
            }

            #atras {
                padding-top: 6px;
                padding-bottom: 6px;
                cursor: pointer;
            }

        </style>

        <script>

            function atras () {

                document.getElementById("vuelta_atras").submit();

            }

            function emitir_constancia () {

                if (confirm("Confirma la emisión de la constancia?")) {

                    document.getElementById("formulario_constancia").submit();

                }

            }

        </script>

    </head>

    <body>

        <?php

            require_once "cabecera.php";

            imprimir_cabecera(2);

        ?>

        <!-- ESTABLECEMOS LA CONEXIÓN -->

        <?php

            require_once ("conexion.php");

        ?>

        <!-- RECUPERAMOS LOS DATOS -->

        <?php

            $instruccion = "SELECT persona.dni, apellido, nombre, fecha_nac, sexo, actuacion, domicilio_persona " .
                            "FROM persona " .
                            "WHERE persona.dni = " . $_POST["id_persona"] . ";";

            //echo $instruccion;

            $resultado = mysqli_query($conexion, $instruccion);

            $persona = mysqli_fetch_assoc($resultado);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

            <div id="atras">
                
                <form id="vuelta_atras" action="buscar_persona.php" method="post">

                    <span onclick="atras();"><< VOLVER</span>

                    <input type="hidden" name="apellido" value="<?php echo($_POST['apellido_busqueda'])?>">
                    <input type="hidden" name="nombre" value="<?php echo($_POST['nombre_busqueda'])?>">
                    <input type="hidden" name="dni" value="<?php echo($_POST['dni_busqueda'])?>">

                </form>
                
            
            </div>

            <!-- Lista de resultados -->

            <!-- Encabezado -->
            <div class="header <?php echo ($persona["actuacion"]==0?"resultado_docente":"resultado_estudiante")?>">
                <div class="persona"><?php echo($persona["apellido"] . ", " . $persona["nombre"]) ?></div>
                <div class="rol"><?php echo ($persona["actuacion"]==0?"DOCENTE":"ESTUDIANTE")?></div>
            </div>

            <!-- Ficha de datos -->
            <div id="ficha_datos">

                <div class="fila">
                    <div class="etiqueta">DNI</div>
                    <div class="valor"><?php echo($persona["dni"]) ?></div>
                </div>

                <div class="fila">
                    <div class="etiqueta">CUIL</div>
                    <div class="valor">

                        <?php
                        
                            require_once ("cuil.php");

                            echo( cuil($persona["dni"], $persona["sexo"]) );

                        ?>

                    </div>
                </div>

                <div class="fila">
                    <div class="etiqueta">FECHA NACIMIENTO</div>
                    <div class="valor"><?php echo (date("d-m-Y", strtotime($persona["fecha_nac"]))) ?></div>
                </div>

                <div class="fila">
                    <div class="etiqueta">EDAD</div>
                    <div class="valor">

                        <?php
                        
                            require_once ("edad.php");

                            echo( edad(strtotime($persona["fecha_nac"])) . " años" );

                        ?>

                    </div>
                </div>

                <div class="fila">
                    <div class="etiqueta">DOMICILIO</div>
                    <div class="valor"><?php echo($persona["domicilio_persona"]) ?></div>
                </div>

                <div class="fila">
                    <div class="etiqueta">TELÉFONOS</div>
                    <div class="valor">

                        <?php

                            $instruccion = "SELECT telefono " .
                                            "FROM persona_telefono " .
                                            "WHERE persona_telefono.dni = " . $_POST["id_persona"] . ";";

                            //echo $instruccion;

                            $resultado = mysqli_query($conexion, $instruccion);

                            $telefono = mysqli_fetch_assoc($resultado);

                            $primero = true;

                            while ($telefono) {

                                if ($primero == false) {
                                    
                                    echo("<br>");

                                }                                

                                echo($telefono["telefono"]);

                                $telefono = mysqli_fetch_assoc($resultado);

                                $primero = false;

                            }
                    
                        ?>

                    </div>
                </div>

                <div class="fila">
                    <div class="etiqueta">MAILS</div>
                    <div class="valor">

                        <?php

                            $instruccion = "SELECT email " .
                                            "FROM persona_email " .
                                            "WHERE persona_email.dni = " . $_POST["id_persona"] . ";";

                            //echo $instruccion;

                            $resultado = mysqli_query($conexion, $instruccion);

                            $correo = mysqli_fetch_assoc($resultado);

                            $primero = true;

                            while ($correo) {

                                if ($primero == false) {
                                    
                                    echo("<br>");

                                }                                

                                echo($correo["email"]);

                                $correo = mysqli_fetch_assoc($resultado);

                                $primero = false;

                            }
                    
                        ?>

                    </div>
                </div>            

            </div>

            <?php

                if ($persona["actuacion"]==1) {

                    $instruccion = "SELECT parentezco, nombre_pariente " .
                                    "FROM estudiante_allegados " .
                                    "WHERE estudiante_allegados.dni = " . $_POST["id_persona"] . ";";

                    //echo $instruccion;

                    $resultado = mysqli_query($conexion, $instruccion);

                    $estudiante = mysqli_fetch_assoc($resultado);

            ?>

                <div id="ficha_estudiante">

                    <div class="fila">
                        <div class="etiqueta">ALLEGADOS</div>
                        <div class="valor">
                            
                            <?php

                                $primero = true;

                                while ($estudiante) {

                                    if ($primero == false) {
                                        
                                        echo("<br>");

                                    }                                

                                    echo($estudiante["parentezco"] . ": ". $estudiante["nombre_pariente"]);

                                    $estudiante = mysqli_fetch_assoc($resultado);

                                    $primero = false;

                                }
                        
                            ?>

                        </div>
                    </div>
                    
                </div>

            <?php

                } else {

                    $instruccion = "SELECT legajo, expediente_numero, expediente_anio, titulo " .
                                    "FROM docente " .
                                    "WHERE docente.dni = " . $_POST["id_persona"] . ";";

                    //echo $instruccion;

                    $resultado = mysqli_query($conexion, $instruccion);

                    $docente = mysqli_fetch_assoc($resultado);                

            ?>

                <div id="ficha_docente">

                    <div class="fila">
                        <div class="etiqueta">LEGAJO</div>
                        <div class="valor"><?php echo($docente["legajo"]); ?></div>
                    </div>

                    <div class="fila">
                        <div class="etiqueta">EXPEDIENTE</div>
                        <div class="valor"><?php echo($docente["expediente_numero"] . "/" . $docente["expediente_anio"]);  ?></div>
                    </div>

                    <div class="fila">
                        <div class="etiqueta">TÍTULO/S</div>
                        <div class="valor"><?php echo($docente["titulo"]); ?></div>
                    </div>
                    
                </div>            

            <?php

                }

            ?>

            <div id="botones">

                <form id="formulario_constancia" action="<?php echo($persona["actuacion"]?"constancia_estudiante.php":"constancia_docente.php");?>" method="post" target="_blank">

                    <input type="hidden" name="apellido_nombres" value="<?php echo($persona["apellido"] . ", " . $persona["nombre"]);?>">

                    <input type="hidden" name="dni" value="<?php echo($persona["dni"]);?>">

                    <input type="hidden" name="sexo" value="<?php echo($persona["sexo"]);?>">

                    <?php

                        if ($persona["actuacion"] == 1 || ( $persona["actuacion"] == 0 && isset($_SESSION["nombre"]) )) {

                    ?>

                            <input type="button" value="EMITIR CONSTANCIA" style="height: 30px;" onclick="emitir_constancia();">

                    <?php

                        }
                    
                    ?>

                </form>

            </div>

            <!-- CERRAMOS LA CONEXIÓN -->

            <?php

                require_once("desconexion.php");

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

