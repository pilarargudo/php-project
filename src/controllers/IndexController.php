<?php

namespace App\controllers;

class IndexController extends Controller
{
  public function index(){
    $this->viewManager->renderTemplate("index.view.html");
  }
}
