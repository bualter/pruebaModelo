<?php
require 'classes/DB.php';
require 'classes/JSON_DB.php';
require 'classes/MySQL_DB.php';
require 'classes/Modelo.php';
require 'classes/Humano.php';
require 'classes/Mascota.php';

$model = new Mascota;
/*
echo $model->setAttr('especie', 'Gato');
echo $model->setAttr('nombre', 'Azul');

$model->save();
*/
// echo $model->setAttr('nombre', 'Pupy');
/*
$mascota= new Mascota();
$mascota = $mascota->find(5);
echo "<pre>";
var_dump($mascota);
*/
$mascota2 = Mascota::findAll();
echo "<pre>";
var_dump($mascota2);

// echo 'Bien';
