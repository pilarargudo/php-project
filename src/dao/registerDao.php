<?php
namespace App\dao;

//recuperamos los datos de la base de datos
use App\helper\ConnectMysql;
use App\config\configMysql;

class registerDao
{
  private $pdo;

  public function __construct(){
    //recuperamos los datos de la base de datos
    // de lo que nos devuelva cogemos el database
    $this->pdo = ConnectMysql::make(configMysql::getConfigDB()['database']);

  }
}