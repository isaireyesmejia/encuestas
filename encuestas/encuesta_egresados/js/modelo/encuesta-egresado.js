const email_personal = document.getElementById('83');//email personal
const emailRegExpCorreoPersonal = /^[\w.%+-]+@[^lamar|LAMAR][\w.-]+\.[a-zA-Z]{2,4}$/;

const email_alterno = document.getElementById('127');//email alterno
const emailRegExpCorreoAlterno = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

const telcel = document.getElementById('129');
const telRegExp = /^[0-9]{10,10}$/;

const telhome = document.getElementById('81');

//consultamos lod datos del egresado
function get_datos_agresado(egresado) {
    $.ajax({
        data: {
            matricula: egresado
        },
        type: 'POST',
        dataType: 'json',
        url: 'php/get_UltRegAca.php',
        timeout: 8000,
        beforeSend: function (xhr) {

        }
    }).done(function (data, textStatus, jqXHR) {

        let nombre = data.resultados[0].Nombre_Completo_VC;
        let curso = data.resultados[0].Curso_CH;

        console.log(data);
        $('#encuestado').html(nombre);

        if (curso.trim() == 'LME') {
            $('#add_two').show();
            $('#comentario_add').html('7. ¿Tienes algún comentario adicional?');
            $('#check_1').show();
            $('#check_2').show();
        }

    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert("La sollicitud a fallado: " + textStatus + ' jqXHR ' + jqXHR + ' errorThrown ' + errorThrown);
    }).always(function () {

    });
}

