<?php

require_once "conexion.php";

// $matricula = filter_input(INPUT_POST, 'matricula');
// $matricula='LIC1860';
$matricula_encriptada =$_POST["matricula"];

$matricula = decrypt($matricula_encriptada, "agresadoslamar");


$sql = 'exec ?=Web_Sel_UltRegAca ?,?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
$stmt->bindParam(2, $matricula, PDO::PARAM_INT);
$stmt->bindParam(3, $salida, PDO::PARAM_STR, 500);

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



while($stmt->nextRowset()){
    $stmt->nextRowset();
}

$array['salida']=$salida;
$array['resultados']=$result;
$array['codigo']=$codigo;


//print $codigo;

// echo '<pre>';
// print_r($array);
// echo '</pre>';

echo json_encode($array);
$conn = NULL;

?>