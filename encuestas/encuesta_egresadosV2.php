<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="multimedia/132103.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
        <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">
        <title>Encuesta egresados</title>
    </head>
    <?php
    include 'php/conexion.php';

    $codigo = 80;

    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
    $cuestionario = 1;

    if (!$matricula) {
        echo '<br><h4><strong>Favor de ingresar una matricula</strong></h4>';
    } else {

        $sql = 'exec ?=co_Validar_Encuesta_Egreso ?,?'; //valida que la matricula exista o que la encuesta no haya 
        $stmt = $conn->prepare($sql);     //contestada y que esté vigente la encuesta 
        $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
        $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
        $stmt->bindParam(3, $salida, PDO::PARAM_STR, 4000);
        $stmt->execute();

        $result = $stmt->fetch(pdo::FETCH_ASSOC);

        if (!isset($salida)) {
            $salida = 'Error inesperado, favor de intentar nuevamente';
            $codigo = 100;
        }
        if ($codigo <> 0) {
            echo '<br><div class="container"><div class="alert alert-danger role="alert">' . $salida . '</div><div>';
        } else {
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
        }
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
            <!-- Content here -->
            <div class="card">
                <div class="card-header"><h4>¡HOLA: <?php echo $result['Nombre_Completo_VC'] ?>!</h4>
                    <blockquote class="blockquote mb-0">
                        <p>El objetivo de esta encuesta, es conocer información relevante sobre tu trayectoria y formación, previo a tu egreso, contribuyendo a la mejora continua. </p>
                        <footer class="blockquote-footer">La información aportada tiene fines institucionales y es estrictamente confidencial.
                            <!--<cite title="Source Title">Source Title</cite>-->
                        </footer>
                    </blockquote>
                </div>    
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" name="encuesta_tramite_egreso" action="respuesta_egresados.php">
                        <input type="hidden" name="cuestionario" value="1">
                        <input type="hidden" name="matricula" value="<?php echo $result['Matricula_CH'] ?>">
                        <ul>
                            <li>
                                <h5>Datos Generales</h5>
                            </li>
                            <div class="form-group">
                                <label>Domicilio:</label>
                                <input type="text" class="form-control" name="80" required="" autocomplete="off">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Teléfono de casa:</label>
                                    <input type="tel" class="form-control" name="81" required="" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Celular:</label>
                                    <input type="tel" class="form-control" name="82" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Correo electrónico personal:</label>
                                    <input type="email" class="form-control" name="83" required="" autocomplete="off">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Correo alterno:</label>
                                    <input type="email" class="form-control" name="84" required="" autocomplete="off">
                                </div>
                            </div>
                        </ul>
                        <ul>
                            <li>
                                <h5>Datos Académicos/Egreso</h5>
                                <div class="form-group">
                                    <label>¿Consideras que las Prácticas Profesionales aportaron experiencia relevante conforme al mercado laboral al cual te insertarás?  </label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input"  type="radio" name="85" value="410" id="410" required="">
                                        <label class="custom-control-label" for="410">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input class="custom-control-input" type="radio" name="85" value="411" id="411" required="">
                                        <label class="custom-control-label" for="411">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">¿La información para tu trámite de egreso ha sido clara y precisa?</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="86" value="412" class="custom-control-input" id="412">
                                        <label class="custom-control-label" for="412">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="86" value="413" class="custom-control-input" id="413">
                                        <label class="custom-control-label" for="413">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">¿Está dentro de tus metas continuar tus estudios después de tu egreso de la licenciatura? </label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="87" value="414" class="custom-control-input" id="414">
                                        <label class="custom-control-label" for="414">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="87" value="415" class="custom-control-input" id="415">
                                        <label class="custom-control-label" for="415">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">De ser así, ¿qué te gustaría estudiar?</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="88" value="416" class="custom-control-input" id="416">
                                        <label class="custom-control-label" for="416">Maestría</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="88" value="417" class="custom-control-input" id="417">
                                        <label class="custom-control-label" for="417">Especialidad</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="88" value="418" class="custom-control-input" id="418">
                                        <label class="custom-control-label" for="418">Diplomado</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="88" value="419" class="custom-control-input" id="419">
                                        <label class="custom-control-label" for="419">Otra licenciatura</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">¿Tienes definida una institución particular para continuar con tus estudios?</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="89" value="420" class="custom-control-input" id="420">
                                        <label class="custom-control-label" for="420">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="89" value="421" class="custom-control-input" id="421">
                                        <label class="custom-control-label" for="421">No</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="89" value="422" class="custom-control-input" id="422">
                                        <label class="custom-control-label" for="422">Áun no lo considero</label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Cúal</label>
                                    <input type="text" class="form-control" name="124" placeholder="" autocomplete="off">
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <h5>Situación Laboral</h5>
                                <div class="form-group">
                                    <label>¿Trabajas actualmente?</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="90" value="423" class="custom-control-input" id="423">
                                        <label class="custom-control-label" for="423">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="90" value="424" class="custom-control-input" id="424">
                                        <label class="custom-control-label" for="424">No</label>
                                    </div>
                                </div>
                                <div id="situacion_laboral_no">
                                    <div class="form-group">
                                        <label>¿Has intentado activamente obtener algún empleo en las últimas 4 semanas?</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="91" value="425" class="custom-control-input" id="425">
                                            <label class="custom-control-label" for="425">Sí, pero aún no recibo respuesta.</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="91" value="426" class="custom-control-input" id="426">
                                            <label class="custom-control-label" for="426">No, pero estoy en espera de próximas publicaciones de las empresas de mi interés.</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="91" value="427" class="custom-control-input" id="427">
                                            <label class="custom-control-label" for="427">No, estoy en espera de egresar para comenzar mi búsqueda.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>¿Cuál es el motivo por el que no trabajas?</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="92" value="428" class="custom-control-input" id="428">
                                            <label class="custom-control-label" for="428">Falta de Tiempo </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="92" value="429" class="custom-control-input" id="429">
                                            <label class="custom-control-label" for="429">No  encuentro trabajo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="92" value="430" class="custom-control-input" id="430">
                                            <label class="custom-control-label" for="430">No estoy interesado en trabajar por el momento, y hasta mi egreso</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="92" value="431" class="custom-control-input" id="431">
                                            <label class="custom-control-label" for="431">No tengo necesidad de trabajar</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <div class="form-inline">
                                                <input type="radio" name="92" value="432" class="custom-control-input" id="432">
                                                <label class="custom-control-label" for="432" >Otro:</label>
                                                <input type="text" class="form-control" name="otro92" autocomplete="off">                                            
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div id="situacion_laboral_si">
                                    <div class="form-group">
                                        <label>¿Cómo describirías tu estado profesional actual?</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="93" value="433" class="custom-control-input" id="433">
                                            <label class="custom-control-label" for="433">Tengo un empleo regular/ soy independiente relacionado con mi carrera</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="93" value="434" class="custom-control-input" id="434">
                                            <label class="custom-control-label" for="434">Tengo un empleo regular/ soy independiente NO relacionado con mi carrera</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="93" value="435" class="custom-control-input" id="435">
                                            <label class="custom-control-label" for="435">Trabajo por proyecto (FreeLancer) relacionado con mi carrera</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="93" value="436" class="custom-control-input" id="436">
                                            <label class="custom-control-label" for="436">Trabajo por proyecto (FreeLancer) NO  relacionado con mi carrera</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tamaño de la empresa:</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="94" value="437" class="custom-control-input" id="437">
                                            <label class="custom-control-label" for="437">Microempresa (hasta 15 empleados)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="94" value="438" class="custom-control-input" id="438">
                                            <label class="custom-control-label" for="438">Pequeña empresa (entre 16 -100 empleados)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="94" value="439" class="custom-control-input" id="439">
                                            <label class="custom-control-label" for="439">Mediana empresa (entre 101-250 empleados)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="94" value="440" class="custom-control-input" id="440">
                                            <label class="custom-control-label" for="440">Grande empresa (más de 251 empleados)</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Giro de la empresa:</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="441" class="custom-control-input" id="441">
                                            <label class="custom-control-label" for="441">Educativo /Investigación</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="442" class="custom-control-input" id="442">
                                            <label class="custom-control-label" for="442">Industria, Manufactura  y/o Construcción</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="443" class="custom-control-input" id="443">
                                            <label class="custom-control-label" for="443">Salud</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="444" class="custom-control-input" id="444">
                                            <label class="custom-control-label" for="444">Productos de Consumo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="445"  class="custom-control-input" id="445">
                                            <label class="custom-control-label" for="445">Turismo</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="446" class="custom-control-input" id="446">
                                            <label class="custom-control-label" for="446">Filantrópico (ayuda a los demás)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="447" class="custom-control-input" id="447">
                                            <label class="custom-control-label" for="447">Comunicaciones y transportes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="448" class="custom-control-input" id="448">
                                            <label class="custom-control-label" for="448">Agrícola-ganadero</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="449" class="custom-control-input" id="449">
                                            <label class="custom-control-label" for="449">Gubernamental</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="450" class="custom-control-input" id="450">
                                            <label class="custom-control-label" for="450">Sistemas financieros y bancarios</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="451" class="custom-control-input" id="451">
                                            <label class="custom-control-label" for="451">Servicios Independientes</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="95" value="452" class="custom-control-input" id="452">
                                            <label class="custom-control-label" for="452">Comercio /ventas</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <div class="form-inline">
                                                <input type="radio" name="95" value="453" class="custom-control-input" id="453">
                                                <label class="custom-control-label" for="453">Otro ¿Cuál? </label>
                                                <input type="text" class="form-control" name="otro95" autocomplete="off">                                            
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de la empresa: </label>
                                        <input type="text" name="96" class="form-control" autocomplete="off">
                                        <label >Teléfono de la empresa: </label>
                                        <input type="text" name="97" class="form-control" autocomplete="off">
                                        <label >Nombre del Jefe inmediato:</label>
                                        <input type="text" name="98" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>¿Por qué medio encontraste tu empleo actual?</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="101" value="454" class="custom-control-input" id="454">
                                            <label class="custom-control-label" for="454">Recomendación</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="101" value="455" class="custom-control-input" id="455">
                                            <label class="custom-control-label" for="455">Prácticas Profesionales  y/o Servicio social  </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="101" value="456" class="custom-control-input" id="456">
                                            <label class="custom-control-label" for="456">Redes sociales</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="101" value="457" class="custom-control-input" id="457">
                                            <label class="custom-control-label" for="457">Bolsa de trabajo digital (OCC, LinkedIn etc.)</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <div class="form-inline">
                                                <input type="radio" name="101" value="458" class="custom-control-input" id="458">
                                                <label class="custom-control-label" for="458">Otro (especifica) </label>
                                                <input type="text" class="form-control" name="otro101" autocomplete="off">                                            
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <h5>Institucionales</h5>
                                <div class="form-group">
                                    <label for="inputAddress">Durante tu trayectoria universitaria ¿cómo calificas el trato recibido?</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="102" value="459" class="custom-control-input" id="459">
                                        <label class="custom-control-label" for="459">Exelente</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="102" value="460" class="custom-control-input" id="460">
                                        <label class="custom-control-label" for="460">Bueno</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="102" value="461" class="custom-control-input" id="461">
                                        <label class="custom-control-label" for="461">Regular</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="102" value="462" class="custom-control-input" id="462">
                                        <label class="custom-control-label" for="462">Malo</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">¿Durante tu trayectoria universitaria tuviste claro con quién acudir para algún tema a tratar?</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="103" value="463" class="custom-control-input" id="463">
                                        <label class="custom-control-label" for="463">Si</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="103" value="464" class="custom-control-input" id="464">
                                        <label class="custom-control-label" for="464">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">En General ¿cuál es tu nivel de satisfacción sobre el Centro Universitario Guadalajara LAMAR?</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="104" value="465" class="custom-control-input" id="465">
                                        <label class="custom-control-label" for="465">Muy Satisfecho</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="104" value="466" class="custom-control-input" id="466">
                                        <label class="custom-control-label" for="466">Satisfecho</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="104" value="467" class="custom-control-input" id="467">
                                        <label class="custom-control-label" for="467">Poco Satisfecho</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="104" value="468" class="custom-control-input" id="468">
                                        <label class="custom-control-label" for="468">Nada Satisfecho</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">¿Qué tan satisfecho te consideras con respecto a los rubros que se mencionan a continuación? </label>
                                    <small class="form-text text-muted">Marca con una X tu nivel de satisfacción. </small>
                                    <table id="table"
                                           data-toggle="table">
                                        <thead>
                                            <tr>
                                                <th data-halign="right" data-align="right" data-width="300">ATENCIÓN Y SERVICIO DE:</th>
                                                <th data-halign="center" data-align="center">Muy Satisfecho</th>
                                                <th data-halign="center" data-align="center">Satisfecho</th>
                                                <th data-halign="center" data-align="center">Poco Satisfecho</th>
                                                <th data-halign="center" data-align="center">Nada Satisfecho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Coordinador y Director Académico</td>
                                                <td><input type="radio" name="108" id="" value="478" required=""></td>
                                                <td><input type="radio" name="108" id="" value="479" required=""></td>
                                                <td><input type="radio" name="108" id="" value="480" required=""></td>
                                                <td><input type="radio" name="108" id="" value="481" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Secretaría Administrativa</td>
                                                <td><input type="radio" name="109" id="" value="482" required=""></td>
                                                <td><input type="radio" name="109" id="" value="483" required=""></td>
                                                <td><input type="radio" name="109" id="" value="484" required=""></td>
                                                <td><input type="radio" name="109" id="" value="485" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Docentes</td>
                                                <td><input type="radio" name="110" id="" value="486" required=""></td>
                                                <td><input type="radio" name="110" id="" value="487" required=""></td>
                                                <td><input type="radio" name="110" id="" value="488" required=""></td>
                                                <td><input type="radio" name="110" id="" value="489" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Finanzas</td>
                                                <td><input type="radio" name="111" id="" value="490" required=""></td>
                                                <td><input type="radio" name="111" id="" value="491" required=""></td>
                                                <td><input type="radio" name="111" id="" value="492" required=""></td>
                                                <td><input type="radio" name="111" id="" value="493" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Mostrador de Servicios Múltiples</td>
                                                <td><input type="radio" name="112" id="" value="494" required=""></td>
                                                <td><input type="radio" name="112" id="" value="495" required=""></td>
                                                <td><input type="radio" name="112" id="" value="496" required=""></td>
                                                <td><input type="radio" name="112" id="" value="497" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Control Escolar</td>
                                                <td><input type="radio" name="113" id="" value="498" required=""></td>
                                                <td><input type="radio" name="113" id="" value="499" required=""></td>
                                                <td><input type="radio" name="113" id="" value="500" required=""></td>
                                                <td><input type="radio" name="113" id="" value="501" required=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table data-toggle="table">
                                        <thead>
                                            <tr>
                                                <th data-halign="right" data-align="right" data-width="300">FORMACIÓN</th>
                                                <th data-halign="center" data-align="center">Muy Satisfecho</th>
                                                <th data-halign="center" data-align="center">Satisfecho</th>
                                                <th data-halign="center" data-align="center">Poco Satisfecho</th>
                                                <th data-halign="center" data-align="center">Nada Satisfecho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Calidad Académica</td>
                                                <td><input type="radio" name="114" id="" value="502" required=""></td>
                                                <td><input type="radio" name="114" id="" value="503" required=""></td>
                                                <td><input type="radio" name="114" id="" value="504" required=""></td>
                                                <td><input type="radio" name="114" id="" value="505" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Experiencia Docente</td>
                                                <td><input type="radio" name="115" id="" value="506" required=""></td>
                                                <td><input type="radio" name="115" id="" value="507" required=""></td>
                                                <td><input type="radio" name="115" id="" value="508" required=""></td>
                                                <td><input type="radio" name="115" id="" value="509" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Servicio Social</td>
                                                <td><input type="radio" name="116" id="" value="510" required=""></td>
                                                <td><input type="radio" name="116" id="" value="511" required=""></td>
                                                <td><input type="radio" name="116" id="" value="512" required=""></td>
                                                <td><input type="radio" name="116" id="" value="513" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Prácticas Profesionales</td>
                                                <td><input type="radio" name="117" id="" value="514" required=""></td>
                                                <td><input type="radio" name="117" id="" value="515" required=""></td>
                                                <td><input type="radio" name="117" id="" value="516" required=""></td>
                                                <td><input type="radio" name="117" id="" value="517" required=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table data-toggle="table">
                                        <thead>
                                            <tr>
                                                <th data-halign="right" data-align="right" data-width="300">INSTALACIONES Y EQUIPO</th>
                                                <th data-halign="center" data-align="center">Muy Satisfecho</th>
                                                <th data-halign="center" data-align="center">Satisfecho</th>
                                                <th data-halign="center" data-align="center">Poco Satisfecho</th>
                                                <th data-halign="center" data-align="center">Nada Satisfecho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Laboratorios , talleres y equipo</td>
                                                <td><input type="radio" name="118" id="" value="518" required=""></td>
                                                <td><input type="radio" name="118" id="" value="519" required=""></td>
                                                <td><input type="radio" name="118" id="" value="520" required=""></td>
                                                <td><input type="radio" name="118" id="" value="521" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Sanitarios</td>
                                                <td><input type="radio" name="119" id="" value="522" required=""></td>
                                                <td><input type="radio" name="119" id="" value="523" required=""></td>
                                                <td><input type="radio" name="119" id="" value="524" required=""></td>
                                                <td><input type="radio" name="119" id="" value="525" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Aulas</td>
                                                <td><input type="radio" name="120" id="" value="526" required=""></td>
                                                <td><input type="radio" name="120" id="" value="527" required=""></td>
                                                <td><input type="radio" name="120" id="" value="528" required=""></td>
                                                <td><input type="radio" name="120" id="" value="529" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Cafetería</td>
                                                <td><input type="radio" name="121" id="" value="530" required=""></td>
                                                <td><input type="radio" name="121" id="" value="531" required=""></td>
                                                <td><input type="radio" name="121" id="" value="532" required=""></td>
                                                <td><input type="radio" name="121" id="" value="533" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Biblioteca</td>
                                                <td><input type="radio" name="122" id="" value="534" required=""></td>
                                                <td><input type="radio" name="122" id="" value="535" required=""></td>
                                                <td><input type="radio" name="122" id="" value="536" required=""></td>
                                                <td><input type="radio" name="122" id="" value="537" required=""></td>
                                            </tr>
                                            <tr>
                                                <td>Mediateca</td>
                                                <td><input type="radio" name="123" id="" value="538" required=""></td>
                                                <td><input type="radio" name="123" id="" value="539" required=""></td>
                                                <td><input type="radio" name="123" id="" value="540" required=""></td>
                                                <td><input type="radio" name="123" id="" value="541" required=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Si tuvieras la oportunidad de elegir nuevamente dónde estudiar, ¿optarías por estudiar en Universidad Lamar? </label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="105" value="469" class="custom-control-input" id="469">
                                        <label class="custom-control-label" for="469">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="105" value="470" class="custom-control-input" id="470">
                                        <label class="custom-control-label" for="470">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">¿Recomendarías a otra persona realizar sus estudios en Universidad LAMAR?</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="106" value="471" class="custom-control-input" id="471">
                                        <label class="custom-control-label" for="471">Sí</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="106" value="472" class="custom-control-input" id="472">
                                        <label class="custom-control-label" for="472">No</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>¿Tienes algún comentario adicional?</label>
                                    <textarea class="form-control" name="107" rows="3"></textarea>
                                </div>
                            </li>
                        </ul>
                        <br>
                        <strong>Muchas gracias por responder la encuesta, todos tus comentarios son importantes para seguir creciendo y ofrecer una educación y servicio de calidad.</strong>
                        <br><br>
                        <div class="card text-center">
                            <div class="card-header">
                                <h5 class="card-title">Aviso de privacidad</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Manifiesto que los datos e información otorgados son ciertos y autorizo al Centro Universitario Guadalajara LAMAR, el tratamiento de los mismos, en los términos previstos en el aviso de privacidad de dicha institución, mismo que puedo consultar en: <a href="https://lamar.mx/" class="">lamar.mx</a></p>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->

        <!--Option 2: jQuery, Popper.js, and Bootstrap JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
        <script src="controlador/encuesta_egresadosV2.js"></script>
    </body>
</html>