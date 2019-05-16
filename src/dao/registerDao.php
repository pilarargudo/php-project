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

  // método para el post
  // creamos con workbench la tabla users con los campos id, email y password
  public function saveUser( string $email, string $password){
    try{
      $sql = "INSERT INTO users (email, password) VALUES(?,?)";
      $statement = $this->pdo->prepare($sql);
      $statement->execute([$email, $password]);
    } catch (Exception $e) {
        die($e);
    }

  }
}