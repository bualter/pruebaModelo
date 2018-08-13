<?php
$ruta = 'mysql:host=localhost;dbname=vet; charset=utf8';
$usuario = 'root';
$password = '';
$opciones = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ];

echo "Hola!";
try {
  $db = new PDO($ruta, $usuario, $password, $opciones);
} catch (Exception $e) {
  echo "sarasassa";
//  echo $e->getMessage();

  exit;
}
