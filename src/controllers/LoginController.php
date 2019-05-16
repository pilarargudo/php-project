<?php

namespace App\controllers;

use App\SessionManager;

use App\dao\loginDao;

class LoginController extends Controller
{
  public function index(){
    $this->viewManager->renderTemplate("login.view.html");
  }

  public function login(){
    // variables para los campos = name del input
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    //conexión a la bd
    $loginDao = new loginDao();
    $result = $loginDao->getUser($email, $passwd);
    //echo $result[0];
    if($result){
      // le enviamos al sessionManager el usuario con el que hemos hecho login
      // encriptado en la cookie de session
      SessionManager::put('user',$result);
      //redirección a una página
      parent::returnView('admin');
    }else {
      parent::returnView('login');
    }
   
  }
}
