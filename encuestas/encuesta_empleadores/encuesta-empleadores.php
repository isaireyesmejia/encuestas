<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../multimedia/132103.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <title>Encuesta Empleadores</title>
</head>
<script>
    <?php
    $correo = filter_input(INPUT_GET, 'm');
    // $correo = 'ireyesm@lamar.edu.mx';
    ?>
    <?php //$matricula='lic1860'; 
    ?>
    var jcorreo = '<?php echo $correo ?>';
    var jcuestionario = 6;
</script>

<body>
    <br>
    <div class="container">
        <!-- Content here -->
        <div class="card">
            <div class="card-header">
                <h4 class="text-primary">¡Estimado Empleador!</h4>
                <blockquote class="blockquote mb-0">
                    <p><b>El objetivo de esta encuesta, es conocer las necesidades, requerimientos, habilidades y competencias que demanda el mercado laboral, así como métodos de reclutamiento, perfiles deseados y la evaluación que otorga usted y su empresa a los egresados del</b> <label class="text-primary">Centro Universitario Guadalajara LAMAR.</label> <u>La información aportada tiene fines institucionales y es estrictamente confidencial</u>. <label class="text-primary">Agradecemos su colaboración</label>.</p>
                </blockquote>
            </div>
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModal">
                Launch demo modal
            </button> -->
            <!--Contenedor-->
            <div class="card-body">
                <form id="form_empleadores" method="post" enctype="multipart/form-data">
                    <ol>
                        <!--1. DATOS GENERALES-->
                        <b>
                            <li>
                                <h5>DATOS GENERALES </h5>
                            </li>
                        </b>
                        <p><b><label class="text-primary">DEL EMPLEADOR</label></b></p>
                        <div class="form-group">
                            <label for="125">Nombre y Apellidos:</label>
                            <input type="tel" class="form-control" name="125" required="" autocomplete="off" value="">
                        </div>

                        <div class="form-group">
                            <label>¿Puesto que ocupa actualmente: ?</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="208" value="730" class="custom-control-input" id="730">
                                <label class="custom-control-label" for="730">Alta Dirección/Propietario/Socio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="208" value="731" class="custom-control-input" id="731">
                                <label class="custom-control-label" for="731">Mando Intermedio (Jefe, Supervisor, Responsable de Área)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="208" value="732" class="custom-control-input" id="732">
                                <label class="custom-control-label" for="732">Nivel Operativo (Practicante, Promotor, Diseñador, Ejecutivo de ventas, etc.)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="209">Correo electrónico:</label>
                            <input type="mail" class="form-control" name="209" required="" autocomplete="off" value="">
                        </div>
                        <p><b><label class="text-primary">DE LA EMPRESA/ORGANIZACIÓN</label></b></p>

                        <div class="form-group">
                            <label for="inputCity">Nombre:</label>
                            <input type="text" class="form-control" name="209" required="" autocomplete="off" value="">

                            <label for="80">Domicilio:</label>
                            <input type="text" class="form-control" name="80" required="" autocomplete="off" value="">

                            <label for="210">Municipio:</label>
                            <input type="text" class="form-control" name="210" required="" autocomplete="off" value="">

                            <label for="211">Ciudad:</label>
                            <input type="text" class="form-control" name="211" required="" autocomplete="off" value="">

                            <label for="212">Estado:</label>
                            <input type="text" class="form-control" name="212" required="" autocomplete="off" value="">

                            <label for="97">Teléfono:</label>
                            <input type="tel" class="form-control" name="97" required="" autocomplete="off" value="" pattern="^[0-9]{10,10}$" title="Favor de ingresar solo 10 dígitos">

                            <label for="213">Correo electrónico:</label>
                            <input type="email" class="form-control" name="213" required="" autocomplete="off" value="">

                            <label for="214">Página web / redes sociales:</label>
                            <input type="text" class="form-control" name="214" autocomplete="off" value="">
                        </div>


                        <div class="form-group  po">
                            <label>Sector en que se desarrolla la empresa/organización:</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="743" class="custom-control-input" id="743">
                                <label class="custom-control-label" for="743">Educativo /Investigación</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="744" class="custom-control-input" id="744">
                                <label class="custom-control-label" for="744">Industria, Manufactura y/o Construcción</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="745" class="custom-control-input" id="745">
                                <label class="custom-control-label" for="745"> Salud</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="746" class="custom-control-input" id="746">
                                <label class="custom-control-label" for="746">Productos de Consumo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="747" class="custom-control-input" id="747">
                                <label class="custom-control-label" for="747">Turismo</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="748" class="custom-control-input" id="748">
                                <label class="custom-control-label" for="748">Filantrópico (ayuda a los demás)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="749" class="custom-control-input" id="749">
                                <label class="custom-control-label" for="749">Comunicaciones y transportes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="750" class="custom-control-input" id="750">
                                <label class="custom-control-label" for="750">Agrícola-ganadero</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="751" class="custom-control-input" id="751">
                                <label class="custom-control-label" for="751">Gubernamental</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="752" class="custom-control-input" id="752">
                                <label class="custom-control-label" for="752">Sistemas financieros y bancarios</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="753" class="custom-control-input" id="753">
                                <label class="custom-control-label" for="753">Servicios Independientes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="754" class="custom-control-input" id="754">
                                <label class="custom-control-label" for="754">Comercio /ventas</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="215" value="755" class="custom-control-input oott" id="755">
                                <label class="custom-control-label" for="755">Otro </label>
                            </div>
                            <div class="form-group otro">
                                <label> ¿Cuál?</label>
                                <input type="text" class="form-control" name="otro215" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>La empresa/organización es: </label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="216" value="756" class="custom-control-input" id="756">
                                <label class="custom-control-label" for="756">Pública</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="216" value="757" class="custom-control-input" id="757">
                                <label class="custom-control-label" for="757"> Privada</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="216" value="758" class="custom-control-input" id="758">
                                <label class="custom-control-label" for="758"> Organismo de sociedad Civil</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tamaño de la empresa/organización:</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="217" value="759" class="custom-control-input" id="759">
                                <label class="custom-control-label" for="759">Microempresa (hasta 15 empleados)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="217" value="760" class="custom-control-input" id="760">
                                <label class="custom-control-label" for="760"> Pequeña empresa (entre 16 -100 empleados)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="217" value="761" class="custom-control-input" id="761">
                                <label class="custom-control-label" for="761"> Mediana empresa (entre 101-250 empleados) </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="217" value="762" class="custom-control-input" id="762">
                                <label class="custom-control-label" for="762"> Grande empresa (más de 251 empleados)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>¿Cuántos Egresados del Centro Universitario Guadalajara LAMAR trabajan actualmente con usted?</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="218" value="763" class="custom-control-input" id="763">
                                <label class="custom-control-label" for="763">Uno</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="218" value="764" class="custom-control-input" id="764">
                                <label class="custom-control-label" for="764"> Dos</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="218" value="765" class="custom-control-input" id="765">
                                <label class="custom-control-label" for="765"> Tres </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="218" value="766" class="custom-control-input" id="766">
                                <label class="custom-control-label" for="766"> Más de tres</label>
                            </div>
                        </div>

                        <!--END DATOS GENERALES-->
                        <!--</ol>-->
                        <!--<ol>-->

                        <!--2. CRITERIOS DE CONTRATACIÓN-->
                        <b>
                            <li>
                                <h5>CRITERIOS DE CONTRATACIÓN </h5>
                            </li>
                        </b>
                        <div class="form-group">
                            <label>Nivel de estudios que generalmente requiere su empresa/organización para contratación:</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="219" value="767" class="custom-control-input" id="767">
                                <label class="custom-control-label" for="767">Educación Básica</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="219" value="768" class="custom-control-input" id="768">
                                <label class="custom-control-label" for="768"> Bachillerato </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="219" value="769" class="custom-control-input" id="769">
                                <label class="custom-control-label" for="769"> Licenciatura </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="219" value="770" class="custom-control-input" id="770">
                                <label class="custom-control-label" for="770">Posgrado</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>¿Su empresa tiene preferencia por contratar egresados de alguna(s) universidad(es) en particular?</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="220" value="771" id="771" require="">
                                <label class="custom-control-label" for="771">Sí</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="220" value="772" id="772" require="">
                                <label class="custom-control-label" for="772">No</label>
                            </div>
                        </div>
                        <div class="form-group" id="si">
                            <label class="text-primary">(Si su respuesta es afirmativa, marque con una X las universidades por las cuales tiene preferencia para contratación de egresados, SELECCIONE ALMENOS 4 OPCIONES)</label>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="773" class="custom-control-input" id="773">
                                <label class="custom-control-label" for="773">LAMAR</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="774" class="custom-control-input" id="774">
                                <label class="custom-control-label" for="774">TEC</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="775" class="custom-control-input" id="775">
                                <label class="custom-control-label" for="775">ITESO</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="776" class="custom-control-input" id="776">
                                <label class="custom-control-label" for="776">UVM</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="777" class="custom-control-input" id="777">
                                <label class="custom-control-label" for="777">UNIVA </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="778" class="custom-control-input" id="778">
                                <label class="custom-control-label" for="778">UNIVERSIDAD PANAMERICANA </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="779" class="custom-control-input" id="779">
                                <label class="custom-control-label" for="779">UNITEC</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="780" class="custom-control-input" id="780">
                                <label class="custom-control-label" for="780">UTEG</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="781" class="custom-control-input" id="781">
                                <label class="custom-control-label" for="781">UNE</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="782" class="custom-control-input" id="782">
                                <label class="custom-control-label" for="782">UNIVERSIDAD CUAUHTÉMOC</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="checkbox" name="220" value="783" class="custom-control-input ot" id="783">
                                <label class="custom-control-label" for="783">OTRO:</label>
                            </div>
                            <div class="form-group otr">
                                <input type="text" class="form-control" name="otro220" autocomplete="off" id='i'>
                            </div>
                        </div>

                        <div class="form-group">
                            <p>
                                ¿Con <u>qué características considera que egresan</u> los profesionistas de cada una de las universidades referidas a continuación? 
                                <label class="text-primary">Marque con un X aquellas más significativas para usted y su empresa y conforme a su experiencia personal con profesionistas que ha empleado.</label>
                            </p>
                            <table id="table tablauno" data-toggle="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th data-halign="right" data-align="right" data-width="300">Característica</th>
                                        <th data-halign="center" data-align="center">LAMAR</th>
                                        <th data-halign="center" data-align="center">TEC</th>
                                        <th data-halign="center" data-align="center">ITESO</th>

                                        <th data-halign="center" data-align="center">UVM</th>
                                        <th data-halign="center" data-align="center">UNIVA</th>
                                        <th data-halign="center" data-align="center">UP</th>

                                        <th data-halign="center" data-align="center">UNITEC</th>
                                        <th data-halign="center" data-align="center">UTEG</th>
                                        <th data-halign="center" data-align="center">UNE</th>

                                        <th data-halign="center" data-align="center">UC</th>
                                        <th data-halign="center" data-align="center">OTRA*</th>

                                    </tr>
                                </thead>
                                <tbody id="mul">
                                    <tr>
                                        <td>Pasión por el trabajo</td>
                                        <td><input type="checkbox" name="182[]" id="" value="801"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="820"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="839"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="858"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="877"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="896"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="915"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="934"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="953"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="972"></td>
                                        <td><input type="checkbox" name="182[]" id="" value="991" class="ot">
                                        <textarea type="text" class="form-control otr" name="otro182" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Adaptabilidad a los cambios del entorno</td>
                                        <td><input type="checkbox" name="183[]" id="" value="840"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="859"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="878"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="897"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="821"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="802"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="916"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="935"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="954"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="973"></td>
                                        <td><input type="checkbox" name="183[]" id="" value="992" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro183" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Conciencia organizacional</td>
                                        <td><input type="checkbox" name="184[]" id="" value="803"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="822"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="841"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="860"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="879"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="898"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="917"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="936"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="955"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="974"></td>
                                        <td><input type="checkbox" name="184[]" id="" value="993" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro184" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Integridad y compromiso</td>
                                        <td><input type="checkbox" name="185[]" id="" value="804"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="823"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="842"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="861"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="880"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="899"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="918"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="937"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="956"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="975"></td>
                                        <td><input type="checkbox" name="185[]" id="" value="994" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro185" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Perseverancia en la consecución de objetivos</td>
                                        <td><input type="checkbox" name="186[]" id="" value="805"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="824"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="843"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="862"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="881"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="900"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="919"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="938"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="957"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="976"></td>
                                        <td><input type="checkbox" name="186[]" id="" value="995" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro186" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Compromiso con la calidad del trabajo</td>
                                        <td><input type="checkbox" name="187[]" id="" value="806"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="825"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="844"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="863"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="882"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="901"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="920"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="939"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="958"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="977"></td>
                                        <td><input type="checkbox" name="187[]" id="" value="996" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro187" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dirección y desarrollo de equipos de trabajo</td>
                                        <td><input type="checkbox" name="188[]" id="" value="807"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="826"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="845"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="864"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="883"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="902"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="921"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="940"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="959"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="978"></td>
                                        <td><input type="checkbox" name="188[]" id="" value="997" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro188" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Liderazgo para el cambio</td>
                                        <td><input type="checkbox" name="189[]" id="" value="808"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="827"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="846"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="865"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="884"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="903"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="922"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="941"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="960"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="979"></td>
                                        <td><input type="checkbox" name="189[]" id="" value="998" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro189" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Influencia, negociación y motivación</td>
                                        <td><input type="checkbox" name="190[]" id="" value="809"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="828"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="847"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="866"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="885"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="904"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="923"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="942"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="961"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="980"></td>
                                        <td><input type="checkbox" name="190[]" id="" value="999" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro190" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Temple y dinamismo</td>
                                        <td><input type="checkbox" name="191[]" id="" value="810"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="829"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="848"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="867"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="886"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="905"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="924"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="943"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="962"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="981"></td>
                                        <td><input type="checkbox" name="191[]" id="" value="1000" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro191" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Visión estratégica</td>
                                        <td><input type="checkbox" name="192[]" id="" value="811"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="830"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="849"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="868"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="887"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="906"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="925"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="944"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="963"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="982"></td>
                                        <td><input type="checkbox" name="192[]" id="" value="1001" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro192" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Conducción de personas</td>
                                        <td><input type="checkbox" name="193[]" id="" value="812"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="831"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="850"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="869"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="888"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="907"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="926"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="945"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="964"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="983"></td>
                                        <td><input type="checkbox" name="193[]" id="" value="1002" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro193" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Calidad y mejora contínua</td>
                                        <td><input type="checkbox" name="194[]" id="" value="813"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="832"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="851"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="870"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="889"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="908"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="927"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="946"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="965"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="984"></td>
                                        <td><input type="checkbox" name="194[]" id="" value="1003" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro194" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Trabajo en equipo</td>
                                        <td><input type="checkbox" name="195[]" id="" value="814"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="833"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="852"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="871"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="890"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="909"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="928"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="947"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="966"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="985"></td>
                                        <td><input type="checkbox" name="195[]" id="" value="1004" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro195" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Conocimientos técnicos</td>
                                        <td><input type="checkbox" name="196[]" id="" value="815"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="834"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="853"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="872"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="891"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="910"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="929"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="948"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="967"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="986"></td>
                                        <td><input type="checkbox" name="196[]" id="" value="1005" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro196" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Comunicación eficaz</td>
                                        <td><input type="checkbox" name="197[]" id="" value="816"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="835"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="854"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="873"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="892"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="911"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="930"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="949"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="968"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="987"></td>
                                        <td><input type="checkbox" name="197[]" id="" value="1006" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro197" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Orientación a resultados</td>
                                        <td><input type="checkbox" name="198[]" id="" value="817"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="836"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="855"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="874"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="893"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="912"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="931"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="950"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="969"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="988"></td>
                                        <td><input type="checkbox" name="198[]" id="" value="1007" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro198" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Orientación al cliente interno y externo</td>
                                        <td><input type="checkbox" name="199[]" id="" value="818"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="837"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="856"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="875"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="894"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="913"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="932"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="951"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="970"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="989"></td>
                                        <td><input type="checkbox" name="199[]" id="" value="1008" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro199" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Iniciativa-autonomía</td>
                                        <td><input type="checkbox" name="200[]" id="" value="819"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="838"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="857"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="876"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="895"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="914"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="933"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="952"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="971"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="990"></td>
                                        <td><input type="checkbox" name="200[]" id="" value="1009" class="ot">
                                            <textarea type="text" class="form-control otr" name="otro200" required="" autocomplete="off" id='i'></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group" id="tablados">
                            <p>
                                Indique con una “x” el (los) factores que más toma en cuenta su empresa para contratar a egresados universitarios.
                                <label class="text-primary">Selecciona 3 opciones y marca el nivel de importancia de cada una (sólo puedes elegir una opción "Alto", una "Medio y una "Bajo")</label>
                            </p>
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th data-halign="center" data-align="right" data-width="300">Aspectos</th>
                                        <th data-halign="center" data-align="center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="prioridad">
                                    <tr>
                                        <td>Que esté titulado</td>
                                        <td>
                                            <input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="227" id="1011" value="1011" class="uno">
                                            <label class="la " for="1011">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="227" id="1018" value="1018" class="dos">
                                            <label class="la " for="1018">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="227" id="1025" value="1025" class="tres">
                                            <label class="la " for="1025">Bajo</label>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Experiencia Profesional</td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="228" id="1012" value="1012" class="uno">
                                            <label class="la " for="1012">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="228" id="1019" value="1019" class="dos">
                                            <label class="la " for="1019">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="228" id="1026" value="1026" class="tres">
                                            <label class="la " for="1026">Bajo</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pruebas para selección de personal (conocimientos y psicométricas) </td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="229" id="1013" value="1013" class="uno">
                                            <label class="la " for="1013">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="229" id="1020" value="1020" class="dos">
                                            <label class="la " for="1020">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="229" id="1027" value="1027" class="tres">
                                            <label class="la " for="1027">Bajo</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Prestigio de la Institución de procedencia</td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="230" id="1014" value="1014" class="uno">
                                            <label class="la " for="1014">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="230" id="1021" value="1021" class="dos">
                                            <label class="la " for="1021">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="230" id="1028" value="1028" class="tres">
                                            <label class="la " for="1028">Bajo</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recomendación</td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="231" id="1015" value="1015" class="uno">
                                            <label class="la" for="1015">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="231" id="1022" value="1022" class="dos">
                                            <label class="la" for="1022">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="231" id="1029" value="1029" class="tres">
                                            <label class="la" for="1029">Bajo</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Integridad y honestidad</td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="206" id="1010" value="1010" class="uno">
                                            <label class="la " for="1010">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="206" id="1017" value="1017" class="dos">
                                            <label class="la " for="1017">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="206" id="1024" value="1024" class="tres">
                                            <label class="la " for="1024">Bajo</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otro:</td>
                                        <td><input type="checkbox" class="checkboxevaluar">&nbsp&nbsp&nbsp
                                            <input type="radio" name="232" id="1016" value="1016" class="uno">
                                            <label class="la " for="1016">Alto</label>&nbsp&nbsp
                                            <input type="radio" name="232" id="1023" value="1023" class="dos">
                                            <label class="la " for="1023">Medio</label>&nbsp&nbsp
                                            <input type="radio" name="232" id="1030" value="1030" class="tres">
                                            <label class="la " for="1030">Bajo</label>
                                            <div class="la">
                                                <input type="text" class="form-control " name="otro232" required="" autocomplete="off" id='i'>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="form-group" id="segun">
                            <label>Su fuente principal de reclutamiento es:</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="221" value="784" class="custom-control-input" id="784">
                                <label class="custom-control-label" for="784"> Recomendación</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="221" value="785" class="custom-control-input" id="785">
                                <label class="custom-control-label" for="785">Prácticas Profesionales y/o Servicio social </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="221" value="786" class="custom-control-input" id="786">
                                <label class="custom-control-label" for="786">Redes sociales</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="221" value="787" class="custom-control-input" id="787">
                                <label class="custom-control-label" for="787">Bolsa de trabajo digital (OCC, LinkedIn etc.) </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="221" value="788" class="custom-control-input oot" id="788">
                                <label class="custom-control-label" for="788">Otro:</label>
                            </div>
                            <div class="form-group otroo">
                                <label>(especifique) </label>
                                <input type="text" class="form-control" name="otro221" required="" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Desde su experiencia, ¿cómo evalúa el desempeño laboral de los egresados del Centro Universitario Guadalajara LAMAR?</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="222" value="789" class="custom-control-input" id="789">
                                <label class="custom-control-label" for="789">Muy Bueno</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="222" value="790" class="custom-control-input" id="790">
                                <label class="custom-control-label" for="790">Bueno</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="222" value="791" class="custom-control-input" id="791">
                                <label class="custom-control-label" for="791">Regular</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="222" value="792" class="custom-control-input" id="792">
                                <label class="custom-control-label" for="792">Malo</label>
                            </div>
                        </div>
                        <!--End 2.- CRITERIOS DE CONTRATACIÓN-->

                        <!--Punto 3 SOBRE CONOCIMIENTOS, COMPETENCIAS Y HABILIDADES-->
                        <b>
                            <li>
                                <h5>SOBRE CONOCIMIENTOS, COMPETENCIAS Y HABILIDADES</h5>
                            </li>
                        </b>

                        <div class="form-group" id="tablatres">
                            <label for="exampleInputEmail1">A continuación, presentamos un listado de conocimientos, competencias y habilidades. <label class="text-primary">Marque con una X aquellos que usted considera que se requieren para destacar como un empleado exitoso en su empresa y cuáles reconoce en un egresado de Universidad LAMAR. </label></label>

                            <!--<small class="form-text text-muted">Marca con una X tu nivel de satisfacción. </small>-->
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th data-halign="right" data-align="right" data-width="300">Conocimientos, Competencias y Habilidades</th>
                                        <th data-halign="center" data-align="center">Para destacar en mi empresa</th>
                                        <th data-halign="center" data-align="center">Egresado LAMAR</th>
                                    </tr>
                                </thead>
                                <tbody id='un'>
                                    <tr>
                                        <td>Pasión por el trabajo</td>
                                        <td><input type="checkbox" name="233[]" id="" value="1032"></td>
                                        <td><input type="checkbox" name="233[]" id="" value="1051"></td>
                                    </tr>
                                    <tr>
                                        <td>Adaptabilidad a los cambios del entorno</td>
                                        <td><input type="checkbox" name="234[]" id="" value="1033"></td>
                                        <td><input type="checkbox" name="234[]" id="" value="1052"></td>
                                    </tr>
                                    <tr>
                                        <td>Conciencia organizacional</td>
                                        <td><input type="checkbox" name="235[]" id="" value="1034"></td>
                                        <td><input type="checkbox" name="235[]" id="" value="1053"></td>
                                    </tr>
                                    <!--                                        <tr>
                                            <td>Accountability</td>
                                            <td><input type="radio" name="111" id="" value="490" required=""></td>
                                            <td><input type="radio" name="111" id="" value="491" required=""></td>
                                        </tr>-->
                                    <tr>
                                        <td>Integridad y compromiso</td>
                                        <td><input type="checkbox" name="236[]" id="" value="1035"></td>
                                        <td><input type="checkbox" name="236[]" id="" value="1054"></td>
                                    </tr>
                                    <tr>
                                        <td>Perseverancia en la consecución de objetivos</td>
                                        <td><input type="checkbox" name="237[]" id="" value="1036"></td>
                                        <td><input type="checkbox" name="237[]" id="" value="1055"></td>
                                    </tr>
                                    <tr>
                                        <td>Compromiso con la calidad del trabajo</td>
                                        <td><input type="checkbox" name="238[]" id="" value="1037"></td>
                                        <td><input type="checkbox" name="238[]" id="" value="1056"></td>
                                    </tr>
                                    <tr>
                                        <td>Dirección y desarrollo de equipos de trabajo</td>
                                        <td><input type="checkbox" name="239[]" id="" value="1038"></td>
                                        <td><input type="checkbox" name="239[]" id="" value="1057"></td>
                                    </tr>
                                    <tr>
                                        <td>Liderazgo para el cambio</td>
                                        <td><input type="checkbox" name="240[]" id="" value="1039"></td>
                                        <td><input type="checkbox" name="240[]" id="" value="1058"></td>
                                    </tr>
                                    <tr>
                                        <td>Influencia, negociación y motivación</td>
                                        <td><input type="checkbox" name="241[]" id="" value="1040"></td>
                                        <td><input type="checkbox" name="241[]" id="" value="1059"></td>
                                    </tr>
                                    <!--                                        <tr>
                                            <td>Empowerment</td>
                                            <td><input type="radio" name="118" id="" value="518" required=""></td>
                                            <td><input type="radio" name="118" id="" value="519" required=""></td>  
                                        </tr>-->
                                    <tr>
                                        <td>Temple y dinamismo</td>
                                        <td><input type="checkbox" name="242[]" id="" value="1041"></td>
                                        <td><input type="checkbox" name="242[]" id="" value="1060"></td>
                                    </tr>
                                    <tr>
                                        <td>Visión estratégica</td>
                                        <td><input type="checkbox" name="243[]" id="" value="1042"></td>
                                        <td><input type="checkbox" name="243[]" id="" value="1061"></td>
                                    </tr>
                                    <tr>
                                        <td>Conducción de personas</td>
                                        <td><input type="checkbox" name="244[]" id="" value="1043"></td>
                                        <td><input type="checkbox" name="244[]" id="" value="1062"></td>
                                    </tr>
                                    <tr>
                                        <td>Calidad y mejora contínua</td>
                                        <td><input type="checkbox" name="245[]" id="" value="1044"></td>
                                        <td><input type="checkbox" name="245[]" id="" value="1063"></td>
                                    </tr>
                                    <tr>
                                        <td>Trabajo en equipo</td>
                                        <td><input type="checkbox" name="203[]" id="" value="1031"></td>
                                        <td><input type="checkbox" name="203[]" id="" value="1050"></td>
                                    </tr>

                                    <tr>
                                        <td>Conocimientos técnicos</td>
                                        <td><input type="checkbox" name="246[]" id="" value="1045"></td>
                                        <td><input type="checkbox" name="246[]" id="" value="1064"></td>
                                    </tr>
                                    <tr>
                                        <td>Comunicación eficaz</td>
                                        <td><input type="checkbox" name="247[]" id="" value="1046"></td>
                                        <td><input type="checkbox" name="247[]" id="" value="1065"></td>
                                    </tr>
                                    <tr>
                                        <td>Orientación a resultados</td>
                                        <td><input type="checkbox" name="248[]" id="" value="1047"></td>
                                        <td><input type="checkbox" name="248[]" id="" value="1066"></td>
                                    </tr>
                                    <tr>
                                        <td>Orientación al cliente interno y externo</td>
                                        <td><input type="checkbox" name="249[]" id="" value="1048"></td>
                                        <td><input type="checkbox" name="249[]" id="" value="1067"></td>
                                    </tr>
                                    <tr>
                                        <td>Iniciativa-autonomía</td>
                                        <td><input type="checkbox" name="250[]" id="" value="1049"></td>
                                        <td><input type="checkbox" name="250[]" id="" value="1068"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <label>Desde su punto de vista ¿cuáles son los aspectos o temas en que deben capacitarse, sumado a lo aprendido durante su carrera, o actualizarse los profesionistas del ramo que contrata?</label>
                            <textarea class="form-control" name="223" rows="3"></textarea>
                        </div>
                        <!--End 3.- SOBRE CONOCIMIENTOS, COMPETENCIAS Y HABILIDADES-->

                        <!--4.- SOBRE EGRESADOS DEL CENTRO UNIVERSITARIO GUADALAJARA LAMAR EN SU EMPRESA-->
                        <b>
                            <li>
                                <h5>SOBRE EGRESADOS DEL CENTRO UNIVERSITARIO GUADALAJARA LAMAR EN SU EMPRESA</h5>
                            </li>
                        </b>

                        <div class="form-group">
                            <label for="inputAddress">¿Qué nivel jerárquico promedio ocupa un Egresado del Centro Universitario Guadalajara LAMAR en su empresa?</label><br>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="224" value="794" class="custom-control-input" id="794">
                                <label class="custom-control-label" for="794">Alta Dirección/Propietario </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="224" value="795" class="custom-control-input" id="795">
                                <label class="custom-control-label" for="795">Mando Intermedio (Jefe, Supervisor, Responsable de Área)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="224" value="796" class="custom-control-input" id="796">
                                <label class="custom-control-label" for="796">Nivel Operativo (Practicante, Promotor, Diseñador, Ejecutivo de ventas, etc.)</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">¿Cuál es el salario Mensual Promedio de un egresado del Centro Universitario Guadalajara LAMAR en su empresa?</label><br>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="225" value="797" class="custom-control-input" id="797">
                                <label class="custom-control-label" for="797">Entre 5 y 10 mil</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="225" value="798" class="custom-control-input" id="798">
                                <label class="custom-control-label" for="798">Entre 10 y 15 mil</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="225" value="799" class="custom-control-input" id="799">
                                <label class="custom-control-label" for="799">Entre 15 y 25 mil</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="225" value="800" class="custom-control-input" id="800">
                                <label class="custom-control-label" for="800">Más de 25 mil</label>
                            </div>
                        </div>
                        <!--End 4.- SOBRE EGRESADOS DEL CENTRO UNIVERSITARIO GUADALAJARA LAMAR EN SU EMPRESA-->

                    </ol>
                    <!--Se cierran los numeradores principales-->
                    <!--</ul>-->

                    <strong><label class="text-primary">Muchas gracias por responder la encuesta, todos sus comentarios son importantes para seguir creciendo y ofrecer una educación de calidad para egresar grandes profesionistas.</label></strong>
                    <br><br>
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">Aviso de privacidad</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Manifiesto que los datos e información otorgados son ciertos y autorizo al Centro Universitario Guadalajara LAMAR, el tratamiento de los mismos, en los términos previstos en el aviso de privacidad de dicha institución, mismo que puedo consultar en: <a href="https://lamar.mx/aviso-de-privacidad" target="_blank">lamar.mx</a></p>
                            <button type="submit" id="subirEncuesta" class="btn btn-primary" data-toggle="modal"> Aceptar </button>

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
                                                <iframe class="embed-responsive-item" src="https://argos.lamar.mx/encuestas/encuesta_egresados/avisoprivacidad.html" frameborder="0" height="300" allow="fullscreen"></iframe>
                                                <button id="aceptot" class="btn " type="button"><strong>Acepto Los Terminos (enseguida da click en "Aceptar")</strong></button>
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
                </form>
            </div>
            <!--End Contenedor-->
        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>-->

    <!--Option 2: jQuery, Popper.js, and Bootstrap JS-->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="js/encuestas-empleadores.js"></script>

</body>

</html>