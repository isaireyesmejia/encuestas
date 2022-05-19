<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="multimedia/132103.ico">       
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Argos</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div  class="container">
                        <!--<form action="http://argoscloud.lamar.edu.mx:8088/encuestas/encuesta_egresados.php" method="post">-->
                        <form action="encuesta_egresadosV2.php" method="post">
                            <br><br>
                            <div class="form-group">
                                <label for="">Matrícula</label>
                                <input type="text" name="matricula" class="form-control" placeholder="matrícula" autocomplete="off">
                                <label for="">Clave</label>
                                <input type="text" name="llave" value="o6Wo" autocomplete="off" placeholder="clave" class="form-control">
                            </div>
                            <input type=image src="multimedia/132103.ico" width="25" height="15">
                        </form>
<!--            <form action="http://argoscloud.lamar.edu.mx/lamar/Cuestionarios" method="post" target="_blank">
                <input type="text" name="l" value="">
                <input type="hidden" name="k" value="<?php echo "uHsbCSgRDK1e2r6DQQjxRg==" ?>">
                <input type=image src="multimedia/132103.ico" width="25" height="15">
            </form>-->
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
