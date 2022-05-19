<?php

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}



function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}



$usuario = 'Innovacion';
//$contraseña = decrypt($clave,"5");
$contraseña = 'ls68is.32019';
$server = "argoscloud.lamar.edu.mx";
//mKqaqKmepKOWp56k

//echo $server;
try {
    $conn = new PDO("sqlsrv:server=" . $server . ";Database=Argos", $usuario, $contraseña);
//    print 'conexión exitosa';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage();
    exit;
}




