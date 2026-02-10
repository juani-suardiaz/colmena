<html>

    <head>
    </head>

    <body>

        <!-- ESTABLECEMOS LA CONEXIÓN -->

        <?php

        $host = "localhost";
        $usuario = "root";
        $contrasena = "";
        $BD = "colmena";

        $conexion = mysqli_connect($host,$usuario,$contrasena,$BD);

        ?>

        <!-- RECUPERAMOS Y MOSTRAMOS LOS DATOS -->

        <?php

        $resultado = mysqli_query($conexion, "SELECT * FROM persona WHERE dni = ". $_POST["dni"]);

        $docente = mysqli_fetch_assoc($resultado);

        if ($docente) {

            echo ($docente["DNI"]);
            echo ("<br>");
            echo ($docente["APELLIDO"]);
            echo ("<br>");
            echo ($docente["NOMBRE"]);
            echo ("<br>");
            echo ($docente["FECHA_NAC"]);
            echo ("<br>");
            echo ($docente["SEXO"]);
            echo ("<br>");
            echo ($docente["DOMICILIO_DOCENTE"]);

        } else {

            echo ("No existen docentes con ese DNI.");

        }

        ?>

        <!-- CERRAMOS LA CONEXIÓN -->

        <?php

        mysqli_close($conexion);

        ?>

    </body>

</html>
