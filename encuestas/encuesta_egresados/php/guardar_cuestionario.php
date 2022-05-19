<?php
include 'conexion.php';

$matricula = filter_input(INPUT_POST, 'matricula');
// $matricula ='3srKo52pkQ==';

$p_matricula = decrypt($matricula, "agresadoslamar");

$p_cuestionario = filter_input(INPUT_POST, 'cuestionario');

$sql = 'exec ?=co_Insertar_Encuesta_Alumno ?,?,?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
$stmt->bindParam(2, $p_matricula, PDO::PARAM_STR);
$stmt->bindParam(3, $p_cuestionario, PDO::PARAM_STR);
$stmt->bindParam(4, $salida, PDO::PARAM_STR, 5000);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

while ($stmt->nextRowset()) {
    $stmt->nextRowset();
}


unset($_POST['matricula'], $_POST['cuestionario']);

$bandera = 0;

foreach ($_POST as $campo => $valor) {

    $sql = 'exec ?=co_Insertar_Encuesta_Pregunta_Alumno ?,?,?,?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
    $stmt->bindParam(2, $p_matricula, PDO::PARAM_STR);
    $stmt->bindParam(3, $p_cuestionario, PDO::PARAM_STR);
    $stmt->bindParam(4, $campo, PDO::PARAM_STR);
    $stmt->bindParam(5, $salida, PDO::PARAM_STR, 500);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    while ($stmt->nextRowset()) {
        $stmt->nextRowset();
    }

    if (is_array($_POST[$campo])) {
        foreach ($_POST[$campo] as $campo1 => $valor1) {

            $sql = 'exec ?=co_Insertar_Encuesta_Respuesta_Alumno ?,?,?,?,?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
            $stmt->bindParam(2, $p_matricula, PDO::PARAM_STR);
            $stmt->bindParam(3, $p_cuestionario, PDO::PARAM_STR);
            $stmt->bindParam(4, $campo, PDO::PARAM_STR);
            $stmt->bindParam(5, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(6, $salida, PDO::PARAM_STR, 500);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        while ($stmt->nextRowset()) {
            $stmt->nextRowset();
        }
    } else {

        $sql = 'exec ?=co_Insertar_Encuesta_Respuesta_Alumno ?,?,?,?,?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
        $stmt->bindParam(2, $p_matricula, PDO::PARAM_STR);
        $stmt->bindParam(3, $p_cuestionario, PDO::PARAM_STR);
        $stmt->bindParam(4, $campo, PDO::PARAM_STR);
        $stmt->bindParam(5, $valor, PDO::PARAM_STR);
        $stmt->bindParam(6, $salida, PDO::PARAM_STR, 500);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        while ($stmt->nextRowset()) {
            $stmt->nextRowset();
        }
    }

    $bandera++;
}

$jsondata['codigo'] = $codigo;
$jsondata['mensaje'] = $salida;
$jsondata['bandera'] = $bandera;

if ($codigo <> 0) {
    $sql = 'exec ?=co_Insertar_Encuesta_Alumno_Borrar ?,?,?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
    $stmt->bindParam(2, $p_matricula, PDO::PARAM_STR);
    $stmt->bindParam(3, $p_cuestionario, PDO::PARAM_STR);
    $stmt->bindParam(4, $salida, PDO::PARAM_STR, 500);
    $stmt->execute();
}

echo json_encode($jsondata);
$conn = NULL;
