<?php

    // PRIMERO: averiguamos la cantidad de filas que hay que imprimir en la tabla de la materia o cargo

    $instruccion = "SELECT count(*) as cantidad".
                    " FROM".
                    " (".
                    " SELECT DISTINCT rol, funcion, puesto FROM `planta_funcional` WHERE rol = " . $rol;

    if ($rol == 1 || $rol == 2) {

        $instruccion = $instruccion . " AND funcion = " . $funcion;

    }

    $instruccion = $instruccion . " ) as t;";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $cantidad_filas = $registro["cantidad"];

    // SEGUNDO: creamos la matriz con los nombres y dni de los estudiantes

    $instruccion = "SELECT * FROM planta_funcional WHERE ROL = {$rol}";

    if ($rol == 1 || $rol == 2) {

        $instruccion = $instruccion . " AND FUNCION = {$funcion}";

    }

    // if ($rol == 1 && $funcion == 1) {

    //     $instruccion = $instruccion . " ORDER BY CURSO, ROL, FUNCION, PUESTO, DESIGNACION DESC;";

    // } else {

        $instruccion = $instruccion . " ORDER BY ROL, FUNCION, PUESTO, DESIGNACION DESC;";

    //}

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $registro_anterior = $registro;

    $primero = true;

    // Si es un cargo o una materia

    if ($rol == 1 || $rol == 2) {

        while ($registro) {

            if ($primero) {

                $renglon[$registro["PUESTO"] . "_CURSO"] = $registro["CURSO"];
                $renglon[$registro["PUESTO"] . "_DOCENTES"] = $registro["DOCENTES"];

                if ( ($registro["ROL"] == 1 && $registro["FUNCION"] == 1 && $registro["PUESTO"] >= 1 && $registro["PUESTO"] <= 20) ||
                     ($registro["ROL"] == 1 && $registro["FUNCION"] == 5) ||
                     ($registro["ROL"] == 2) ) {

                    $renglon[$registro["PUESTO"] . "_OBSERVACION"] = "";

                } else {

                    $renglon[$registro["PUESTO"] . "_OBSERVACION"] = $registro["OBSERVACION"];

                }

                $primero = false;

            } else {

                if ($registro["PUESTO"] <> $registro_anterior["PUESTO"]){

                    $renglon[$registro["PUESTO"] . "_CURSO"] = $registro["CURSO"];
                    $renglon[$registro["PUESTO"] . "_DOCENTES"] = $registro["DOCENTES"];

                    if ( ($registro["ROL"] == 1 && $registro["FUNCION"] == 1 && $registro["PUESTO"] >= 1 && $registro["PUESTO"] <= 20) ||
                         ($registro["ROL"] == 1 && $registro["FUNCION"] == 5) ||
                         ($registro["ROL"] == 2) ) {

                        $renglon[$registro["PUESTO"] . "_OBSERVACION"] = "";

                    } else {

                        $renglon[$registro["PUESTO"] . "_OBSERVACION"] = $registro["OBSERVACION"];

                    }

                } else {

                    if ($registro["DESIGNACION"] <> 0) {

                        $renglon[$registro["PUESTO"] . "_DOCENTES"] = $registro["DOCENTES"] . " \ " . $renglon[$registro["PUESTO"] . "_DOCENTES"];

                    }

                }

                $registro_anterior = $registro;

            }

            $registro = mysqli_fetch_assoc($resultado);

        }

    } else {

    // Si es TALLER, ESPACIO NO CURRICULAR, INGRESO, TAREA PASIVA, etc.

        $cont = 1;
    
        while ($registro) {

            if ($primero) {

                $renglon[$cont . "_CURSO"] = $registro["CURSO"];
                $renglon[$cont . "_DOCENTES"] = $registro["DOCENTES"];
                $renglon[$cont . "_OBSERVACION"] = $registro["OBSERVACION"];

                $primero = false;

                $cont++;

            } else {

                if ($registro["FUNCION"] <> $registro_anterior["FUNCION"] || $registro["PUESTO"] <> $registro_anterior["PUESTO"]){

                    $renglon[$cont . "_CURSO"] = $registro["CURSO"];
                    $renglon[$cont . "_DOCENTES"] = $registro["DOCENTES"];
                    $renglon[$cont . "_OBSERVACION"] = $registro["OBSERVACION"];

                    $cont++;

                } else {

                    if ($registro["DESIGNACION"] <> 0) {

                        $renglon[$cont - 1 . "_DOCENTES"] = $registro["DOCENTES"] . " \ " . $renglon[$cont - 1 . "_DOCENTES"];

                    }

                }

                $registro_anterior = $registro;

            }

            $registro = mysqli_fetch_assoc($resultado);

        }    
        
    }    

?>