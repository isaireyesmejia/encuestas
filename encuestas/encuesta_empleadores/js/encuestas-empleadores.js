$(document).ready(function () {

    var limite = 3;

    $('#prioridad input[type=radio] ').hide();//// 2.4 tabla

    $('.la').hide(); //// 2.4 tabla
    $('#si').hide();///// 2.2 pregunta si o no
    //Oculta combo box de otro en la pregunta 
    $('.otro').hide();
    $('.otr').hide();
    $('.otroo').hide();
    /////////////////////////////////// pregunta 2.5

    //funcion para mostrar y ocultar combo box a la hora de seleccionar  la pregunta 
    $("#segun input[type=radio ]").click(function () {
        $('.otroo').hide();
        $('.otroo input[type="text"]').val('');
    });

    $(".oot").click(function () {
        $(this).parent().siblings('.otroo').show();
    });

    //////////////// PREGUNTA 1.9
    $(".po input[type=radio ]").click(function () {
        $('.otro').hide();
        $('.otro input[type="text"]').val('');
    });

    $(".oott").click(function () {
        $(this).parent().siblings('.otro').show();
    });


    ////////////////////////////////////  checkbox 2.2 PREGUNTA
    $('.ot').change(function () {
        if (!$(this).prop('checked')) {
            $(this).parent().siblings('.otr').hide();
            $('.otr input[type="text"]').val('');
        } else {
            $(this).parent().siblings('.otr').show();
        }
    })
    //////////////////////////// TABLA 2.3
    $('.ot').change(function () {
        if (!$(this).prop('checked')) {
            $(this).siblings('.otr').hide();
            $(this).siblings('.otr ').val('');
        } else {
            $(this).siblings('.otr').show();
        }

    })


    //////////////////////////////////////// 2.4 tabla
    $('#prioridad input[type=checkbox]').change(function () {

        if ($("#prioridad input[type=checkbox]:checked").length > limite) {
            this.checked = false;
        }
        if (this.checked == true) {
            $(this).siblings('#prioridad input[type=radio]').show();
            $(this).siblings('.la').show();
        }
        else {
            $(this).siblings('#prioridad input[type=radio]').hide();
            $(this).siblings('.la ').hide();
            $('.la input[type="text"]').val('');
        }

        $("#prioridad input:radio").change(function () {
            var checkname = $(this).attr("class");
            if (this.checked) {
                $("#prioridad input:radio[class='" + checkname + "']").not(this).prop("checked", false);
            }
        });

    });
    /////////////////////////////////////////// 2.2 pregunta si o no
    $('#771').click(function () {
        if ($(this).prop('checked')) {
            $('#si').show();
        }
    });
    $('#772').click(function () {
        if ($(this).prop('checked')) {
            $('#si').hide();
            $("#si input:checkbox").not(this).prop("checked", false);
            $('.otr input[type="text"]').val('');
            $('.otr').hide();

        }
    });
});

$('#si input[type=checkbox]').change(function () {
    if ($('#si input[type=checkbox]:checked').length > 4) {
        this.checked = false;
    }
});

$("#aceptot").click(function () {
    $('#acepto').removeAttr('disabled');
});

