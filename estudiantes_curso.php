<?php

    // PRIMERO: averiguamos la cantidad de filas que hay que imprimir en las tablas de estudiantes

    $instruccion = "SELECT COUNT(DNI) AS cantidad FROM estudiante_curso WHERE ANIO = year(CURRENT_DATE()) and curso = '" . $curso . "'; ";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $cantidad_filas = $registro["cantidad"];

    // SEGUNDO: creamos la matriz con los nombres y dni de los estudiantes

    $instruccion = "SELECT *" .
                    " FROM estudiante_curso, persona, estudiante" .
                    " WHERE" .
                    " estudiante_curso.dni = persona.dni" .
                    " AND" .
                    " persona.dni = estudiante.dni" .
                    " AND" .
                    " ANIO = year(CURRENT_DATE())" .
                    " AND" .
                    " CURSO = '" . $curso . "'" .
                    " ORDER BY PERSONA.APELLIDO, PERSONA.NOMBRE, PERSONA.DNI;";

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    for ($fila = 1; $fila <= $cantidad_filas; $fila ++) {

        $estudiante[$fila . "nombre"] = $registro["APELLIDO"] . ", " . $registro["NOMBRE"];
        $estudiante[$fila . "dni"] = $registro["DNI"];

        $registro = mysqli_fetch_assoc($resultado);

    }

    // TERCERO: creamos la matriz con los teléfonos de los estudiantes

    $instruccion = "SELECT t.DNI, t.apellido, t.NOMBRE, t.CURSO, persona_telefono.TELEFONO" .
                    " FROM" .
                    " (" .
                    " SELECT persona.DNI, persona.apellido, persona.NOMBRE, estudiante_curso.CURSO" .
                    " FROM" .
                    " persona," .
                    " estudiante," .
                    " estudiante_curso" .
                    " WHERE" .
                    " persona.dni = estudiante.DNI" .
                    " AND" .
                    " estudiante.dni = estudiante_curso.DNI" .
    	            " AND estudiante_curso.CURSO = '" . $curso . "'" .
                    " ) AS t" .
                    " LEFT JOIN" .
                    " persona_telefono" .
                    " ON t.DNI = persona_telefono.DNI" .
                    " ORDER BY t.DNI;";                    

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $registro_anterior = $registro;

    $primero = true;

    while ($registro) {

        if ($primero) {

            if (is_null($registro["TELEFONO"])) {

                $telefono[$registro["DNI"]] = "";

            } else {

                $telefono[$registro["DNI"]] = $registro["TELEFONO"];

            }

            $primero = false;

        } else {

            if ($registro["DNI"] == $registro_anterior["DNI"]) {

                $telefono[$registro["DNI"]] = $telefono[$registro["DNI"]] . ", " . $registro["TELEFONO"];

            } else {

                if (is_null($registro["TELEFONO"])) {

                    $telefono[$registro["DNI"]] = "";

                } else {

                    $telefono[$registro["DNI"]] = $registro["TELEFONO"];

                }

            }

            $registro_anterior = $registro;

        }

        $registro = mysqli_fetch_assoc($resultado);

    }

    // CUARTO: creamos la matriz con los correos de los estudiantes

?>

