<?php

namespace App\controllers;

use App\SessionManager;

//use Kint;


class AdminController extends Controller
{
  public function index(){

    // comprobamos si existe usuario en la sesión
    $user = SessionManager::get("user");
    
    //Kint::dump($user);
    if($user) {
      $this->viewManager->renderTemplate("admin.view.html",array('user'=>$user));
    } else {
      parent::returnView("login");
    }

  }

}
