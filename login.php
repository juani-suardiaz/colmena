<?php

    session_start();

    if (isset($_SESSION["nombre"])) {

        header("Location: index.php");

        exit();        

    }

    $detalle_legajo = "";

    $detalle_password = "";

    $base_abierta = false;

    $valor_campo_legajo = "";

    $valor_campo_password = "";

    if (isset($_POST["legajo"])) {

        require_once ("conexion.php");

        $base_abierta = true;

        $valor_campo_legajo = $_POST["legajo"];

        $valor_campo_password = $_POST["password"];

        $instruccion = "SELECT * " .
                        "FROM usuarios " .
                        "WHERE id_usuario = " . $_POST["legajo"] . ";"; 

        $resultado = mysqli_query($conexion, $instruccion);

        $usuario = mysqli_fetch_assoc($resultado);

        if ($usuario == false) {

            $detalle_legajo = "<span style='color:red;'> (Usuario inexistente)</span>";

        } else {

            if ($usuario["password"] <> $_POST["password"] ) {

                $detalle_password = "<span style='color:red;'> (Contraseña incorrecta)</span>";

            } else {

                // SE INICIA LA SESIÓN

                session_regenerate_id(true);

                $_SESSION["nombre"] = $usuario["nombre"];

                // SE REDIRIGE A LA PÁGINA DE INICIO

                header("Location: index.php");

                exit();
                
            }

        }

    }

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="estilos.css">

    <style>

        /* body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } */

        body {
            font-family: calibri;
            margin-top: 0;
            margin-bottom: 0;
            background-color: rgb(212, 216, 221);
        }
        
        #caja_principal {
            display: flex;
            justify-content: center;
            align-items: center;            
        }

        .form-container {
            border: 1px solid #000;
            padding: 30px 40px;
            background-color: #fff;
            width: 400px;
            margin: 120px auto 280px auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: normal;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px 10px;
            box-sizing: border-box;
            border: 1px solid #000;
            border-radius: 2px;
        }

        .btn {
            background-color: #00b0ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 2px;
        }

        .btn:hover {
            background-color: #0091ea;
        }

    </style>    

    <script type="text/javascript">

        function dni_valido (dni) {

            for (var i = 0; i < dni.length; i++) {

                if (dni[i] != "0" && dni[i] != "1" && dni[i] != "2" && dni[i] != "3" && dni[i] != "4" && dni[i] != "5" && dni[i] != "6" && dni[i] != "7" && dni[i] != "8" && dni[i] != "9")  {

                    return false

                }

            }

            return true

        }

        function enviar_formulario () {

            var legajo = document.getElementById("campo_legajo").value
            var password = document.getElementById("campo_password").value


            if (legajo == "" || password == "") {

                alert("El campo LEGAJO y el campo CONTRASEÑA no pueden quedar en blanco.")

            } else {

                if (dni_valido(legajo) == false) {

                    alert("El LEGAJO sólo puede contener números.")

                } else {

                    if (dni_valido(password) == false) {

                        alert("La CONTRASEÑA sólo puede contener números.")

                    } else {

                        document.getElementById("formulario").submit()

                    }

                }

            }

        }

    </script>

</head>
<body>

    <?php 
    
        require_once "cabecera.php";

        imprimir_cabecera(1);

    ?>

    <div id="caja_principal">

        <div class="form-container">

            <h2>INICIO DE SESIÓN</h2>

            <form method="post" action="login.php" id="formulario">

                <div class="form-group">
                <label for="campo_legajo">LEGAJO</label><?php echo($detalle_legajo);?>
                <input type="text" id="campo_legajo" name="legajo" maxlength="5" value="<?php echo($valor_campo_legajo);?>">
                </div>

                <div class="form-group">
                <label for="campo_password">CONTRASEÑA</label><?php echo($detalle_password);?>
                <input type="password" id="campo_password" name="password" maxlength="8" value="<?php echo($valor_campo_password);?>">
                </div>
                
                <input type="button" class="btn" value="INICIAR SESIÓN" onclick="enviar_formulario();">

            </form>

        </div>

    </div>

    <?php 
    
        require_once ("pie.php");

        if ($base_abierta) {

            require_once("desconexion.php");

        }

    ?>    

</body>
</html>