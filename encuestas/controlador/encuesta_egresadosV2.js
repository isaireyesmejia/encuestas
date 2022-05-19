$(document).ready(function () {

    $('#otro').hide();
    $('#otroc').hide();
    $('#es').hide();
    $('#traot').hide();
    $('#situacion_laboral_si').hide();
    $('#situacion_laboral_no').hide();

    $("input[name=90]").click(function () {
        if ($(this).val() == 423) {
            $('#situacion_laboral_si').show();
            $('#situacion_laboral_no').hide();
        } else {
            $('#situacion_laboral_no').show();
            $('#situacion_laboral_si').hide();
        }
    });

    $("#cual input[type=radio]").click(function () {
        if ($(this).val() == 421 || $(this).val() == 422) {
            $('#otro').hide();
            $("[name='124']").attr("required", false);
            $('#otro input[type="text"]').val('');
        }
        else {
            $('#otro').show();
            $("[name='124']").attr("required", true);
        }
    });

    $("#giro input[type=radio ]").click(function () {
        $('#otroc').hide();
        $("[name='otro95']").attr("required", false);
        $('#otroc input[type="text"]').val('');
    });
    $("#453").click(function () {
        $('#otroc').show();
        $("[name='otro95']").attr("required", true);
    });

    $("#espe input[type=radio ]").click(function () {
        $('#es').hide();
        $("[name='otro101']").attr("required", false);
        $('#es input[type="text"]').val('');
    });
    $("#4ot").click(function () {
        $('#es').show();
        $("[name='otro101']").attr("required", true);
    });

    $("#tra input[type=radio ]").click(function () {
        $('#traot').hide();
        $("[name='otro92']").attr("required", false);
        $('#traot input[type="text"]').val('');
    });
    $("#432").click(function () {
        $('#traot').show();
        $("[name='otro92']").attr("required", true);
    });

    $('#encu').on('submit', function(event) {
        $("#idcarga").css("display", "block");                      
        $("#enviarEncuesta").css("display", "none");              
    });

});
