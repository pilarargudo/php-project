<?php
namespace App\dao;

class registerDao extends Dao
{

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