<?php

namespace App\interfaces;

// interface para gestionar los logs de las vistas
interface LoggerInterface
{
  // declaramos que va a tener estos métodos
  public function info(string $message);
  public function warning(string $message);
  public function error(string $message);
}