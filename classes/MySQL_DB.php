<?php

class MySQL_DB extends DB
{
  protected $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO('mysql:host=localhost;dbname=vet', 'root', '');
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo $e->getMessage();
      exit;
    }
  }


  public function insert($modelo, $datos)
  {
    $columnas = '';
    $values = '';

    foreach ($datos as $key => $value) {
      if (in_array($key, $modelo->columns)) {
        $columnas .= $key . ',';
        $values .= '"' . $value . '",';
      }
    }

    $columnas = trim($columnas, ',');
    $values = trim($values, ',');
    $sql = 'insert into '.$modelo->table.' ('.$columnas.') values ('.$values.')';

    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }

  public function find($modelo, $id){

    $sql = 'select * from '.$modelo->table.' where id = :id';
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function findAll($modelo){
    $sql = 'select * from '.$modelo->table;
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    $arrayDeObjetos = [];

    while ($fila= $stmt->fetch(PDO::FETCH_ASSOC)){
      $unObjeto = new Modelo();
      foreach ($fila as $attr => $value) {
        $unObjeto->setAttr($attr, $value);
      }
      $arrayDeObjetos[]=$unObjeto;
    }
    return $arrayDeObjetos;
  }

  function update($modelo, $datos, $id){
    global $db;
    $set = '';

    foreach ($datos as $key => $value) {
      $set .= $key . '="' . $value . '",';
    }

    $set = trim($set, ',');
    $sql = 'update '.$modelo->table.' set ' . $set . ' where id = ' . $id;

    try {
      $stmt = $db->prepare($sql);
      $stmt->execute();
    } catch(Exception $e) {
      $e->getMessage();
    }
  }
}