function validarformulario() {

    //Validamos que el domicilio tenga valor
    if ($("input[name=80]").val().trim() == '') {
        $('#subirEncuesta').blur();
        goToId("80");
        Swal.fire(
            'Favor de ingresar dato en:',
            'Domicilio',
            'error'
        )
        $("input[name=80]").val('');
        return formulario_valido = false;
    }

    //validamos que el correo personal sea abligatorio y que no sea de lamar
    const test_correo_personal = email_personal.value.length > 0 & emailRegExpCorreoPersonal.test(email_personal.value);
    if (!test_correo_personal) {
        $('#subirEncuesta').blur();
        goToId("83_head");
        Swal.fire(
            'Favor de indicar un correo válido que no sea de lamar en:',
            'Correo electrónico personal',
            'error'
        )
        return formulario_valido = false;
    }

    //validamos que el correo alterno si no es vacio que sea de formato válido
    if (email_alterno.value.length > 0) {
        const test_correo_alterno = emailRegExpCorreoAlterno.test(email_alterno.value);
        if (!test_correo_alterno) {
            $('#subirEncuesta').blur();
            goToId("83_head");
            Swal.fire(
                'Favor de indicar un correo válido en:',
                'Correo electrónico alterno',
                'error'
            )
            return formulario_valido = false;
        }
    }

    //validamos el teléfono celular obligarotio y de 10 dígitos
    const test_telcel = telcel.value.length > 0 & telRegExp.test(telcel.value);
    if (!test_telcel) {
        $('#subirEncuesta').blur();
        goToId("tel_head");
        Swal.fire(
            'Favor de indicar teléfono de 10 dígitos en:',
            'Teléfono celular',
            'error'
        )
        return formulario_valido = false;
    }

    //validamos el teléfono de casa
    if (telhome.value.length > 0) {
        $('#subirEncuesta').blur();
        goToId("tel_head");
        const test_telhome = (telcel.value != telhome.value) & telRegExp.test(telhome.value);
        if (!test_telhome) {
            Swal.fire(
                'Favor de indicar teléfono de 10 dígitos y diferente al teléfono celular en:',
                'Teléfono de casa',
                'error'
            )
            return formulario_valido = false;
        }
    }

    //validar ¿Actualmente estudias?
    if (!$("#form_egresados input[name='130']:radio").is(':checked')) {
        $('#subirEncuesta').blur();
        goToId("130_head");
        Swal.fire(
            'Favor de seleccionar una opción en:',
            '¿Actualmente estudias?',
            'error'
        )
        return formulario_valido = false;
    } else if ($('#form_egresados input:radio[name=130]:checked').val() == '550') {
        if (!$("#form_egresados input[name='131']:radio").is(':checked')) {
            $('#subirEncuesta').blur();
            goToId("131_head");
            Swal.fire(
                'Favor de seleccionar una opción en:',
                '¿Qué estudias?',
                'error'
            )
            return formulario_valido = false;
        } else if (!$("#form_egresados input[name='132']:radio").is(':checked')) {
            $('#subirEncuesta').blur();
            goToId("primera");
            Swal.fire(
                'Favor de seleccionar una opción en:',
                '¿En qué institución estás estudiando actualmente?',
                'error'
            )
            return formulario_valido = false;
        } else {
            if ($('#form_egresados input:radio[name=132]:checked').val() == '566') {
                $("#tercera input[type=radio ]")
                if ($('#otra_institucion').val().trim() == '') {
                    $('#subirEncuesta').blur();
                    goToId("16");
                    Swal.fire(
                        'Favor de llenar el campo en:',
                        'Otra:',
                        'error'
                    )
                    $('#otra_institucion').val('')
                    return formulario_valido = false;
                }
            }
        }

    }

    //validar ¿Iniciaste tu proceso de Titulación
    if (!$("#form_egresados input[name='133']:radio").is(':checked')) {
        $('#subirEncuesta').blur();
        goToId("133_head");
        Swal.fire(
            'Favor de seleccionar una opción en:',
            '¿Iniciaste tu proceso de Titulación?',
            'error'
        )
        return formulario_valido = false;
    } else {
        if ($('#form_egresados input:radio[name=133]:checked').val() == '574') {
            if (!$("#form_egresados input[name='134']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("134_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Cuánto tiempo, después de tu Egreso pasó para titularte?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='135']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("tercera");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿En qué Modalidad te titulaste?',
                    'error'
                )
                return formulario_valido = false;
            } else {
                if ($('#form_egresados input:radio[name=135]:checked').val() == '587') {
                    if ($('#otro135').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("tercera");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            'Otra Especifica:',
                            'error'
                        )
                        $('#otro135').val('');
                        return formulario_valido = false;
                    }
                }
            }
        } else if ($('#form_egresados input:radio[name=133]:checked').val() == '575') {
            if (!$("#form_egresados input[name='176']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("opc2");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Por qué motivo?',
                    'error'
                )
                return formulario_valido = false;
            } else {
                if ($('#form_egresados input:radio[name=176]:checked').val() == '580') {
                    if ($('#dos input[type=text]').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("opc2");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            '¿Por qué motivo? Otro:',
                            'error'
                        )
                        $('#dos input[type=text]').val('')
                        return formulario_valido = false;
                    }
                }
            }
        }
    }

    //validar Situación Laboral
    if (!$("#form_egresados input[name='22']:radio").is(':checked')) {
        $('#subirEncuesta').blur();
        goToId("22_head");
        Swal.fire(
            'Favor de seleccionar una opción en:',
            '¿Trabajas actualmente?',
            'error'
        )
        return formulario_valido = false;
    } else {
        if ($('#form_egresados input:radio[name=22]:checked').val() == '542') {
            if (!$("#form_egresados input[name='136']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("136_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Cuánto tiempo te llevó encontrar un trabajo?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='137']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("137_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Tu trabajo está relacionado con tu carrera?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='138']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("138_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    'Tamaño de la empresa en que laboras:',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='95']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("quinta");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    'Giro de la empresa:',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='143']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("143_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    'El puesto que ocupas actualmente pertenece a:',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='144']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("144_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿A cuánto ascendía tu salario inicial mensual?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='145']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("145_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿A cuánto asciende tu salario mensual actualmente?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='146']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("146_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    'Tipo de prestaciones laborales:',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='101']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("sexta");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Por qué medio encontraste tu empleo actual?',
                    'error'
                )
                return formulario_valido = false;
            } else {
                if ($('#form_egresados input:radio[name=95]:checked').val() == '611') {

                    if ($('#OtroGiro').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("quinta");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            'Giro de la empresa: Otro ¿Cuál?',
                            'error'
                        )
                        $('#OtroGiro').val('');
                        return formulario_valido = false;
                    }
                }
                if ($('#form_egresados input:radio[name=101]:checked').val() == '629') {
                    if ($('#OtroEmpleoActual').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("sexta");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            '¿Por qué medio encontraste tu empleo actual? Otro',
                            'error'
                        )
                        $('#OtroEmpleoActual').val('');
                        return formulario_valido = false;
                    }
                }
                if ($('#612').val().trim() == '') {
                    $('#subirEncuesta').blur();
                    goToId("datos_empresa");
                    Swal.fire(
                        'Favor de llenar el campo en:',
                        'Nombre de la empresa:',
                        'error'
                    )
                    $('#612').val('');
                    return formulario_valido = false;
                }
                if (!telRegExp.test($('#548').val())) {
                    $('#subirEncuesta').blur();
                    goToId("datos_empresa");
                    Swal.fire(
                        'Favor de llenar el campo con 10 dígitos en:',
                        'Teléfono de la empresa:',
                        'error'
                    )
                    $('#548').val('');
                    return formulario_valido = false;
                }
                if ($('#614').val().trim() == '') {
                    $('#subirEncuesta').blur();
                    goToId("datos_empresa");
                    Swal.fire(
                        'Favor de llenar el campo en:',
                        'Nombre del Jefe inmediato:',
                        'error'
                    )
                    $('#614').val('')
                    return formulario_valido = false;
                }
                if (!emailRegExpCorreoAlterno.test($('#1071').val())) {
                    $('#subirEncuesta').blur();
                    goToId("datos_empresa");
                    Swal.fire(
                        'Favor de llenar el campo con un corre válido en:',
                        'Correo electrónico de Jefe inmediato/empresa:',
                        'error'
                    )
                    $('#1071').val('')
                    return formulario_valido = false;
                }
            }
        } else if ($('#form_egresados input:radio[name=22]:checked').val() == '543') {
            if (!$("#form_egresados input[name='181']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("opc4");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Por qué motivo?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='179']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("179_head");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    '¿Cuánto tiempo tienes sin trabajar?',
                    'error'
                )
                return formulario_valido = false;
            } else if (!$("#form_egresados input[name='180']:radio").is(':checked')) {
                $('#subirEncuesta').blur();
                goToId("septima");
                Swal.fire(
                    'Favor de seleccionar una opción en:',
                    'Motivo más importante por el cual no trabajas',
                    'error'
                )
                return formulario_valido = false;
            } else {
                if ($('#form_egresados input:radio[name=181]:checked').val() == '638') {
                    if ($('#otra_situacion_laboral').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("opc4");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            '¿Por qué motivo? Otro Especifique:',
                            'error'
                        )
                        $('#otra_situacion_laboral').val('');
                        return formulario_valido = false;
                    }
                }
                if ($('#form_egresados input:radio[name=180]:checked').val() == '728') {
                    if ($('#OtroNoTrabajo').val().trim() == '') {
                        $('#subirEncuesta').blur();
                        goToId("septima");
                        Swal.fire(
                            'Favor de llenar el campo en:',
                            'Motivo más importante por el cual no trabajas Otro Especifique:',
                            'error'
                        )
                        $('#OtroNoTrabajo').val('');
                        return formulario_valido = false;
                    }
                }
            }
        }
    }

    //validar ¿Recomendarías a otra persona realizar sus estudios en LAMAR?
    if (!$("#form_egresados input[name='174']:radio").is(':checked')) {
        $('#subirEncuesta').blur();
        goToId("174_head");
        Swal.fire(
            'Favor de seleccionar una opción en:',
            '¿Recomendarías a otra persona realizar sus estudios en LAMAR?',
            'error'
        )
        return formulario_valido = false;
    }

    return true;

}


function goToId(idName) {
    if ($("#" + idName).length) {
        var target_offset = $("#" + idName).offset();
        var target_top = target_offset.top;
        $('html,body').animate({ scrollTop: target_top }, { duration: "slow" });
    }
}