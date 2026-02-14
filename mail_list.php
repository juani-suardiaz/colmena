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

        </style>

    </head>
    <body>

        <?php 

            require_once "cabecera.php";

            imprimir_cabecera(5);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

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