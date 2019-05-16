<?php

namespace App\helper;

class ConnectMysql
{
  // creamos función estática donde le pasaremos variables de configuración
  // refactorizamos toda la conexión (que hicimos en otro ejercicio) para meterlo en una clase
  public static function make($config)
  {
    try{
      return new \PDO(
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );
    } catch (\PDOException $ex){
      // die mata el proceso
      die($sex->getMessage());
    } 
  }  
}