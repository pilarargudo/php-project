<?php

namespace App;
use DI\Container;
use FastRoute;
use FastRoute\Dispatcher;

class RoutingManager
{
  private $container;

  public function __construct(Container $container)
  {
    $this->container = $container;
  }


  public function dispatch(string $requesMethod, string $requestUri, FastRoute\Dispatcher $dispatcher)
  {
    $route = $dispatcher->dispatch($requesMethod, $requestUri);

    switch($route[0]) {
      case FastRoute\Dispatcher::NOT_FOUND:
          header("HTTP/1.0 404 Not Found");
          echo "<h1> NOT FOUND </h1>";
          break;
      case FastRoute\Dispatcher::FOUND:  
          $controller = $route[1];
          $params =  $route[2];  
          $this->container->call($controller, $params);
          break;

    }

  }
}