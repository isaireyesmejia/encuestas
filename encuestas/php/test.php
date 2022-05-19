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


$cadena_encriptada = encrypt("nps","5");

print $cadena_encriptada.'<br>';

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

$cadena_desencriptada = decrypt("o6Wo","5");

print $cadena_desencriptada;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$variable='Hola';
//$codificado= base64_encode($variable);
//print $codificado.'<br>';
//
//$decodificado= base64_decode($codificado);
//
//print $decodificado;