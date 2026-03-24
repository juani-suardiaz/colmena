<?php

    session_start();

    if (isset($_POST["id_persona"]) == false) {

        header("Location: buscar_persona.php");

        exit();

    }

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

<!DOCTYPE html>

<html lang="es">

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

            <?php

                if ($persona["actuacion"] == 1 || ( $persona["actuacion"] == 0 && isset($_SESSION["nombre"]) )) {

            ?>            

            function mostrar_ventana () {

                document.getElementById("fondo_fantasma").style.display = "flex";

            }

            function cerrar_ventana() {
                
                document.getElementById("fondo_fantasma").style.display = "none";

            }

            <?php
            
                }

            ?>            

            <?php

                $disponible = false;

                if ($persona["actuacion"] == 0 && isset($_SESSION["nombre"]) ) {

                    $disponible = true;

            ?>            

            function visible() {

                switch (document.getElementById("menu_constancia").value) {

                    case "1" :
                            document.getElementById("datos_asistencia").style.visibility = "hidden";
                            document.getElementById("boton_borrar").style.display = "none";
                            break;
                    case "2" :
                            document.getElementById("datos_asistencia").style.visibility = "visible";
                            document.getElementById("boton_borrar").style.display = "inline";
                            break;

                }
                
            }

            function borrar_campos() {

                document.getElementById("fecha_asistencia").value = "";
                document.getElementById("inicio_asistencia").value = "";
                document.getElementById("fin_asistencia").value = "";
                document.getElementById("motivo_asistencia").value = "";
                
            }            

            <?php
            
                }

            ?>

            <?php

                if ($persona["actuacion"] == 1 || ( $persona["actuacion"] == 0 && isset($_SESSION["nombre"]) )) {

            ?>

            function emitir_constancia () {

                    switch (document.getElementById("menu_constancia").value) {

                        case "1" :
                                destino = <?php echo($persona["actuacion"]?"'constancia_estudiante.php';":"'constancia_docente.php';");?>
                                break;
                        case "2" :
                                destino = <?php echo($persona["actuacion"]?"'constancia_estudiante_2.php';":"'constancia_docente_2.php';");?>
                                break;

                    }

                    if (destino == "constancia_docente_2.php") {

                        document.getElementsByName("fecha")[0].value = document.getElementById("fecha_asistencia").value;
                        document.getElementsByName("hora_inicio")[0].value = document.getElementById("inicio_asistencia").value;
                        document.getElementsByName("hora_fin")[0].value = document.getElementById("fin_asistencia").value;
                        document.getElementsByName("motivo")[0].value = document.getElementById("motivo_asistencia").value;

                    }

                    document.getElementById("formulario_constancia").action = destino;

                    document.getElementById("formulario_constancia").submit();

                    cerrar_ventana();

            }

            <?php
            
                }

            ?>

        </script>

    </head>

    <body>

        <!-- -->

        <?php

            if ($persona["actuacion"] == 1 || ( $persona["actuacion"] == 0 && isset($_SESSION["nombre"]) )) {

        ?>
        
        <div id="fondo_fantasma" style="display: none; justify-content: center; align-items: center; height: 100vh; width:100vw; top: 0; left: 0; bottom: 0; right: 0; background-color: rgba(0,0,0,0.5); position: fixed; font-family: calibri; z-index: 1;">

            <div style="background-color: AntiqueWhite; width: 500px; min-height: 200px; display: flex; flex-direction: column; justify-content: center; border-radius: 15px; padding-bottom: 5px">
                
                <h3 style="text-align: center; margin: 0 0 20px 0;">TIPO DE CONSTANCIA</h3>

                <div style="text-align: center;  margin-bottom: 20px;">

                    <select style="width: 200px;" name="tipo_constancia" id="menu_constancia" <?php echo($disponible?'onchange="visible()"':'');?>>

                        <option value="1" selected>
                            <?php echo($persona["actuacion"]?"ALUMNO REGULAR":"PERTENECE");?>
                        </option>

                        <option value="2">
                            <?php echo($persona["actuacion"]?"MATRICULADO":"CONCURRIÓ");?>
                        </option>

                    </select>

                </div>

                <div id="datos_asistencia" style="display: flex; flex-direction: column; justify-content: center; gap: 20px; margin-bottom: 20px; visibility: hidden;">

                    <div style="display: flex; flex-direction: row; justify-content: center; gap: 20px;">

                        <input id="fecha_asistencia" type="date">

                        <input id="inicio_asistencia" type="time">

                        <input id="fin_asistencia" type="time">

                    </div>

                    <div style="display: flex; flex-direction: row; justify-content: center;">

                        <input type="text" id="motivo_asistencia" maxlength="300" style="width: 300px;">

                    </div>

                </div>

                <div style="display: flex; flex-direction: row; justify-content: center; gap: 20px;">

                    <button style="width: 100px;" onclick="cerrar_ventana();">CANCELAR</button>
                    <button id="boton_borrar" style="width: 100px; display: none;" onclick="borrar_campos();">BORRAR</button>
                    <button style="width: 100px;" onclick="emitir_constancia();">EMITIR</button>

                </div>

            </div>

        </div>

        <?php
        
            }

        ?>
        
        <!-- -->

        <?php

            require_once "cabecera.php";

            imprimir_cabecera(2);

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

                <?php

                    $instruccion = "SELECT * " .
                                    "FROM estudiante_curso " .
                                    "WHERE dni = " . $_POST["id_persona"] . " ";
                                    "ORDER BY anio, curso;";

                    //echo $instruccion;

                    $resultado = mysqli_query($conexion, $instruccion);

                    $registro = mysqli_fetch_assoc($resultado);

                ?>

                <div class="fila">
                    <div class="etiqueta">DIVISIONES</div>
                    <div class="valor">
                        
                        <?php

                            $primero = true;

                            $cont = 0;

                            $renglon = [];

                            while ($registro) {

                                if ($primero) {

                                    $cont++;

                                    $renglon[$cont . "_ANIO"] = $registro["ANIO"];
                                    $renglon[$cont . "_CURSO"] = $registro["CURSO"];

                                } else {

                                    if ($registro["ANIO"] == $registro_anterior["ANIO"]) {

                                        $renglon[$cont . "_CURSO"] = $renglon[$cont . "_CURSO"] . " - " . $registro["CURSO"];

                                    } else {

                                        $cont++;

                                        $renglon[$cont . "_ANIO"] = $registro["ANIO"];
                                        $renglon[$cont . "_CURSO"] = $registro["CURSO"];

                                    }

                                }

                                $registro_anterior = $registro;

                                $registro = mysqli_fetch_assoc($resultado);

                                $primero = false;

                            }

                            if ($cont > 0) {

                                for ($i = 1; $i <= $cont; $i++) {

                                    echo($renglon[$i . "_ANIO"] . ": " . $renglon[$i . "_CURSO"]);
                                    
                                    if ($i < $cont) {

                                        echo("<br>");

                                    }

                                }                            

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

            <?php

                if ($persona["actuacion"] == 1 || ( $persona["actuacion"] == 0 && isset($_SESSION["nombre"]) )) {

            ?>            

            <div id="botones">

                <form id="formulario_constancia" action="" method="post" target="_blank">

                    <input type="hidden" name="apellido_nombres" value="<?php echo($persona["apellido"] . ", " . $persona["nombre"]);?>">

                    <input type="hidden" name="dni" value="<?php echo($persona["dni"]);?>">

                    <input type="hidden" name="sexo" value="<?php echo($persona["sexo"]);?>">

                    <input type="hidden" name="fecha" value="">

                    <input type="hidden" name="hora_inicio" value="">

                    <input type="hidden" name="hora_fin" value="">

                    <input type="hidden" name="motivo" value="">

                    <input type="button" value="EMITIR CONSTANCIA" style="height: 30px;" onclick="mostrar_ventana();">

                </form>

            </div>

            <?php

                }
            
            ?>            

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

