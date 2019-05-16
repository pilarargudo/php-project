<?php

namespace App\controllers;

use App\ViewManager;

use App\SessionManager;

//use App\dao\loginDao;

class AdminController extends Controller
{
  public function index(){

    // comprobamos si existe usuario en la sesión
    $user = SessionManager::get("user");
    
    if($user) {
      $viewManager = $this->container->get(ViewManager::class);
      $viewManager->renderTemplate("admin.view.html", array('email'=>'Pilar'));
    } else {
      parent::returnView("login");
    }

  }

}
