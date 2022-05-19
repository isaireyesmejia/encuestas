<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="multimedia/132103.ico">   
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Encuesta para Trámite de Egreso</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php
    include 'php/conexion.php';

    $codigo = 0;

    //$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
	$matricula = 'LME4465';
    $cuestionario = 1;

    if (!$matricula) {
        echo '<br><h4><strong>Favor de ingresar una matricula</strong></h4>';
    } else {

      /*  $sql = 'exec ?=co_Validar_Encuesta_Egreso ?,?'; //valida que la matricula exista o que la encuesta no haya 
        $stmt = $conn->prepare($sql);     //contestada y que esté vigente la encuesta 
        $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
        $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
        $stmt->bindParam(3, $salida, PDO::PARAM_STR, 4000);
        $stmt->execute();

        $result = $stmt->fetch(pdo::FETCH_ASSOC);

        if (!isset($salida)) {
            $salida='Error inesperado, favor de intentar nuevamente';
            $codigo=100;
        } 
        if ($codigo <> 0) {
            echo '<br><div class="container"><div class="alert alert-danger role="alert">' . $salida . '</div><div>';
        } else {*/
            $sql = 'exec ?=co_Datos_Alumno_Encuesta_Egreso ?,?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
            $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
            $stmt->bindParam(3, $salida, PDO::PARAM_STR, 4000);
            $stmt->execute();

            $result = $stmt->fetch(pdo::FETCH_ASSOC);
            $date = new DateTime($result['Nacimiento']);
//            echo '<pre>';
//            print_r($result);
//            echo '</pre>';
      //  }
    }
    ?>
    <body>
        <br>
        <div  class="container" style="<?php
        if ($codigo == 0)
            echo 'visibility:show';
        else
            echo 'visibility:hidden';
        ?>">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 >Encuesta para Trámite de Egreso</h3>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="post" name="encuesta_tramite_egreso" action="respuesta_egresados.php">
                        <input type="hidden" name="cuestionario" value="1">
                        <input type="hidden" name="matricula" value="<?php echo $result['Matricula_CH'] ?>">
                        <ul>
                            <li>
                                <h4><strong>Datos del alumno</strong></h4>
                                <ul>
                                    <li>
                                        <div class="form-group">
                                            <label>Curso o carrera  </label>
                                            <input type="" class="form-control" disabled=""
                                                   value="<?php echo $result['Curso_CH'] ?>" autocomplete="off">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Matrícula</label>
                                            <input type="" class="form-control" name="m" disabled="" 
                                                   autocomplete="off" value="<?php echo $result['Matricula_CH'] ?>" >
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Nombre completo</label>
                                            <input type="" class="form-control"  disabled=""
                                                   value="<?php echo $result['Nombre_Completo_VC'] ?>" autocomplete="off">
                                        </div>
                                        <!--                                        <div class="form-horizontal">
                                                                                    <div class="form-group ">
                                                                                        <div class="col-sm-2 control-label">Nombre  </div>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="email" class="form-control" id="" placeholder="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="col-sm-2 control-label">Apellido paterno  </div>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="email" class="form-control" id="" placeholder="">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="col-sm-2 control-label">Apellido materno  </div>
                                                                                        <div class="col-sm-10">
                                                                                            <input type="email" class="form-control" id="" placeholder="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="" class="form-control"  disabled=""
                                                   value="<?php echo $date->format('d-m-Y') ?>" autocomplete="off">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Domicilio</label>
                                            <input type="" class="form-control"  disabled=""
                                                   value="<?php echo $result['Domicilio'] ?>" autocomplete="off">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input type="" class="form-control"  disabled=""
                                                   value="<?php echo $result['Correo'] ?>" autocomplete="off">
                                        </div>
                                    </li>
                                    <!--                                    <li>
                                                                            <div class="form-group">
                                                                                <label>Edad </label>
                                                                                <input type="number" value="<?php echo $result['Nombre_Completo_VC'] ?>" disabled=""
                                                                                       class="form-control" placeholder="">
                                                                            </div>
                                                                        </li>-->
                                    <li>
                                        <div class="form-group">
                                            <label>Número telefónico local y/o celular  </label>
                                            <input type="tel" class="form-control" value="<?php echo $result['Telefonos'] ?>" disabled="">
                                            <!--<span>Formato: 33-1876-8795</span>-->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="tel" class="form-control" value="<?php echo $result['Estado_Civil'] ?>" disabled="">
                                            <!--<span>Formato: 33-1876-8795</span>-->
                                        </div>
                                    </li>
                                    <!--                                    <li>
                                                                            <div class="form-group">
                                                                                <label>Estado civil </label>
                                                                                <div class="radio">
                                                                                    <label>
                                                                                        <input type="radio" name="optionsRadios" id="" value="">
                                                                                        Soltero
                                                                                    </label>
                                                                                </div>
                                                                                <div class="radio">
                                                                                    <label>
                                                                                        <input type="radio" name="optionsRadios" id="" value="">
                                                                                        Casado
                                                                                    </label>
                                                                                </div>
                                                                                <div class="radio">
                                                                                    <label>
                                                                                        <input type="radio" name="optionsRadios" id="" value="">
                                                                                        Unión libre 
                                                                                    </label>
                                                                                </div>
                                                                                <div class="radio">
                                                                                    <div class="form-inline">
                                                                                        <div class="form-group">
                                                                                            <label>
                                                                                                <input type="radio" name="optionsRadios" id="" value="">
                                                                                                Otro:
                                                                                            </label>
                                                                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>-->
                                </ul>
                            </li>
                            <li>
                                <h4><strong>Historial académico</strong></h4>
                                <ol>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En qué año ingresaste a la Universidad?</label>
                                            <input type="number" name="1" class="form-control" required="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Prolongó sus estudios por más del tiempo establecido?</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="2" value="3" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="2" value="4" required="">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Si su respuesta fue si, indique alguna de las siguientes causas posibles </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="5" id="" value="5" >
                                                    Académica 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="5" id="" value="6" >
                                                    Personal 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="5" id="" value="7" >
                                                    Laboral  
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="5" id="" value="8" >
                                                    Económica   
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="5"  value="9" >
                                                    Familiar   
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="5"  value="28" >
                                                            Otro:
                                                        </label>
                                                        <input type="text" class="form-control" name="otro5" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cuáles fueron las razones por la que elegiste la Universidad LAMAR? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="6" value="10" required="">
                                                    Ofrece la carrera de mi elección 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="6" value="11" required="">
                                                    Prestigio 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="6" value="12" required="">
                                                    Ubicación geográfica
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="6" value="13" required="">
                                                    Costos
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="6" value="14" required="">
                                                    No salí en listas en universidad pública
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="6" value="29" required="">
                                                            Otro:
                                                        </label>
                                                        <input type="text" name="otro6" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cuál es tu promedio académico al finalizar tus estudios? </label>
                                            <input type="number" class="form-control" name="12" required="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En que porcentaje dominas el Ingles? </label>
                                            <input type="number" class="form-control" name="13" id="" required="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Consideras que la formación académica fue la adecuada? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="7" id="" value="15" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="7" id="" value="16" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En qué aspectos consideras que podría mejorar?  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="8" id="" value="17" required="">
                                                    Contenidos
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="8" id="" value="18" required="">
                                                    Horarios
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="8" id="" value="19" required="">
                                                    Frecuencia
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="8" id="" value="20" required="">
                                                    Prácticas profesionales 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="8" id="" value="21" required="">
                                                    Bibliografía 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="8" id="" value="30" required="">
                                                            Otro:
                                                        </label>
                                                        <input type="text" name="otro8" class="form-control" id="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <h4 ><strong>Selecciona las opciones que correspondan, en relación a tu Servicio Social</strong></h4>
                                <ol>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cuentas con la liberación de tu Servicio Social? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="9" id="" value="22" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="9" id="" value="23" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Ya concluiste con tu servicio Social?</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="10" id="" value="24" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="10" id="" value="25" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Lo estas presentando actualmente? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="11" id="" value="26" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="11" id="" value="27" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En que fecha lo iniciaste?  </label>
                                            <input type="date" class="form-control" name="14" id="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Indica la Institución y Municipio en donde realizaste o estas realizando tu Servicio Social  </label>
                                            <textarea class="form-control" name="15" rows="3"></textarea>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Aún no lo has iniciado?  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="16" id="" value="31" >
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="16" id="" value="32" >
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En que ciclo lo iniciarás?  </label>
                                            <input type="text" class="form-control" name="17"  placeholder="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Tienes pensado iniciar el trámite de titulación en el ciclo escolar posterior a tu egreso? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="18" id="" value="33" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="18" id="" value="34" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Crees que tu situación laboral mejorará por el hecho de ser un profesionista titulado?  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="19" id="" value="35" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="19" id="" value="36" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Recomendarías a la Universidad LAMAR? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="20" id="" value="37" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="20" id="" value="38" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <h4 ><strong>Condiciones socioeconómicas</strong></h4>
                                <ol>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Quiénes te apoyaron para realizar tus estudios?  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="21" id="" value="39" required="">
                                                    Madre
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="21" id="" value="40" required="">
                                                    Padre
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="21" id="" value="41" required="">
                                                    Ambos
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="21" id="" value="42" required="">
                                                    Nadie
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="21" id="" value="43" required="">
                                                            Otro:
                                                        </label>
                                                        <input type="text" class="form-control" name="otro21" id="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Trabajas actualmente?</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="22" id="" value="44" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="22" id="" value="45" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Institución en donde laboras   </label>
                                            <input type="" class="form-control" name="23" >
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Puesto que desempeñas   </label>
                                            <input type="" class="form-control" name="24" >
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Personas que dependen de ti  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="25" id="" value="46" required="">
                                                    Padres
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="25" id="" value="47" required="">
                                                    Cónyuge
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="25" id="" value="48" required="">
                                                    Nadie
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <div class="form-inline">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="25" id="" value="49" required="">
                                                            Otro:
                                                        </label>
                                                        <input type="text" class="form-control" name="otro25" id="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cuánto tiempo tienes trabajando? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="26" id="" value="50" >
                                                    Menos de 6 meses 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="26" id="" value="51" >
                                                    6 meses a 1 año 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="26" id="" value="52" >
                                                    1 a 2 años 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="26" id="" value="53" >
                                                    Más de 2 años 
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿En qué sector laboras? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="27" id="" value="54" >
                                                    Público
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="27" id="" value="55" >
                                                    Privado
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Tipo de contratación  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="28" id="" value="56">
                                                    Eventual 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="28" id="" value="57">
                                                    Independiente 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="28" id="" value="58">
                                                    Contrato indefinido 
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cuáles son tus ingresos mensuales? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="29" id="" value="59" required="">
                                                    Menos de 5,000 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="29" id="" value="60" required="">
                                                    De 5,000 a 10,000 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="29" id="" value="61" required="">
                                                    De 10,000 a 15,000 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="29" id="" value="62" required="">
                                                    Más de 15,000 
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Tiene relación el trabajo que realizas con tu carrera?  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="30" id="" value="63">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="30" id="" value="64">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>   
                                    <li>
                                        <div class="form-group">
                                            <label>¿Cómo calificas el servicio? </label>
                                            <span id="" class="help-block">Evalúa en una escala del 1 al 10, siendo el 10 la respuesta mejor valorada y el 1 la respuesta peor valorada</span>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td style="width:20%">
                                                        </th>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="width:20%">
                                                    <td>
                                                        <label>Secretaría Académica:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="65" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="66" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="67" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="68" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="69" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="70" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="71" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="72" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="73" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="34" id="" value="74" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Coordinador de Carrera:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="75" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="76" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="77" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="78" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="79" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="80" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="81" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="82" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="83" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="35" id="" value="84" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Dirección de Control Escolar:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="85" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="86" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="87" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="88" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="89" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="90" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="91" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="92" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="93" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="36" id="" value="94" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Vicerrectoría de Finanzas:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="95" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="96" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="97" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="98" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="99" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="100" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="101" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="102" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="103" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="37" id="" value="104" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Secretaría Administrativa:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="105" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="106" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="107" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="108" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="109" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="110" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="111" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="112" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="113" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="38" id="" value="114" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Mostrador de Servicios Múltiples:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="115" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="116" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="117" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="118" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="119" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="120" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="121" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="122" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="123" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="39" id="" value="124" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Biblioteca:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="125" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="126" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="127" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="128" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="129" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="130" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="131" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="132" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="133" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="40" id="" value="134" required="">                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>La atención prestada por el personal fue:  </label>
                                            <span id="" class="help-block">Evalúa en una escala del 1 al 10, siendo el 10 la respuesta mejor valorada y el 1 la respuesta peor valorada</span>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td style="width:20%">
                                                        </th>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="width:20%">
                                                    <td>
                                                        <label>Secretaría Académica:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="135" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="136" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="137" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="138" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="139" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="140" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="141" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="142" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="143" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="41" id="" value="144" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Coordinador de Carrera:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="145" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="146" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="147" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="148" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="149" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="150" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="151" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="152" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="153" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="42" id="" value="154" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Dirección de Control Escolar:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="155" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="156" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="157" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="158" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="159" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="160" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="161" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="162" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="163" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="43" id="" value="164" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Vicerrectoría de Finanzas:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="165" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="166" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="167" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="168" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="169" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="170" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="171" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="172" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="173" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="44" id="" value="174" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Secretaría Administrativa:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="175" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="176" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="177" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="178" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="179" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="180" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="181" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="182" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="183" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="45" id="" value="184" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Mostrador de Servicios Múltiples:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="185" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="186" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="187" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="188" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="189" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="190" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="191" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="192" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="193" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="46" id="" value="194" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Biblioteca:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="195" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="196" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="197" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="198" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="199" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="200" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="201" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="202" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="203" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="47" id="" value="204" required="">                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Se resolvió tu petición satisfactoriamente? </label>
                                            <span id="" class="help-block">Evalúa en una escala del 1 al 10, siendo el 10 la respuesta mejor valorada y el 1 la respuesta peor valorada</span>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <td style="width:20%">
                                                        </th>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="width:20%">
                                                    <td>
                                                        <label>Secretaría Académica:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="205" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="206" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="207" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="208" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="209" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="210" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="211" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="212" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="213" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="48" id="" value="214" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Coordinador de Carrera:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="215" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="216" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="217" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="218" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="219" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="220" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="221" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="222" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="223" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="49" id="" value="224" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Dirección de Control Escolar:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="225" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="226" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="227" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="228" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="229" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="230" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="231" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="232" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="233" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="50" id="" value="234" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Vicerrectoría de Finanzas:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="235" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="236" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="237" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="238" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="239" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="240" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="241" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="242" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="243" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="51" id="" value="244" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Secretaría Administrativa:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="245" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="246" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="247" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="248" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="259" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="250" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="251" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="252" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="253" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="52" id="" value="254" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Mostrador de Servicios Múltiples:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="255" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="256" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="257" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="258" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="259" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="260" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="261" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="262" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="263" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="53" id="" value="264" required="">                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Biblioteca:</label>
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="265" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="266" required="">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="267" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="268" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="269" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="270" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="271" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="272" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="272" required="">                                                    </td>
                                                    <td>
                                                        <input type="radio" name="54" id="" value="274" required="">                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Deseas realizar algún comentario para mejorar el servicio de la Universidad LAMAR?  </label>
                                            <textarea class="form-control" name="31" rows="3" required=""></textarea>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>Elige las áreas en las que te gustaría recibir información para continuar actualizándote  </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="checkbox" name="32[]" id="" value="275" >
                                                    Talleres 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="checkbox" name="32[]" id="" value="276" >
                                                    Diplomados 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="checkbox" name="32[]" id="" value="277" >
                                                    Doctorados 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="checkbox" name="32[]" id="" value="278" >
                                                    Maestrías 
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="checkbox" name="32[]" id="" value="279" >
                                                    Idiomas  
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label>¿Te gustaría recibir información o invitaciones a eventos de la Universidad LAMAR? </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="33" id="" value="280" required="">
                                                    Sí
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="33" id="" value="281" required="">
                                                    Nó
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </ul>
                    </form>
                </div>
                <div class="panel-footer">
                    <h3>Gracias por tu apoyo, tu participación nos ayuda a ser mejores.</h3>
                    <h4>Unidad De Seguimiento De Egresados</h4>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <script src="index.js"></script>
    </body>
</html>
