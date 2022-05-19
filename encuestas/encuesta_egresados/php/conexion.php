<?php

$server = 'argoscloud.lamar.edu.mx';
//$server = '192.168.2.160';
$database = 'Argos';
$usus = 'Innovacion';
$contras = 'ls68is.32019';
//$usus = 'ireyesm';
//$contras = 'Ireyes2345';


try {
    $conn = new PDO("sqlsrv:server=" . $server . ";Database=" . $database . ";", $usus, $contras);
    // echo 'Conexion exitosa';
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
}


function decrypt($string, $key) {
    $result = '';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}
