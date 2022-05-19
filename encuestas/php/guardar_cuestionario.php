<?php

//echo '<pre>';
//print_r($entrada);
//echo '</pre>';



function guardar_cuestionario($matricula, $cuestionario, $entrada, $conn) {

    $sql = 'exec ?=co_Insertar_Encuesta_Alumno ?,?,?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
    $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
    $stmt->bindParam(3, $cuestionario, PDO::PARAM_STR);
    $stmt->bindParam(4, $salida, PDO::PARAM_STR, 5000);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	while($stmt->nextRowset()){
        $stmt->nextRowset();
    }

    if ($codigo <> 0) {
        return $codigo;
    }


    unset($entrada['matricula'], $entrada['cuestionario']);

    foreach ($entrada as $campo => $valor) {

        $sql = 'exec ?=co_Insertar_Encuesta_Pregunta_Alumno ?,?,?,?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
        $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
        $stmt->bindParam(3, $cuestionario, PDO::PARAM_STR);
        $stmt->bindParam(4, $campo, PDO::PARAM_STR);
        $stmt->bindParam(5, $salida, PDO::PARAM_STR, 500);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		while($stmt->nextRowset()){
			$stmt->nextRowset();
		}

        if ($codigo <> 0) {

            return $codigo;
        }

        if (is_array($entrada[$campo])) {
            foreach ($entrada[$campo] as $campo1 => $valor1) {

                $sql = 'exec ?=co_Insertar_Encuesta_Respuesta_Alumno ?,?,?,?,?';
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
                $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
                $stmt->bindParam(3, $cuestionario, PDO::PARAM_STR);
                $stmt->bindParam(4, $campo, PDO::PARAM_STR);
                $stmt->bindParam(5, $valor1, PDO::PARAM_STR);
                $stmt->bindParam(6, $salida, PDO::PARAM_STR, 500);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

			while($stmt->nextRowset()){
				$stmt->nextRowset();
			}

            if ($codigo <> 0) {

                return $codigo;
            }
        } else {

            $sql = 'exec ?=co_Insertar_Encuesta_Respuesta_Alumno ?,?,?,?,?';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
            $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
            $stmt->bindParam(3, $cuestionario, PDO::PARAM_STR);
            $stmt->bindParam(4, $campo, PDO::PARAM_STR);
            $stmt->bindParam(5, $valor, PDO::PARAM_STR);
            $stmt->bindParam(6, $salida, PDO::PARAM_STR, 500);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			while($stmt->nextRowset()){
				$stmt->nextRowset();
			}

            if ($codigo <> 0) {

                return $codigo;
            }
        }
    }
}

function borrar_cuestionario_respuestas($matricula, $cuestionario, $conn) {
    $sql = 'exec ?=co_Insertar_Encuesta_Alumno_Borrar ?,?,?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $codigo, PDO::PARAM_STR || PDO::PARAM_INPUT_OUTPUT, 50);
    $stmt->bindParam(2, $matricula, PDO::PARAM_STR);
    $stmt->bindParam(3, $cuestionario, PDO::PARAM_STR);
    $stmt->bindParam(4, $salida, PDO::PARAM_STR, 5000);
    $stmt->execute();
}
