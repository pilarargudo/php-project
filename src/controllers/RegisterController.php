<?php

namespace App\controllers;

use App\ViewManager;

class RegisterController extends Controller
{
  public function index(){
    $viewManager = $this->container->get(ViewManager::class);
    $viewManager->renderTemplate("register.view.html");
  }
}
