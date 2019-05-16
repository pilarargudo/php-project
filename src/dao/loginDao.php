<?php
namespace App\dao;
//use Kint;

class loginDao extends Dao
{

  // método para el post
  // creamos con workbench la tabla users con los campos id, email y password
  public function getUser( string $email, string $password){
    try{
      // consulta SQL
      $sql = "SELECT * FROM users WHERE email='$email' AND password='$password';";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $result = $statement->fetchAll(\PDO::FETCH_OBJ);
      
      //kint::dump($result);
      
      return $result;

    } catch (Exception $e) {
        die($e);
    }

  }
}