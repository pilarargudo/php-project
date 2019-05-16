<?php

namespace App\controllers;

use App\ViewManager;

class IndexController extends Controller
{
  public function index(){
    $viewManager = $this->container->get(ViewManager::class);
    $viewManager->renderTemplate("index.view.html");
  }
}
