<?php

function imprimir_cabecera ($indice) {

    $estilo_1 = "";
    $estilo_2 = "";
    $estilo_3 = "";
    $estilo_4 = "";
    $estilo_6 = "";
    $estilo_5 = "";

    switch ($indice) {

        case 1:
            $estilo_1 = 'style = "text-decoration: underline"';
            break;
        case 2:
            $estilo_2 = 'style = "text-decoration: underline"';
            break;
        case 3:
            $estilo_3 = 'style = "text-decoration: underline"';
            break;
        case 4:
            $estilo_4 = 'style = "text-decoration: underline"';
            break;
        case 5:
            $estilo_5 = 'style = "text-decoration: underline"';
            break;
        case 6:
            $estilo_6 = 'style = "text-decoration: underline"';
            break;                                                

    }
    
?>

    <div class="caja_barra_superior">

        <div class="columnas_barra_superior" <?php echo($estilo_1)?> onclick="window.location.href = 'index.php'" >INICIO</div>
        <div class="columnas_barra_superior" <?php echo($estilo_2)?> onclick="window.location.href = 'buscar_persona.php'">FICHA PERSONAL</div>
        <div class="columnas_barra_superior" <?php echo($estilo_3)?> onclick="window.location.href = 'curso.php'">CURSO</div>
        <div class="columnas_barra_superior" <?php echo($estilo_4)?> onclick="window.location.href = 'planta_funcional.php'">PLANTA FUNCIONAL</div>
        <div class="columnas_barra_superior" <?php echo($estilo_5)?> onclick="window.location.href = 'mail_list.php'">MAIL LIST</div>
        <div class="columnas_barra_superior" <?php echo($estilo_6)?> onclick="window.location.href = 'admin.php'">ADMIN</div>

    </div>

<?php

}

?>