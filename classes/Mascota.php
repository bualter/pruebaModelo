<?php

class Mascota extends Modelo
{
  public $table = 'mascotas';
  public $columns = ['nombre', 'especie', 'humano_id'];


  public static function findAll(){
    $instancia = new Mascota();
    $todos = Modelo::findAll($instancia);
    return isset($todos)?$todos:null;
  }
}