$("#acepto").click(function () {
    avisodeprivacidad = 1;
    //enviar el formulario 

    var formData = new FormData(document.getElementById("form_empleadores"))
    formData.append('correo', jcorreo);

    for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    //mandamos a guardar los datos del formulario
    $.ajax({
        url: "php/guardar_evaluacion.php",
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
    }).done(function (data, textStatus, jqXHR) {
        console.log(data.codigo);
        if (data.codigo == 0) {
            
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Información guardada correctamente',
                showConfirmButton: false,
                timer: 3000
              })
            $('#ventanaModal').modal('toggle');
            setTimeout( function() { window.location.href = "https://lamar.mx/"; }, 3010 );
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

function validarfomrulario() {
    var validar = 0;
    validar = primera();

    if (validar != 1) {
        validar += segunda();
    }
    if (validar != 1) {
        validar += tercera();
    }
    if (validar != 1) {
        validar += cuarta();
    }

    if (validar == 0) {
        if (avisodeprivacidad == 0) {
            $('#ventanaModal').modal('toggle');
        } else {
            //enviar el formulario porque el aviso ya fue aceptado previamente
        }
    }
}

$(document).on("click", "#subirEncuesta", () => {
    validarfomrulario();
});

// $("#form_empleadores").submit(function (event) {
//     // alert("Handler for .submit() called.");
//     event.preventDefault();
//     //validarfomrulario()
//     // $('#ventanaModal').modal('toggle');
// });

/*
// $(document).on("click", "#subirEncuesta", () => {
    //     preventDefault();
    //     stopInmediatePropagation();
    //     alert('ver ventana modal');
    //     // validarfomrulario();
    //     // $('#ventanaModal').modal('toggle');       
    // });

    $("#form_egresados").submit(function (event) {
        // alert("Handler for .submit() called.");
        event.preventDefault();
        validarfomrulario()
        // $('#ventanaModal').modal('toggle');
    });
*/



function primera() {
    var devolver = 0;
    if ($('#771').prop('checked')) {
        if ($('#si input[type=checkbox]:checked').length < 4) {

            Swal.fire(
                'Selecciona minimo 4 primera opciones',
                '----------',
                'question'
            )
            window.location.hash = '#si';
            devolver = 1;

        }
    }
    return devolver;
}
///////////////////////// 2.3 tabla
function segunda() {
    let i = 1;
    var al_menos_uno = false;
    var devolver = 0;
    $('#mul input[type=checkbox]').each(function () {
        if ($(this).prop('checked')) {
            al_menos_uno = true;
        }
        if (i % 11 == 0) {
            if (!al_menos_uno) {
                Swal.fire(
                    'Selecciona minimo 1 segunda opcion',
                    '----------',
                    'question'
                )
                window.location.hash = '#tablauno';
                devolver = 1;
            }
            al_menos_uno = false;
        }
        i++;
    });
    return devolver;
}

////////////////////////////////////////////// 2.4 tabla
function tercera() {
    var checke = 0;
    var devolver = 0;
    var filass = $('#prioridad').find('tr');
    for (l = 0; l < filass.length; l++) {
        var celdass = $(filass[l]).find('td');
        columnas = $(celdass[1]).children("input");
        var totaldeuno = 0
        var totaldedos = 0
        var totaldetres = 0
        var totalcheck = 0
        $('.checkboxevaluar:checked').each(
            function () {
                totalcheck++;
            }
        );
        $('.uno:checked').each(
            function () {
                totaldeuno++;
            }
        );
        $('.dos:checked').each(
            function () {
                totaldedos++;
            }
        );
        $('.tres:checked').each(
            function () {
                totaldetres++;
            }
        );

    }
    if (totalcheck < 3) {
        Swal.fire(
            'Selecciona minimo 3  opciones',
            'Te faltan:  ' + (3 - totalcheck),
            'question'
        )
        window.location.hash = '#tablados';
        devolver = 1;
    } else if (totaldeuno == 0 || totaldedos == 0 || totaldetres == 0) {
        Swal.fire(
            'te falto seleccionar un nivel',
            'error',
            'question'
        )
        window.location.hash = '#tablados';
        devolver = 1;
    }
    return devolver;
}



//////////////////////////////////////////////////////////////////////////// 3.1 tabla
function cuarta() {
    var filas = $('#un').find('tr');
    var check = 0;
    var devolver = 0;
    for (i = 0; i < filas.length; i++) {
        var celdas = $(filas[i]).find('td');
        columna1 = $(celdas[1]).children("input");
        columna2 = $(celdas[2]).children("input");
        if (columna1.is(":checked") || columna2.is(":checked")) {
            check++;
        }
    }

    if (check < 5) {
        Swal.fire(
            'Selecciona minimo 5 opciones',
            'Te faltan:  ' + (5 - check),
            'question'
        )
        window.location.hash = '#tablatres';
        devolver = 1;
    }
    return devolver;
}
