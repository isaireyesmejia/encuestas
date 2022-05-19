<?php
//$clave = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_SPECIAL_CHARS);

include 'php/conexion.php';
include 'php/guardar_cuestionario.php';


//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
$cuestionario = filter_input(INPUT_POST, 'cuestionario', FILTER_SANITIZE_SPECIAL_CHARS);



$salida = guardar_cuestionario($matricula, $cuestionario, $_POST, $conn);
//print $salida;
//$mensaje = '';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="multimedia/132103.ico"> 
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Encuesta para trámite de Egreso</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        if ($salida == 90) {
            borrar_cuestionario_respuestas($matricula, $cuestionario, $conn);
            $mensaje = 'Ocurrio un error al intentar guardar la encuesta.';
            echo '<br><div class="alert alert-danger role="alert">' . $mensaje . '</div>';
        } else if ($salida == 80) {
            $mensaje = 'La encuesta ya ha sido registrada';
            echo '<br><div class="alert alert-danger role="alert">' . $mensaje . '</div>';
        } else {

            $sql = '{call co_Insertar_Encuesta_Egreso(?,?)}';


            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $matricula, PDO::PARAM_STR);
            $stmt->bindParam(2, $salida, PDO::PARAM_STR, 300);
            $stmt->execute();

            $result = $stmt->fetch(pdo::FETCH_ASSOC);


           
            echo '<br><div class = "alert alert-success" role = "alert">' . $salida . '</div>';
//            header("refresh:5;url=https://www.campusdigital.lamar.mx/innova/campusdigital20/home.php");
        }
        ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>

