<?php

namespace App\controllers;

use App\ViewManager;
use App\SessionManager;

class LogoutController extends Controller
{
  public function index(){
    SessionManager::remove('user');
    $this->viewManager->renderTemplate("index.view.html");
  }

}
