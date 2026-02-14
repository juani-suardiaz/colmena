<?php

    $instruccion = "SELECT *" .
                    " FROM docente_curso, persona, docente" .
                    " WHERE" .
                    " docente_curso.dni = persona.dni" .
                    " AND" .
                    " persona.dni = docente.dni" .
                    " AND" .
                    " ANIO = " . $anio .
                    " AND" .
                    " DIVISION = " . $division .
                    " ORDER BY ROL, FUNCION, PUESTO, DESIGNACION;";

    //echo $instruccion;

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $registro_anterior = $registro;

    $primero = true;

    while ($registro) {

        if ($primero) {

            $docente[$registro["FUNCION"] . "_titular"] = $registro["APELLIDO"] . ", " . $registro["NOMBRE"] . " (" . $registro["LEGAJO"] . ")";

            $primero = false;

            if ($registro["REVISTA"] == 4) {

                $revista[$registro["FUNCION"]] = true;

            } else {

                $revista[$registro["FUNCION"]] = false;

            }

        } else {

            if ($registro["FUNCION"] <> $registro_anterior["FUNCION"]){

                //$docente[$registro["FUNCION"] . "_titular"] = $registro["DNI"];

                $docente[$registro["FUNCION"] . "_titular"] = $registro["APELLIDO"] . ", " . $registro["NOMBRE"] . " (" . $registro["LEGAJO"] . ")";

                if ($registro["REVISTA"] == 4) {

                    $revista[$registro["FUNCION"]] = true;

                } else {

                    $revista[$registro["FUNCION"]] = false;

                }

            } else {

                if ($registro["REVISTA"] <> $registro_anterior["REVISTA"]) {

                    //$docente[$registro["FUNCION"] . "_suplente"] = $registro["DNI"];

                    $docente[$registro["FUNCION"] . "_suplente"] = $registro["APELLIDO"] . ", " . $registro["NOMBRE"] . " (" . $registro["LEGAJO"] . ")";

                } else {

                    //$docente[$registro["FUNCION"] . "_suplente"] = $docente[$registro["FUNCION"] . "_suplente"] . " - " . $registro["DNI"];

                    $docente[$registro["FUNCION"] . "_suplente"] = $docente[$registro["FUNCION"] . "_suplente"] . " - " . $registro["APELLIDO"] . ", " . $registro["NOMBRE"] . " (" . $registro["LEGAJO"] . ")";

                }

            }

            $registro_anterior = $registro;

        }

        $registro = mysqli_fetch_assoc($resultado);

    }

    //-

    for ($i = 1; $i <= 17; $i++) {

        // titular - interino

        if (isset($docente[$i . "_titular"]) == false ) {

            $docente[$i . "_titular"] = "";

            $fondo_titular[$i] = "";

        } else {

            if ($revista[$i]) {

                $fondo_titular[$i] = "style='background-color: orange;'";

            } else {

                $fondo_titular[$i] = "";

            }

        }

        // suplentes

        if (isset($docente[$i . "_suplente"]) == false ) {

            $docente[$i . "_suplente"] = "";

        }        

    }

    //-------- auxiliar docente

    if ($anio == 1) {

        $instruccion = "SELECT * FROM planta_funcional WHERE ROL = 1 AND FUNCION = 5 AND CURSO = '" . $curso . "'";

    } else {

        $instruccion = "SELECT * FROM planta_funcional WHERE ROL = 1 AND FUNCION = 1 AND CURSO = '" . $curso . "'";

    }

    $instruccion = $instruccion . " ORDER BY DESIGNACION DESC;";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $registro_anterior = $registro;

    $primero = true;

    while ($registro) {

        if ($primero) {

            $docente["auxiliar"] = $registro["DOCENTES"];

            $primero = false;

        } else {

            if ($registro["DESIGNACION"] <> 0) {

                $docente["auxiliar"] = $registro["DOCENTES"] . " \ " . $docente["auxiliar"];

            }

            $registro_anterior = $registro;

        }

        $registro = mysqli_fetch_assoc($resultado);

    }

    //--------

?>