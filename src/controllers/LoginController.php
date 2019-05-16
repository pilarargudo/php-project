<?php

namespace App\controllers;

use App\ViewManager;

use App\dao\loginDao;

class LoginController extends Controller
{
  public function index(){
    $viewManager = $this->container->get(ViewManager::class);
    $viewManager->renderTemplate("login.view.html");
  }

  public function login(){
    // variables para los campos = name del input
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    //conexión a la bd
    $loginDao = new loginDao();
    $result = $loginDao->getUser($email, $passwd);

    echo $result[0];
    //redirección a una página
    //parent::returnView(''); // a la home
  }
}
