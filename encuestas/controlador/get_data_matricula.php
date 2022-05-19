<?php

require_once "../php/conexion.php";

$ID = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
//$ID='lme4465';
$Promedio = filter_input(INPUT_POST, 'promedio', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = '{call Web_Sel_UltRegAca (?,?,?)}';

$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $ID, PDO::PARAM_STR);
$stmt->bindParam(2, $salida, PDO::PARAM_STR, 50);
$stmt->bindParam(3, $Promedio, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(pdo::FETCH_ASSOC);

//echo '<pre>';
//print_r($result);
//echo '</pre>';

if ($result['Error_VC']) {
    $error = $result['Error_VC'];
} else {
    $error = '';
}

$jsondata = array();

//$jsondata['entrada'] = codificar_unidimencional($result);
$jsondata['entrada'] = $result;
$jsondata['error'] = $error;

echo json_encode($jsondata);

$conn = NULL;


