<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/132103.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">

    <title>Encuesta Egresados</title>
</head>
<script>
    <?php
    $matricula = filter_input(INPUT_GET, 'm');

    //SOLO USADO EN EL DESARROLLO

    //función que nos permite encriptar una contraseña
    // function encrypt($string, $key)
    // {
    //     $result = '';
    //     for ($i = 0; $i < strlen($string); $i++) {
    //         $char = substr($string, $i, 1);
    //         $keychar = substr($key, ($i % strlen($key)) - 1, 1);
    //         $char = chr(ord($char) + ord($keychar));
    //         $result .= $char;
    //     }
    //     return base64_encode($result);
    // }

    // $matricula = encrypt('lme4465', 'agresadoslamar');


    /**
     * END
     */

    ?>

    var jmatricula = '<?php echo $matricula ?>';
    var jcuestionario = 5;
</script>

<body>
    <br>
    <div class="container">
        <!-- Content here -->
        <div class="card">
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModal">
                Launch demo modal
            </button> -->
            <div class="card-header">
                <h4 class="text-primary">¡Estimado Egresado <label id='encuestado'></label>!</h4>
                <blockquote class="blockquote mb-0">
                    <p>Queremos conocer información relevante sobre tu trayectoria y formación profesional. <u>La información aportada tiene fines institucionales y es estrictamente confidencial</u>. Te recordamos que para nosotros es muy importante mantenernos en comunicación contigo e informarte sobre eventos, actividades y nuevas ofertas académicas que pueden ser de tu interés. <label class="text-primary">No olvides Mantener actualizados tus datos.</label> </p>
                    <!--<footer class="blockquote-footer">La información aportada tiene fines institucionales y es estrictamente confidencial.-->
                    <!--<cite title="Source Title">Source Title</cite>-->
                    <!--</footer>-->
                    <p>A nombre del <label class="text-primary">Centro Universitario Guadalajara LAMAR</label>, agradecemos tu apoyo y colaboración.</p>
                </blockquote>
            </div>
            <div class="card-body">
                <form id="form_egresados" method="post" enctype="multipart/form-data">
                    <ol>
                        <b>
                            <li>
                                <h5>Datos Generales</h5>
                            </li>
                        </b>
                        <div class="form-row">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" id="80">
                                <label for="80">1.1 Domicilio:</label>
                                <input type="text" value="" class="form-control" name="80" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row" id="83_head">
                            <div class="form-group col-md-6">
                                <label for="83">1.2 Correo electrónico personal:</label>
                                <input type="text" value="" class="form-control" id="83" name="83" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6" id="">
                                <label for="127"> 1.3 Correo electrónico alterno:</label>
                                <input type="email" class="form-control" id="127" name="127" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row" id="tel_head">
                            <div class="form-group col-md-6">
                                <label for="129">1.4 Teléfono celular:</label>
                                <input type="text" value="" value='' class="form-control" id="129" name="129" autocomplete="off">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="81">1.5. Teléfono de casa:</label>
                                <input type="text" class="form-control" id="81" name="81" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group" id="130_head">
                            <label>1.6 ¿Actualmente estudias?</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="130" value="550" class="custom-control-input" id="550">
                                <label class="custom-control-label" for="550">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="130" value="551" class="custom-control-input" id="551">
                                <label class="custom-control-label" for="551">No</label>
                            </div>
                        </div>
                        <div id="opc1" style="display:none;">
                            <div class="form-group" id="131_head">
                                <label>1.7 ¿Qué estudias?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="131" value="552" class="custom-control-input" id="2">
                                    <label class="custom-control-label" for="2">Maestría</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="131" value="553" class="custom-control-input" id="3">
                                    <label class="custom-control-label" for="3">Especialidad</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="131" value="554" class="custom-control-input" id="4">
                                    <label class="custom-control-label" for="4">Diplomado</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="131" value="555" class="custom-control-input" id="5">
                                    <label class="custom-control-label" for="5">Otra licenciatura</label>
                                </div>
                            </div>
                            <div class="form-group " id="primera">
                                <label>1.8 ¿En qué institución estás estudiando actualmente?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="556" class="custom-control-input" id="6">
                                    <label class="custom-control-label" for="6">LAMAR</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="557" class="custom-control-input" id="7">
                                    <label class="custom-control-label" for="7">TEC</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="558" class="custom-control-input" id="8">
                                    <label class="custom-control-label" for="8">ITESO</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="559" class="custom-control-input" id="9">
                                    <label class="custom-control-label" for="9">UVM</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="560" class="custom-control-input" id="10">
                                    <label class="custom-control-label" for="10">UNIVA</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="561" class="custom-control-input" id="11">
                                    <label class="custom-control-label" for="11">UNIVERSIDAD PANAMERICANA</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="562" class="custom-control-input" id="12">
                                    <label class="custom-control-label" for="12">UNITEC</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="563" class="custom-control-input" id="13">
                                    <label class="custom-control-label" for="13">UTEG</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="564" class="custom-control-input" id="14">
                                    <label class="custom-control-label" for="14">UNE</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="565" class="custom-control-input" id="15">
                                    <label class="custom-control-label" for="15">UNIVERSIDAD CUAUHTÉMOC</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="132" value="566" class="custom-control-input oott" id="16">
                                    <label class="custom-control-label" for="16">Otra:</label>
                                </div>
                                <div class="form-group otro">
                                    <input type="text" class="form-control" name="otro132" id="otra_institucion" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <b>
                            <li id="133_head">
                                <h5>Sobre tu Titulación</h5>
                            </li>
                        </b>
                        <div class="form-group">
                            <label>2.1. ¿Iniciaste tu proceso de Titulación?</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="133" value="574" id="574">
                                <label class="custom-control-label" for="574">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="133" value="575" id="575">
                                <label class="custom-control-label" for="575">No</label>
                            </div>
                        </div>
                        <div class="form-group segunda" id="opc2" style="display:none;">
                            <label>¿Por qué motivo?</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="176" value="576" class="custom-control-input" id="21">
                                <label class="custom-control-label" for="21">Falta de tiempo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="176" value="577" class="custom-control-input" id="22">
                                <label class="custom-control-label" for="22">Problemas económicos</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="176" value="578" class="custom-control-input" id="23">
                                <label class="custom-control-label" for="23">Falta de asesoría</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="176" value="579" class="custom-control-input" id="24">
                                <label class="custom-control-label" for="24">No he concluido mis Prácticas Profesionales o mi Servicio Social</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="176" value="580" class="custom-control-input oot" id="25">
                                <label class="custom-control-label" for="25">Otro:</label>
                            </div>
                            <div class="form-group otr" id="dos">
                                <input type="text" class="form-control" name="otro176" id="" autocomplete="off">
                            </div>
                        </div>
                        <div id="opc3" style="display:none;">
                            <div class="form-group" id="134_head">
                                <label for="inputAddress">2.2. ¿Cuánto tiempo, después de tu Egreso pasó para titularte? </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="134" value="581" class="custom-control-input" id="26">
                                    <label class="custom-control-label" for="26">Menos de 1 año</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="134" value="582" class="custom-control-input" id="27">
                                    <label class="custom-control-label" for="27">Entre 1 y 2 años</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="134" value="583" class="custom-control-input" id="28">
                                    <label class="custom-control-label" for="28">Más de 2 años</label>
                                </div>
                            </div>
                            <div class="form-group " id="tercera">
                                <label>2.3. ¿En qué Modalidad te titulaste?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="135" value="584" class="custom-control-input" id="29">
                                    <label class="custom-control-label" for="29">Tesis , tesina</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="135" value="585" class="custom-control-input" id="30">
                                    <label class="custom-control-label" for="30">Desempeño Académico sobresaliente</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="135" value="586" class="custom-control-input" id="31">
                                    <label class="custom-control-label" for="31">Exámenes (CENEVAL, Global teórico/Práctico, etc. )</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="135" value="587" class="custom-control-input oo" id="32">
                                    <label class="custom-control-label" for="32">Otra:</label>
                                </div>
                                <div class="form-group ot" id="tres">
                                    <label>Especifica:</label>
                                    <input type="text" class="form-control" name="otro135" id="otro135" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <b>
                            <li>
                                <h5>Situación Laboral</h5>
                            </li>
                        </b>
                        <div class="form-group" id="22_head">
                            <label>3.1 ¿Trabajas actualmente?
                            </label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="22" value="542" class="custom-control-input" id="542">
                                <label class="custom-control-label" for="542">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="22" value="543" class="custom-control-input" id="543">
                                <label class="custom-control-label" for="543">No</label>
                            </div>
                        </div>
                        <div id="opc4" class="form-group cuarta" style="display:none;">
                            <label>
                                ¿Por qué motivo?
                            </label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="181" value="634" class="custom-control-input" id="634">
                                <label class="custom-control-label" for="634">Mi poca experiencia laboral</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="181" value="635" class="custom-control-input" id="635">
                                <label class="custom-control-label" for="635">La Carrera que elegí estudiar</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="181" value="636" class="custom-control-input" id="636">
                                <label class="custom-control-label" for="636">Mi situación personal</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="181" value="637" class="custom-control-input" id="637">
                                <label class="custom-control-label" for="637">Ofertas de trabajo poco atractivas</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="181" value="638" class="custom-control-input oottt" id="638">
                                <label class="custom-control-label" for="638">Otro:</label>
                                <br>
                            </div>
                            <div class="form-group otroo" id="cuatro">
                                <label>Especifique:</label>
                                <input type="text" class="form-control" name="otro181" id="otra_situacion_laboral" autocomplete="off">
                            </div>
                        </div>
                        <div id="opc5" style="display:none;">
                            <div class="form-group" id="136_head">
                                <label>3.2 ¿Cuánto tiempo te llevó encontrar un trabajo?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="136" value="588" class="custom-control-input" id="430">
                                    <label class="custom-control-label" for="430">Trabajo desde que estudiaba</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="136" value="589" class="custom-control-input" id="431">
                                    <label class="custom-control-label" for="431">1 a 3 meses</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="136" value="590" class="custom-control-input" id="432">
                                    <label class="custom-control-label" for="432">3 a 6 meses</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="136" value="591" class="custom-control-input" id="433">
                                    <label class="custom-control-label" for="433">6 meses a 1 año </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="form-inline">
                                        <input type="radio" name="136" value="592" class="custom-control-input" id="434">
                                        <label class="custom-control-label" for="434">Más de un año</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="137_head">
                                <label>3.3¿Tu trabajo está relacionado con tu carrera?</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="137" value="593" class="custom-control-input" id="435">
                                    <label class="custom-control-label" for="435">Sí</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="137" value="594" class="custom-control-input" id="436">
                                    <label class="custom-control-label" for="436">No</label>
                                </div>
                            </div>
                            <div class="form-group" id="138_head">
                                <label>3.4 Tamaño de la empresa en que laboras:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="138" value="595" class="custom-control-input" id="437">
                                    <label class="custom-control-label" for="437">Microempresa (hasta 15 empleados)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="138" value="596" class="custom-control-input" id="438">
                                    <label class="custom-control-label" for="438">Pequeña empresa (entre 16 -100 empleados)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="138" value="597" class="custom-control-input" id="439">
                                    <label class="custom-control-label" for="439">Mediana empresa (entre 101-250 empleados)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="138" value="598" class="custom-control-input" id="440">
                                    <label class="custom-control-label" for="440">Grande empresa (más de 251 empleados)</label>
                                </div>
                            </div>
                            <div class="form-group " id="quinta">
                                <label>3.5 Giro de la empresa:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="599" class="custom-control-input" id="441">
                                    <label class="custom-control-label" for="441">Educativo /Investigación</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="600" class="custom-control-input" id="442">
                                    <label class="custom-control-label" for="442">Industria, Manufactura y/o Construcción</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="601" class="custom-control-input" id="443">
                                    <label class="custom-control-label" for="443">Salud</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="602" class="custom-control-input" id="444">
                                    <label class="custom-control-label" for="444">Productos de Consumo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="603" class="custom-control-input" id="445">
                                    <label class="custom-control-label" for="445">Turismo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="604" class="custom-control-input" id="446">
                                    <label class="custom-control-label" for="446">Filantrópico (ayuda a los demás)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="605" class="custom-control-input" id="447">
                                    <label class="custom-control-label" for="447">Comunicaciones y transportes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="606" class="custom-control-input" id="448">
                                    <label class="custom-control-label" for="448">Agrícola-ganadero</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="607" class="custom-control-input" id="449">
                                    <label class="custom-control-label" for="449">Gubernamental</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="608" class="custom-control-input" id="450">
                                    <label class="custom-control-label" for="450">Sistemas financieros y bancarios</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="609" class="custom-control-input" id="451">
                                    <label class="custom-control-label" for="451">Servicios Independientes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="95" value="610" class="custom-control-input" id="452">
                                    <label class="custom-control-label" for="452">Comercio /ventas</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="form-inline">
                                        <input type="radio" name="95" value="611" class="custom-control-input oottr" id="453">
                                        <label class="custom-control-label" for="453"> Otro </label>
                                        <br>
                                    </div>
                                    <div class="ottro" id="cinco">
                                        <label> ¿Cuál?</label>
                                        <input type="text" class="form-control" name="otro95" id="OtroGiro" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="datos_empresa">
                                <label for="612">3.6 Nombre de la empresa: </label>
                                <input type="text" value='' name="96" id="612" class="form-control" autocomplete="off">
                                <label for="548">3.7 Teléfono de la empresa: </label>
                                <input type="text" value='' name="97" id="548" class="form-control" autocomplete="off" pattern="^[0-9]{10,10}$" title="Favor de ingresar solo 10 dígitos">
                                <label for="614">3.8 Nombre del Jefe inmediato:</label>
                                <input type="text" value='' name="98" id="614" class="form-control" autocomplete="off">
                                <label for="1071">3.9 Correo electrónico de Jefe inmediato/empresa:</label>
                                <input type="email" value='' class="form-control" id="1071" name="252" autocomplete="off">
                            </div>
                            <div class="form-group" id="143_head">
                                <label>3.10 El puesto que ocupas actualmente pertenece a:</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="143" value="615" class="custom-control-input" id="457">
                                    <label class="custom-control-label" for="457">Alta Dirección/Propietario</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="143" value="616" class="custom-control-input" id="458">
                                    <label class="custom-control-label" for="458">Mando Intermedio (Jefe, Supervisor, Responsable de Área)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="143" value="617" class="custom-control-input" id="459">
                                    <label class="custom-control-label" for="459">Nivel Operativo (Practicante, Promotor, Diseñador, Ejecutivo de ventas, etc.)</label>
                                </div>
                            </div>
                            <div class="form-group" id="144_head">
                                <label for="inputAddress">3.11 ¿A cuánto ascendía tu salario inicial mensual?</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="144" value="618" class="custom-control-input" id="618">
                                    <label class="custom-control-label" for="618">Entre 5 y 10 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="144" value="619" class="custom-control-input" id="619">
                                    <label class="custom-control-label" for="619">Entre 10 y 15 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="144" value="620" class="custom-control-input" id="620">
                                    <label class="custom-control-label" for="620">Entre 15 y 25 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="144" value="621" class="custom-control-input" id="621">
                                    <label class="custom-control-label" for="621">Más de 25 mil</label>
                                </div>
                            </div>
                            <div class="form-group" id="145_head">
                                <label for="inputAddress">3.12 ¿A cuánto asciende tu salario mensual actualmente?</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="145" value="630" class="custom-control-input" id="630">
                                    <label class="custom-control-label" for="630">Entre 5 y 10 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="145" value="631" class="custom-control-input" id="631">
                                    <label class="custom-control-label" for="631">Entre 10 y 15 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="145" value="632" class="custom-control-input" id="632">
                                    <label class="custom-control-label" for="632">Entre 15 y 25 mil</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="145" value="633" class="custom-control-input" id="633">
                                    <label class="custom-control-label" for="633">Más de 25 mil</label>
                                </div>
                            </div>
                            <div class="form-group" id="146_head">
                                <label for="inputAddress">3.13 Tipo de prestaciones laborales:</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="146" value="622" class="custom-control-input" id="468">
                                    <label class="custom-control-label" for="468">Iguales a las de la ley</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="146" value="623" class="custom-control-input" id="469">
                                    <label class="custom-control-label" for="469">Inferiores a las de la ley</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="146" value="624" class="custom-control-input" id="470">
                                    <label class="custom-control-label" for="470">Superiores a las de la ley</label>
                                </div>
                            </div>
                            <div class="form-group " id="sexta">
                                <label for="inputAddress">3.14 ¿Por qué medio encontraste tu empleo actual?</label><br>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="101" value="625" class="custom-control-input" id="471">
                                    <label class="custom-control-label" for="471">Recomendación</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="101" value="626" class="custom-control-input" id="472">
                                    <label class="custom-control-label" for="472">Prácticas Profesionales y/o Servicio social</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="101" value="627" class="custom-control-input" id="473">
                                    <label class="custom-control-label" for="473">Redes sociales</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="101" value="628" class="custom-control-input" id="474">
                                    <label class="custom-control-label" for="474">Bolsa de trabajo digital (OCC, LinkedIn etc.)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="form-inline">
                                        <input type="radio" name="101" value="629" class="custom-control-input oottrr" id="475">
                                        <label class="custom-control-label" for="475">Otro</label>
                                        <br>
                                    </div>
                                    <div class="otrro" id="seis">
                                        <label>¿Cuál?</label>
                                        <input type="text" class="form-control" name="otro101" id="OtroEmpleoActual" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="opc6" style="display:none;">
                            <div class="form-group" id="179_head">
                                <label for="inputAddress">3.14 ¿Cuánto tiempo tienes sin trabajar?</label><br>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="179" value="720" class="custom-control-input" id="476">
                                    <label class="custom-control-label" for="476">Menos de 6 meses</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="179" value="721" class="custom-control-input" id="477">
                                    <label class="custom-control-label" for="477">De 6 meses a un año</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="179" value="722" class="custom-control-input" id="478">
                                    <label class="custom-control-label" for="478">Más de un año</label>
                                </div>
                            </div>
                            <div class="form-group " id="septima">
                                <label for="inputAddress">3.15 Motivo más importante por el cual no trabajas</label><br>

                                <div class="custom-control custom-radio">
                                    <input type="radio" name="180" value="723" class="custom-control-input" id="479">
                                    <label class="custom-control-label" for="479">No he encontrado, pero estoy buscando </label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="180" value="724" class="custom-control-input" id="480">
                                    <label class="custom-control-label" for="480">No necesito trabajar</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="180" value="725" class="custom-control-input" id="481">
                                    <label class="custom-control-label" for="481">Aún no lo he buscado</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="180" value="726" class="custom-control-input" id="482">
                                    <label class="custom-control-label" for="482">Decidí continuar estudiando</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="180" value="727" class="custom-control-input" id="483">
                                    <label class="custom-control-label" for="483">Por razones de salud</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <div class="form-inline">
                                        <input type="radio" name="180" value="728" class="custom-control-input ooottt" id="484">
                                        <label class="custom-control-label" for="484">Otro </label>
                                        <br>
                                    </div>
                                    <div class=oottro id="siete">
                                        <label>Especifique:</label>
                                        <input type="text" class="form-control" name="otro180" id="OtroNoTrabajo" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <b>
                            <li>
                                <h5>Conocimientos, Competencias, Habilidades y Valores</h5>
                            </li>
                        </b>
                        <div class="form-group">
                            <label for="exampleInputEmail1">4.1. El la siguiente tabla, enlista conocimientos, competencias y habilidades importantes en el desarrollo de tu profesión dentro del mercado laboral. <label class="text-primary">Marca con una X en la primera columna aquellas con las cuáles ingresaste a LAMAR, en la segunda con cuales egresaste y en la última las posees hoy. </label>
                                <table id="table" data-toggle="table">
                                    <thead>
                                        <tr class="table-primary">
                                            <th data-halign="right" data-align="right" data-width="300">COMPETENCIAS Y HABILIDADES</th>
                                            <th data-halign="center" data-align="center">A mi ingreso a LAMAR</th>
                                            <th data-halign="center" data-align="center">Al egresar de LAMAR</th>
                                            <th data-halign="center" data-align="center">Hoy</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="check">Pasión por el trabajo</td>
                                            <td><input type="checkbox" name="182[]" id="" value="642"></td>
                                            <td><input type="checkbox" name="182[]" id="" value="661"></td>
                                            <td><input type="checkbox" name="182[]" id="" value="680"></td>
                                        </tr>
                                        <tr>
                                            <td id="check">Adaptabilidad a los cambios del entorno</td>
                                            <td><input type="checkbox" name="183[]" id="" value="643"></td>
                                            <td><input type="checkbox" name="183[]" id="" value="662"></td>
                                            <td><input type="checkbox" name="183[]" id="" value="681"></td>
                                        </tr>
                                        <tr>
                                            <td id="check">Conciencia organizacional</td>
                                            <td><input type="checkbox" name="184[]" id="" value="644"></td>
                                            <td><input type="checkbox" name="184[]" id="" value="663"></td>
                                            <td><input type="checkbox" name="184[]" id="" value="682"></td>
                                        </tr>
                                        <tr>
                                            <td id="check">Integridad y compromiso</td>
                                            <td><input type="checkbox" name="185[]" id="" value="645"></td>
                                            <td><input type="checkbox" name="185[]" id="" value="664"></td>
                                            <td><input type="checkbox" name="185[]" id="" value="683"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Perseverancia en la consecución de objetivos</td>
                                            <td><input type="checkbox" name="186[]" id="" value="646"></td>
                                            <td><input type="checkbox" name="186[]" id="" value="665"></td>
                                            <td><input type="checkbox" name="186[]" id="" value="684"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Compromiso con la calidad del trabajo</td>
                                            <td><input type="checkbox" name="187[]" id="" value="647"></td>
                                            <td><input type="checkbox" name="187[]" id="" value="666"></td>
                                            <td><input type="checkbox" name="187[]" id="" value="685"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Dirección y desarrollo de equipos de trabajo</td>
                                            <td><input type="checkbox" name="188[]" id="" value="648"></td>
                                            <td><input type="checkbox" name="188[]" id="" value="667"></td>
                                            <td><input type="checkbox" name="188[]" id="" value="686"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Liderazgo para el cambio</td>
                                            <td><input type="checkbox" name="189[]" id="" value="649"></td>
                                            <td><input type="checkbox" name="189[]" id="" value="668"></td>
                                            <td><input type="checkbox" name="189[]" id="" value="687"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Influencia, negociación y motivación</td>
                                            <td><input type="checkbox" name="190[]" id="" value="650"></td>
                                            <td><input type="checkbox" name="190[]" id="" value="669"></td>
                                            <td><input type="checkbox" name="190[]" id="" value="688"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Temple y dinamismo</td>
                                            <td><input type="checkbox" name="191[]" id="" value="651"></td>
                                            <td><input type="checkbox" name="191[]" id="" value="670"></td>
                                            <td><input type="checkbox" name="191[]" id="" value="689"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Visión estratégica</td>
                                            <td><input type="checkbox" name="192[]" id="" value="652"></td>
                                            <td><input type="checkbox" name="192[]" id="" value="671"></td>
                                            <td><input type="checkbox" name="192[]" id="" value="690"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Conducción de personas</td>
                                            <td><input type="checkbox" name="193[]" id="" value="653"></td>
                                            <td><input type="checkbox" name="193[]" id="" value="672"></td>
                                            <td><input type="checkbox" name="193[]" id="" value="691"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Calidad y mejora contínua</td>
                                            <td><input type="checkbox" name="194[]" id="" value="654"></td>
                                            <td><input type="checkbox" name="194[]" id="" value="673"></td>
                                            <td><input type="checkbox" name="194[]" id="" value="691"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Trabajo en equipo</td>
                                            <td><input type="checkbox" name="195[]" id="" value="655"></td>
                                            <td><input type="checkbox" name="195[]" id="" value="674"></td>
                                            <td><input type="checkbox" name="195[]" id="" value="693"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Conocimientos técnicos</td>
                                            <td><input type="checkbox" name="196[]" id="" value="656"></td>
                                            <td><input type="checkbox" name="196[]" id="" value="675"></td>
                                            <td><input type="checkbox" name="196[]" id="" value="694"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Comunicación eficaz</td>
                                            <td><input type="checkbox" name="197[]" id="" value="657"></td>
                                            <td><input type="checkbox" name="197[]" id="" value="676"></td>
                                            <td><input type="checkbox" name="197[]" id="" value="695"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Orientación a resultados</td>
                                            <td><input type="checkbox" name="198[]" id="" value="658"></td>
                                            <td><input type="checkbox" name="198[]" id="" value="677"></td>
                                            <td><input type="checkbox" name="198[]" id="" value="696"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Orientación al cliente interno y externo</td>
                                            <td><input type="checkbox" name="199[]" id="" value="659"></td>
                                            <td><input type="checkbox" name="199[]" id="" value="678"></td>
                                            <td><input type="checkbox" name="199[]" id="" value="697"></td>
                                        </tr>
                                        <tr id="check">
                                            <td>Iniciativa-autonomía</td>
                                            <td><input type="checkbox" name="200[]" id="" value="660"></td>
                                            <td><input type="checkbox" name="200[]" id="" value="679"></td>
                                            <td><input type="checkbox" name="200[]" id="" value="698"></td>
                                        </tr>
                                        <tr id="check_1" style="display:none;">
                                            <td>Investigación</td>
                                            <td><input type="checkbox" name="253[]" id="" value="660"></td>
                                            <td><input type="checkbox" name="253[]" id="" value="679"></td>
                                            <td><input type="checkbox" name="253[]" id="" value="698"></td>
                                        </tr>
                                        <tr id="check_2" style="display:none;">
                                            <td>Internacionalización</td>
                                            <td><input type="checkbox" name="254[]" id="" value="660"></td>
                                            <td><input type="checkbox" name="254[]" id="" value="679"></td>
                                            <td><input type="checkbox" name="254[]" id="" value="698"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">4.2. La siguiente tabla, enlista algunos valores.</label><br>
                            <label class="text-primary">Marca con una X en la primera columna aquellos con las cuáles ingresaste a LAMAR, en la segunda los que tenías al egresar y en la última los que tienes al día de hoy.</label>
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th data-halign="right" data-align="right" data-width="300">VALORES</th>
                                        <th data-halign="center" data-align="center">Valores a mi Ingreso a Lamar</th>
                                        <th data-halign="center" data-align="center">A mi Egreso de LAMAR</th>
                                        <th data-halign="center" data-align="center">Al día de hoy </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Innovación</td>
                                        <td><input type="checkbox" name="201[]" id="" value="699"></td>
                                        <td><input type="checkbox" name="201[]" id="" value="706"></td>
                                        <td><input type="checkbox" name="201[]" id="" value="713"></td>

                                    </tr>
                                    <tr>
                                        <td>Liderazgo</td>
                                        <td><input type="checkbox" name="202[]" id="" value="700"></td>
                                        <td><input type="checkbox" name="202[]" id="" value="707"></td>
                                        <td><input type="checkbox" name="202[]" id="" value="714"></td>

                                    </tr>
                                    <tr>
                                        <td>Trabajo en equipo</td>
                                        <td><input type="checkbox" name="203[]" id="" value="701"></td>
                                        <td><input type="checkbox" name="203[]" id="" value="708"></td>
                                        <td><input type="checkbox" name="203[]" id="" value="715"></td>

                                    </tr>
                                    <tr>
                                        <td>Respeto y equidad</td>
                                        <td><input type="checkbox" name="204[]" id="" value="702"></td>
                                        <td><input type="checkbox" name="204[]" id="" value="709"></td>
                                        <td><input type="checkbox" name="204[]" id="" value="716"></td>
                                    </tr>
                                    <tr>
                                        <td>Creatividad</td>
                                        <td><input type="checkbox" name="205[]" id="" value="703"></td>
                                        <td><input type="checkbox" name="205[]" id="" value="710"></td>
                                        <td><input type="checkbox" name="205[]" id="" value="717"></td>
                                    </tr>
                                    <tr>
                                        <td>Integridad y honestidad</td>
                                        <td><input type="checkbox" name="206[]" id="" value="704"></td>
                                        <td><input type="checkbox" name="206[]" id="" value="711"></td>
                                        <td><input type="checkbox" name="206[]" id="" value="718"></td>
                                    </tr>
                                    <tr>
                                        <td>Confianza</td>
                                        <td><input type="checkbox" name="207[]" id="" value="705"></td>
                                        <td><input type="checkbox" name="207[]" id="" value="712"></td>
                                        <td><input type="checkbox" name="207[]" id="" value="719"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group" id="174_head">
                            <label for="inputAddress">5. ¿Recomendarías a otra persona realizar sus estudios en LAMAR? </label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="174" value="639" class="custom-control-input" id="639">
                                <label class="custom-control-label" for="639">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="174" value="640" class="custom-control-input" id="640">
                                <label class="custom-control-label" for="640">No</label>
                            </div>
                        </div>
                        <div id="add_two" style="display:none;">
                            <label>6. A dos años en tu ejercicio profesional, ¿Qué comentario de mejora aportarías al contenido del plan y programa de estudios cursado durante tu licenciatura?</label>
                            <textarea class="form-control" name="255" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label id="comentario_add">6. ¿Tienes algún comentario adicional?</label>
                            <textarea class="form-control" name="107" rows="3"></textarea>
                        </div>
                    </ol>
                    <br>
                </form>
                <strong><label class="text-primary">Muchas gracias por responder la encuesta, todos tus comentarios son importantes para seguir creciendo y ofrecer una educación y servicio de calidad.</label></strong>
                <br><br>
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">Aviso de privacidad</h5>
                    </div>
                    <div class="card-body">
                        <button id="subirEncuesta" class="btn btn-primary"> Aceptar </button>
                    </div>
                </div>

            </div>
            <!--End Contenedor-->
        </div>
    </div>

    <style>
        body {
            background-color: #FFF;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        h3 {
            color: #002161;
        }

        .alert {
            background-color: #002161;
        }

        h6 {
            color: #FFF;
        }

        .btn {
            background-color: #4892C1;
            color: #FFF;
        }
    </style>
    <main class="container">
        <div class="modal fade bd-example-modal" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Aviso de Privacidad</h3>
                    </div>
                    <div class="modal-body">
                        <div id="Primera" class="alert">
                            <h6><strong>Sus datos se enviaran una vez que acepte las politicas de privacidad</strong></h6>
                            <div class="modal-content">
                                <iframe class="embed-responsive-item" src="./avisoprivacidad.html" frameborder="0" height="300" allow="fullscreen"></iframe>
                                <button id="aceptot" class="btn " type="button"><strong>Aceptar los términos y da click en ACEPTAR</strong></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id='loadingAjax' style="display:none;">
                            <p>
                                <em>guardando información...</em>
                                <image src='../multimedia/loading.gif'></image>
                            </p>
                        </div>
                        <button id="acepto" class="btn  mt1" type="button" disabled>Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->
    <!--Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <script src="js/jquery.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="js/controlador/encuesta-egresado.js"></script>
    <script src="js/modelo/encuesta-egresado.js"></script>
</body>

</html>