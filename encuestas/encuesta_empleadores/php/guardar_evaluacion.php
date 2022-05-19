<?php
include 'conexion.php';


$calendarizacion = 34;
// $evaluador = $_POST['correo'];
// $evaluador=null;
// echo decrypt($test, 'empleadoreslamar');
$evaluador = decrypt($_POST['correo'], 'empleadoreslamar');
$eje = 'lamar';
$ente = '';
$codigo = 0;



$sql = 'exec ?=co_Insertar_Evaluacion ?,?,?,?,?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
$stmt->bindParam(2, $calendarizacion, PDO::PARAM_INT);
$stmt->bindParam(3, $evaluador, PDO::PARAM_STR);
$stmt->bindParam(4, $eje, PDO::PARAM_STR);
$stmt->bindParam(5, $ente, PDO::PARAM_STR);
$stmt->bindParam(6, $salida, PDO::PARAM_STR, 5000);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

while ($stmt->nextRowset()) {
    $stmt->nextRowset();
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

unset($_POST['correo']);
$cuestionario = 6;
$bandera = 1;
foreach ($_POST as $campo => $valor) {
    $sql = 'exec ?=co_Insertar_Evaluacion_Preguntas ?,?,?,?,?,?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
    $stmt->bindParam(2, $calendarizacion, PDO::PARAM_INT);
    $stmt->bindParam(3, $cuestionario, PDO::PARAM_INT);
    $stmt->bindParam(4, $evaluador, PDO::PARAM_STR);
    $stmt->bindParam(5, $eje, PDO::PARAM_STR);
    $stmt->bindParam(6, $campo, PDO::PARAM_STR);
    $stmt->bindParam(7, $salida, PDO::PARAM_STR, 500);
    $stmt->execute();
    // echo $valor;

    if (is_array($_POST[$campo])) {
        foreach ($_POST[$campo] as $campo1 => $valor1) {

            $sql = 'exec ?=co_Insertar_Evaluacion_Respuesta ?,?,?,?,?,?,?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
            $stmt->bindParam(2, $calendarizacion, PDO::PARAM_INT);
            $stmt->bindParam(3, $cuestionario, PDO::PARAM_INT);
            $stmt->bindParam(4, $evaluador, PDO::PARAM_STR);
            $stmt->bindParam(5, $eje, PDO::PARAM_STR);
            $stmt->bindParam(6, $campo, PDO::PARAM_STR);
            $stmt->bindParam(7, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(8, $salida, PDO::PARAM_STR, 500);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        while ($stmt->nextRowset()) {
            $stmt->nextRowset();
        }
    } else {

        $sql = 'exec ?=co_Insertar_Evaluacion_Respuesta ?,?,?,?,?,?,?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
        $stmt->bindParam(2, $calendarizacion, PDO::PARAM_INT);
        $stmt->bindParam(3, $cuestionario, PDO::PARAM_INT);
        $stmt->bindParam(4, $evaluador, PDO::PARAM_STR);
        $stmt->bindParam(5, $eje, PDO::PARAM_STR);
        $stmt->bindParam(6, $campo, PDO::PARAM_STR);
        $stmt->bindParam(7, $valor, PDO::PARAM_STR);
        $stmt->bindParam(8, $salida, PDO::PARAM_STR, 500);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        while ($stmt->nextRowset()) {
            $stmt->nextRowset();
        }
    }
}

$jsondata['codigo'] = $codigo;
$jsondata['mensaje'] = $salida;

echo json_encode($jsondata);
