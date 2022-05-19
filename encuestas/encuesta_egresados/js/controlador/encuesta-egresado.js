var formulario_valido = false;//variable global para validar el formulario
var alumno_medicina=false;

$(document).on("click", "#subirEncuesta", (e) => {
    e.preventDefault();

    if (validarformulario()) {
        $('#ventanaModal').modal('toggle');
    }

});

$(document).ready(function () {

    //consultamos los datos del egresado al cargar la pagina
    get_datos_agresado(jmatricula);


    //EVENTO click ¿Actualmente estudias?
    $("input[name=130]").click(function () {
        if ($(this).val() == 550) {
            document.getElementById("opc1").style.display = "block";//desglosa las preguntas.
        } else {
            document.getElementById("opc1").style.display = "none";//oculta las preguntas.
            //Si oculta las preguntas se deshabilitan las opciones, para que el usuario pueda seleccionar de nuevo.
            //Limpiamos: ¿Qué estudias? ¿En qué institución estás estudiando actualmente?
            for (var x = 2; x < 17; x++) {
                document.getElementById(x).checked = false;
            }
            $('.otro').hide();
            $('.otro input[type="text"]').val('');
        }
    });

    //EVENTO ¿Iniciaste tu proceso de Titulación?
    $("input[name=133]").click(function () {
        if ($(this).val() == 574) {
            document.getElementById("opc3").style.display = "block";//mostramos ¿Cuánto tiempo, después de tu Egreso pasó para titularte? y ¿En qué Modalidad te titulaste?
            document.getElementById("opc2").style.display = "none";//ocultamos ¿Por qué motivo?
            //Limpiamos el no.
            for (var x = 21; x < 26; x++) {
                //alert(x)
                document.getElementById(x).checked = false;
            }
            $('#dos').hide();
            $('#dos input[type="text"]').val('');

        } else {
            document.getElementById("opc3").style.display = "none";//oculuamos ¿Cuánto tiempo, después de tu Egreso pasó para titularte? y ¿En qué Modalidad te titulaste?
            document.getElementById("opc2").style.display = "block";//mostramos ¿Por qué motivo?
            //Limpiamos el si.
            for (var y = 26; y < 33; y++) {
                document.getElementById(y).checked = false;
            }
            //document.getElementById('otra_modalidad_titulo').value = "";//limpiamos la caja de texto.
            $('#tres').hide();
            $('#tres input[type="text"]').val('');
        }
    });


    //EVENTO ¿Trabajas actualmente?
    $("input[name=22]").click(function () {
        if ($(this).val() == 542) {//SI, a la respuesta.
            document.getElementById("opc4").style.display = "none";//Ocultamos ¿Motivo? 
            document.getElementById("opc6").style.display = "none";//Ocultamos las perguntas 3.14 y 3.15
            document.getElementById("opc5").style.display = "block";//Mostramos las preguntas de la 3.2 a la 3.13

            $("input:radio[name='136']").prop('checked', false);
            $("input:radio[name='137']").prop('checked', false);
            $("input:radio[name='138']").prop('checked', false);
            $("input:radio[name='95']").prop('checked', false);
            $("input:radio[name='143']").prop('checked', false);
            $("input:radio[name='144']").prop('checked', false);
            $("input:radio[name='145']").prop('checked', false);
            $("input:radio[name='146']").prop('checked', false);
            $("input:radio[name='101']").prop('checked', false);

            $('#OtroNoTrabajo').val('');
            $('.oottro').hide();

            $('#otra_situacion_laboral').val('');
            $('.otroo').hide();

        } else {//No, a la respuesta.
            document.getElementById("opc4").style.display = "block";//Mostramos ¿Motivo? 
            document.getElementById("opc6").style.display = "block";//mostramos las perguntas 3.14 y 3.15
            document.getElementById("opc5").style.display = "none";//ocultamos las preguntas de la 3.2 a la 3.13

            $("input:radio[name='181']").prop('checked', false);
            $("input:radio[name='179']").prop('checked', false);
            $("input:radio[name='180']").prop('checked', false);

            $('#OtroGiro').val('');//se limpia Giro de la empresa: Otro ¿Cuál?
            $('.ottro').hide(); //se esconde Giro de la empresa: Otro ¿Cuál?

            $('#OtroEmpleoActual').val('');//se limpia ¿Por qué medio encontraste tu empleo actual? Otro ¿Cuál?
            $('.otrro').hide();//escondemos ¿Por qué medio encontraste tu empleo actual? Otro ¿Cuál?

            $('#612').val('')
            $('#548').val('')
            $('#614').val('')
            $('#1071').val('')

        }
    });



    $("#aceptot").click(function () {
        $('#acepto').removeAttr('disabled');
    });

    //SAVE SURVEY EGRESADO
    $("#acepto").click(function () {
        avisodeprivacidad = 1;

        var formData = new FormData(document.getElementById("form_egresados"))
        formData.append('matricula', jmatricula);
        formData.append('cuestionario', jcuestionario);

        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            url: "php/guardar_cuestionario.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function (xhr) {
                $('#loadingAjax').show();
                $('#acepto').hide();
            }
        }).done(function (data) {
            console.log(data);
            if (data.codigo == 0) {

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Información guardada correctamente',
                    showConfirmButton: false,
                    timer: 3000
                })
                $('#ventanaModal').modal('toggle');
                setTimeout(function () { window.location.href = "https://lamar.mx/"; }, 3010);
            } else {
                Swal.fire(
                    'Ocurrio un error',
                    'Favor de intentar nuevamente',
                    'error'
                )
            }

        }).fail(function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
                icon: 'fail',
                title: 'Ocurrio un error al intentar guardar la información',
                showConfirmButton: true
            })

        }).always(function (jqXHR, textStatus, errorThrown) {
            $('#loadingAjax').hide();
            $('#acepto').show();
        });
    });

    var avisodeprivacidad = 0;

    // function primera() {
    //     let i = 1;
    //     var devolver = 0;
    //     $('input[type=checkbox]').each(function () {

    //         // alert(i);

    //         //Valida si al menos un checkbox es checked 
    //         if ($(this).prop('checked')) {
    //             al_menos_uno = true;
    //         }

    //         if (i % 3 == 0) {
    //             // alert('validar');

    //             if (!al_menos_uno) {
    //                 Swal.fire(
    //                     'Selecciona minimo 1 opción',
    //                     '----------',
    //                     'question'
    //                 )
    //                 devolver += 1;

    //                 //return false;
    //             }
    //             al_menos_uno = false;
    //         }

    //         i++;

    //     });
    //     if (devolver > 0) {
    //         devolver = 1;
    //     }
    //     return devolver;
    // }



    //Oculta combo box de otro en la pregunta 1.7
    $('.otro').hide();
    $('.otr').hide();
    $('.ot').hide();
    $('.otroo').hide();
    $('.ottro').hide();
    $('.otrro').hide();
    $('.oottro').hide();


    //funcion para mostrar y ocultar combo box a la hora de seleccionar de la pregunta 1.7
    $("#primera input[type=radio]").click(function () {
        $('.otro').hide();
        $('.otro input[type="text"]').val('');
    });
    $(".segunda input[type=radio ]").click(function () {
        $('.otr').hide();
        $('.otr input[type="text"]').val('');
    });
    $("#tercera input[type=radio]").click(function () {
        $('.ot').hide();
        $('.ot input[type="text"]').val('');
    });
    $(".cuarta input[type=radio ]").click(function () {
        $('.otroo').hide();
        $('.otroo input[type="text"]').val('');
    });
    $("#quinta input[type=radio ]").click(function () {
        $('.ottro').hide();
        $('.ottro input[type="text"]').val('');
    });

    $("#sexta input[type=radio ]").click(function () {
        $('.otrro').hide();
        $('.otrro input[type="text"]').val('');
    });
    $("#septima input[type=radio ]").click(function () {
        $('.oottro').hide();
        $('.oottro input[type="text"]').val('');
    });


    $(".oot").click(function () {
        $(this).parent().siblings('.otr').show();
    });


    $(".oott").click(function () {
        $(this).parent().siblings('.otro').show();
    });

    $(".oo").click(function () {
        $(this).parent().siblings('.ot').show();
    });


    $(".oottt").click(function () {
        $(this).parent().siblings('.otroo').show();
    });


    $(".oottr").click(function () {
        $(this).parent().siblings('.ottro').show();
    });


    $(".oottrr").click(function () {
        $(this).parent().siblings('.otrro').show();
    });


    $(".ooottt").click(function () {
        $(this).parent().siblings('.oottro').show();
    });
});


