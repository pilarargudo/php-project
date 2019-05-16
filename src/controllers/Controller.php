<?php

namespace App\controllers;
use DI\Container;
use App\ViewManager;

abstract class Controller
{
  // recuperamos el contenedor de dependencias en una clase propia
  protected $container;
  protected $viewManager;

  public function __construct(Container $container)
  {
    $this->container = $container;
    $this->viewManager = $this->container->get(ViewManager::class);

  }

  // obligamos a este método en todos los que hereden del controller
  abstract public function index();

  // redirigir a la página que le indiquemos
  // creamos metodo que va a ser heredado
  protected function returnView($page) 
  {
      $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF'],'/\\' ));
      header("Location: http://$host$uri/$page");
  }

}
