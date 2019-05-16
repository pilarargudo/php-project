<?php
namespace App\routing;

use FastRoute\Dispatcher;

class Web
{
  public static function getDispatcher(): Dispatcher {
    return \FastRoute\simpleDispatcher(
      function (\FastRoute\RouteCollector $route){
        $route->addRoute('GET','/',['App\controllers\IndexController','index']);
        $route->addRoute('GET','/register',['App\controllers\RegisterController','index']); //index es el método
      }
    );
  }
}