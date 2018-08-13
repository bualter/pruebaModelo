<?php

class Vista
{
  public $columns;
  public $datos;

  public function __construct($modelo){
    $this->datos = $modelo->getDatos();
    $this->columns = $modelo->getColumns();
  }

  public verTodos(){

    if ($tabla= $this->db->find($this)){
      foreach ($fila as $attr => $value) {
        $this->setAttr($attr, $value);
      }
      return $this->datos;
    }
    return false;
    }

  }
