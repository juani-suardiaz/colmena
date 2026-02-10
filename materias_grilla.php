<?php

    $franja_horaria = [
        // turno mañana
        "mañana_1" => "07:30 - 08:30",
        "mañana_2" => "08:35 - 09:35",
        "mañana_3" => "09:45 - 10:45",
        "mañana_4" => "10:50 - 11:50",
        "mañana_5" => "11:55 - 12:55",
        "mañana_6" => "12:55 - 13:10",
        // turno tarde
        "tarde_1" => "13:15 - 14:15",
        "tarde_2" => "14:20 - 15:20",
        "tarde_3" => "15:30 - 16:30",
        "tarde_4" => "16:35 - 17:35",
        "tarde_5" => "17:40 - 18:40",
        "tarde_6" => "18:40 - 19:00"
    ];

    $instruccion = "SELECT *" .
                    " FROM grilla_horaria" .
                    " WHERE" .
                    " ANIO = " . $anio .
                    " AND" .
                    " DIVISION = " . $division .
                    " ORDER BY ANIO, DIVISION, DIA, TURNO, HORA, VEINTENA;";

    //echo $instruccion;

    $resultado = mysqli_query($conexion, $instruccion);

    $registro = mysqli_fetch_assoc($resultado);

    $registro_anterior = $registro;

    $primero = true;

    while ($registro) {

        if ($primero) {

            $materia[$registro["DIA"] . "_" . $registro["HORA"] . "_" . $registro["VEINTENA"]] = $registro["ABREVIATURA"];

            $primero = false;

        } else {

            if ($registro["DIA"] == $registro_anterior["DIA"] 
                and 
                $registro["TURNO"] == $registro_anterior["TURNO"]
                and 
                $registro["HORA"] == $registro_anterior["HORA"]
                and 
                $registro["VEINTENA"] == $registro_anterior["VEINTENA"]) {

                $materia[$registro["DIA"] . "_" . $registro["HORA"] . "_" . $registro["VEINTENA"]] = 
                $materia[$registro["DIA"] . "_" . $registro["HORA"] . "_" . $registro["VEINTENA"]] . " - " . $registro["ABREVIATURA"];

            } else {

                $materia[$registro["DIA"] . "_" . $registro["HORA"] . "_" . $registro["VEINTENA"]] = $registro["ABREVIATURA"];

            }

            $registro_anterior = $registro;

        }

        $registro = mysqli_fetch_assoc($resultado);

    }

    //---

    $salida_veintena = [
        // turno mañana
        "1-1-1" => "07:50",
        "1-1-2" => "08:10",
        "1-1-3" => "08:30",
        "1-2-1" => "08:50",
        "1-2-2" => "09:10",
        "1-2-3" => "09:35",
        "1-3-1" => "10:00",
        "1-3-2" => "10:20",
        "1-3-3" => "10:45",
        "1-4-1" => "11:05",
        "1-4-2" => "11:25",
        "1-4-3" => "11:50",
        "1-5-1" => "12:10",
        "1-5-2" => "12:30",
        "1-5-3" => "12:55",
        "1-6-1" => "13:10",
        // turno tarde
        "2-1-1" => "13:35",
        "2-1-2" => "13:55",
        "2-1-3" => "14:15",
        "2-2-1" => "14:35",
        "2-2-2" => "14:55",
        "2-2-3" => "15:20",
        "2-3-1" => "15:45",
        "2-3-2" => "16:05",
        "2-3-3" => "16:30",
        "2-4-1" => "16:50",
        "2-4-2" => "17:10",
        "2-4-3" => "17:35",
        "2-5-1" => "17:55",
        "2-5-2" => "18_15",
        "2-5-3" => "18:40",
        "2-6-1" => "19:00"
    ];

    for ($dia = 1; $dia <= 5; $dia ++) {

        for ($hora = 1; $hora <= 6; $hora ++) {

            for ($veintena = 1; $veintena <= 3; $veintena ++) {

                if (isset($materia[$dia . "_" . $hora . "_" . $veintena ])) {

                    switch ($dia) {

                        case 1 :
                                $salida_lunes = $salida_veintena[$turno . "-" . $hora . "-" . $veintena ];
                                break;
                        case 2 :
                                $salida_martes = $salida_veintena[$turno . "-" . $hora . "-" . $veintena ];
                                break;
                        case 3 :
                                $salida_miercoles = $salida_veintena[$turno . "-" . $hora . "-" . $veintena ];
                                break;
                        case 4 :
                                $salida_jueves = $salida_veintena[$turno . "-" . $hora . "-" . $veintena ];
                                break;
                        case 5 :
                                $salida_viernes = $salida_veintena[$turno . "-" . $hora . "-" . $veintena ];

                    }

                }

            }

        }

    }

    //--

    for ($dia = 1; $dia <= 5; $dia ++) {

        $bloque = 1;

        $paridad = "bloque_impar";

        for ($hora = 1; $hora <= 6 ; $hora ++) {

            for ($veintena = 1; $veintena <= 3; $veintena ++) {

                if ($hora == 1 && $veintena == 1) {

                    $materia_anterior = $materia[$dia . "_" . $hora . "_" . $veintena];

                    $info_bloque[$dia . "_" . $hora . "_" . $veintena] = "bloque_" . $dia . "_" . $bloque . " " . $paridad;

                    $existe_anterior = true;

                    continue;

                } else {

                    if (isset($materia[$dia . "_" . $hora . "_" . $veintena])) {

                        if ($existe_anterior) {

                            if ($materia[$dia . "_" . $hora . "_" . $veintena] == $materia_anterior) {

                                $materia[$dia . "_" . $hora . "_" . $veintena] = "";

                            } else {

                                $materia_anterior = $materia[$dia . "_" . $hora . "_" . $veintena];

                                $bloque ++;

                                if ($paridad == "bloque_par") {

                                    $paridad = "bloque_impar";

                                } else {

                                    $paridad = "bloque_par";

                                }

                            }

                        } else {

                            $materia_anterior = $materia[$dia . "_" . $hora . "_" . $veintena];

                            $bloque ++;

                            if ($paridad == "bloque_par") {

                                $paridad = "bloque_impar";

                            } else {

                                $paridad = "bloque_par";

                            }                            

                        }

                        $info_bloque[$dia . "_" . $hora . "_" . $veintena] = "bloque_" . $dia . "_" . $bloque . " " . $paridad;

                        $existe_anterior = true;

                    } else {

                        $existe_anterior = false;

                    }

                }

            }

        }

    }

?>