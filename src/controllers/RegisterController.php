<?php

namespace App\controllers;

use App\ViewManager;

use App\dao\registerDao;

class RegisterController extends Controller
{
  public function index(){
    $viewManager = $this->container->get(ViewManager::class);
    $viewManager->renderTemplate("register.view.html");
  }
  public function register(){
    // variables para los campos = name del input
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    //conexión a la bd
    $registerDao = new registerDao();
    $registerDao->saveUser($email, $passwd);
    // validamos
    echo "<h1>Proceso de registro $email $passwd</h1>";
  }
}
