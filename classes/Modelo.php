<?php

class Modelo
{
  public $table;
  public $columns;
  public $datos;
  protected $db;

  public function __construct($datos=[]){
    $this->datos = $datos;
    $this->db = new MySQL_DB();
  }

  public function getColumns(){
    return $this->columns;
  }

  public function getDatos(){
    return $this->datos;
  }

  public function save(){
    if (!$this->getAttr('id')) {
      $this->insert();
    } else {
      $this->update();
    }
  }

  private function insert(){
    $this->db->insert($this, $this->datos);
  }

  public function getAttr($attr){
    return isset($this->datos[$attr]) ? $this->datos[$attr] : null;
  }

  public function setAttr($attr, $value){
    $this->datos[$attr] = $value;
  }

  public function find($id){

    if ($fila= $this->db->find($this, $id)){
      foreach ($fila as $attr => $value) {
        $this->setAttr($attr, $value);
      }
      return $this;
    }
    return false;
  }

  public static function findAll($model){

    $instance = new self;
    $todosLosObjetos = $instance->db->findAll($model);
    return isset($todosLosObjetos) ? $todosLosObjetos : null;
  }

}
