<?php

namespace App\controllers;

use App\dao\registerDao;

class RegisterController extends Controller
{
  public function index(){
    $this->viewManager->renderTemplate("register.view.html");
  }
  public function register(){
    // variables para los campos = name del input
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    //conexión a la bd
    $registerDao = new registerDao();
    $registerDao->saveUser($email, $passwd);

    // validamos
    //echo "<h1>Proceso de registro $email $passwd</h1>";

    //redirección a una página
    parent::returnView(''); // a la home
  }
}
