<?php

namespace App\controllers;

use App\SessionManager;

//use App\dao\loginDao;

class AdminController extends Controller
{
  public function index(){

    // comprobamos si existe usuario en la sesión
    $user = SessionManager::get("user");
    
    if($user) {
      $this->viewManager->renderTemplate("admin.view.html", array('email'=>'Pilar'));
    } else {
      parent::returnView("login");
    }

  }

}
