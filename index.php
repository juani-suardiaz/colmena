<?php

    session_start();

?>

<html>

    <head>

        <link rel="stylesheet" href="estilos.css">

        <style>

            body {
                font-family: calibri;
                margin-top: 0;
                margin-bottom: 0;
                background-color: rgb(212, 216, 221);
            }

            #iniciar_sesion, #cerrar_sesion {
                text-decoration: none;
                color: black;
            }

            #iniciar_sesion:hover, #cerrar_sesion:hover {
                text-decoration: underline;
                
            }

            #cerrar_sesion{
                cursor: pointer;
            }

        </style>

        <script>

            function confirmar_cierre() {

                if ( confirm("Está seguro/a que quiere cerrar la sesión?") ) {

                    document.getElementById("formulario_cierre").submit()

                }

            }

        </script>

    </head>

    <body>

        <?php 
        
            require_once "cabecera.php";

            imprimir_cabecera(1);

        ?>

        <div id="caja_principal" style="min-height: 740px;">

            <img src="imagenes/logo.png" alt="" style="opacity:0.2; display: block; margin-left: auto; margin-right: auto; padding-top: 70px; padding-bottom: 90px;">

            <div style="height: 20px; text-align:right; padding-right: 10px">

            <?php
            
                if (isset($_SESSION["nombre"])) {

            ?>

            <form id="formulario_cierre" action="logout.php" method="post">

                <span id="cerrar_sesion" onclick="confirmar_cierre()">CERRAR SESIÓN</span>

                <input type="hidden" name="cierre" value="ok">

            </form>

            <?php

                } else {

            ?>

            <a href="login.php" id="iniciar_sesion">INICIAR SESIÓN</a>

            <?php

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